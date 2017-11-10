<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Author : Mr.Uno
*/

class User_model extends CI_Model
{
    private $_db_name = "users";
    public function __construct() {
        parent::__construct();
    }

    public function count_all(){
    	return $this->db->count_all($this->_db_name);
    }

    public function list_page($limit, $start){
    	$this->db->limit($limit, $start);
    	$query = $this->db->order_by('id','DESC')->get($this->_db_name);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function add($data){
        if( $this->getByEmail( $data['email'] ) ) return false;
        $data['password'] = md5($data['password']);
        unset($data['confirm-password']);
        return $this->db->insert($this->_db_name,$data);
    }

    public function get($id = null){
        return $this->db->get_where($this->_db_name,"id = $id")->result();
    }

    public function update($data){
        $id = $data['id'];
        unset($data['id']);
        return $this->db->where("id = $id")->update($this->_db_name,$data);
    }

    public function getAll(){
        return $this->db->where('deleted','N')->where("id != 1")->order_by('id','DESC')->get($this->_db_name)->result();
    }

    public function getByEmail($email){
        return $this->db->get_where($this->_db_name,"email = '$email' and deleted = 'N'")->result();
    }

    public function getUserBySocial(){
        return $this->db->get_where($this->_db_name,array('register_by IS NOT NULL' => NULL, 'id != 1'=>NULL ))->result();
    }

    public function delete($id){
        $data['id'] = $id;
        $data['deleted'] = 'Y';
        return $this->update($data);
    }

    

}