<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Author : Mr.Uno
*/

class Project_model extends CI_Model
{
    private $_db_name = "project";
    public function __construct() {
        parent::__construct();
    }

    public function count_all(){
    	return $this->db->count_all($this->_db_name);
    }

    public function list_page($limit, $start){
    	$this->db->limit($limit, $start);
    	$query = $this->db->where(['isdelete'=>0])->order_by('id','DESC')->get($this->_db_name);

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

    public function getMore($id,$limit=3){
        $result = $this->db->where(['isdelete'=>0, 'id != ' => $id])->limit($limit)->order_by('id','DESC')->get($this->_db_name)->result();
        return $result;
    }

    public function seen($id){
        $this->db->set('seen', 'seen+1', FALSE);
        $this->db->where("id = $id")->update($this->_db_name);   
    }

    public function like($id){
        $this->db->set('like', '`like`+1', FALSE);
        return $this->db->where("id = $id")->update($this->_db_name); 
    }

}