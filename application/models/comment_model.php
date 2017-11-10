<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Author : Mr.Uno
*/

class Comment_model extends CI_Model
{
    private $_db_name = "comment";
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
        return $this->db->order_by('id','DESC')->get($this->_db_name)->result();
    }

    public function getByProject($id = null){
        return $this->db->get_where($this->_db_name,"project_id = $id")->result();
    }

}