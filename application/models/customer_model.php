<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Author : Mr.Uno
*/

class Customer_model extends CI_Model
{
    private $_db_name = "customer";
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
    public function add_id($data){
        $this->db->insert($this->_db_name,$data);
        return $this->db->insert_id();
    }

    public function get($id = null){
        return $this->db->get_where($this->_db_name,"id = $id")->result();
    }

    public function update($data){
        $id = $data['id'];
        unset($data['id']);
        return $this->db->where("id = $id")->update($this->_db_name,$data);
    }

    public function getAll($order = null){
        if($order != null){
            foreach ($order as $key => $value) {
                $this->db->order_by($key,$value);
            }
        }
        return $this->db->order_by('id','DESC')->get($this->_db_name)->result();
    }

    public function getOrderByCustomerId($id){
        $this->db->order_by('order.datecreate','desc');
        return $this->db->get_where('order',"customer_id = $id")->result();
    }

    public function check_exist_user($data){
        $this->db->select("id");
        $this->db->where("username",$data["username"]);
        $this->db->or_where("email",$data["email"]);
        return $this->db->get($this->_db_name)->num_rows();

    }

    public function login($data){
        $this->db->select("*");
        $this->db->where("username",$data["username"]);
        $this->db->or_where("email",$data["username"]);
        $this->db->where("password",$data["password"]);
        $result =  $this->db->get($this->_db_name)->result();
        return $result;

    }

}