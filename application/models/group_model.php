<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Author : Mr.Uno
*/

class Group_model extends CI_Model
{
    private $_db_name = "groups";
    public function __construct() {
        parent::__construct();
    }

    public function count_all(){
    	return $this->db->count_all($this->_db_name);
    }

    public function list_page($limit, $start){
    	$this->db->limit($limit, $start);
    	$query = $this->db->where('is_delete',0)->order_by('id','DESC')->get($this->_db_name);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function getIdByRole($group_value){
        return $this->getByRole($group_value);
    }
    private function getByRole($group_value){
        return $this->db->get_where($this->_db_name,"group_value = '$group_value' and is_delete = 0")->result();
    }

    public function add($data){

        if( $this->getByRole( $data['group_value'] ) ) return false;
        return $this->db->insert($this->_db_name,$data);
    }

    public function get($id = null){
        return $this->db->get_where($this->_db_name,"id = $id")->result();
    }

    public function getAll(){
        return $this->db->select('group_name, group_value')->get_where($this->_db_name,'is_delete = 0 AND status = "active"')->result();
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

    public function status($data){
        return $this->update($data);
    }

    public function select_group($group = null){
        $groups = $this->getAll();
        $arr = array();
        foreach ($groups as $value) {
            $arr[$value->group_value] = $value->group_name;
        }
        return $arr;
    }

    

}