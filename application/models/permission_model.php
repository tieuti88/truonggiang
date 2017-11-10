<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Author : Mr.Uno
*/

class Permission_model extends CI_Model
{
    private $_db_name = "permission";
    public function __construct() {
        parent::__construct();
    }

    public function count_all(){
    	return $this->db->count_all($this->_db_name);
    }

    public function list_page($limit = 10, $start = 0){
    	$this->db->limit($limit, $start);
    	$query = $this->db->where('is_delete',0)->order_by('controller','DESC')->get($this->_db_name);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function getUnit($data){
        return $this->db->get_where($this->_db_name,"controller = '".$data['controller']."' and action = '".$data['action']."' and is_delete = 0")->result();
    }

    public function add($data){
        $unit = $this->getUnit($data);
        if( $unit ) {
            if(!strpos($unit[0]->role, $data['role'])) return false;
            $role = json_decode($unit[0]->role);
            array_push($role,$data['role']);
            $data['id'] = $unit[0]->id;
            $data['role'] = json_encode($role);
            return $this->update($data);
        }
        $data['role'] = json_encode(array($data['role']));
        return $this->db->insert($this->_db_name,$data);
    }

    public function get($id = null){
        return $this->db->get_where($this->_db_name,"id = $id")->result();
    }

    public function getByRole($role = null){
        if($role == null) return false;
        $query =  $this->db->like('role',$role);
        return $query->get($this->_db_name)->result();
    }

    public function getAll(){
        return $this->db->get_where($this->_db_name,'is_delete = 0')->result();
    }

    public function update($data){
        $id = $data['id'];
        unset($data['id']);
        return $this->db->where("id = $id")->update($this->_db_name,$data);
    }

    public function delete($id){
        $data['id'] = $id;
        $data['is_delete'] = 1;
        return $this->update($data);
    }

    public function update_noId($data){
        $unit = $this->getUnit($data);
        $id = $unit[0]->id;
        return $this->db->where("id = $id")->update($this->_db_name,$data);
    }
    

}