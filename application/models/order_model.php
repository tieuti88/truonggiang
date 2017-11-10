<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Author : Mr.Uno
*/

class Order_model extends CI_Model
{
    private $_db_name = "order";
    public function __construct() {
        parent::__construct();
    }

    public function count_all(){
        return $this->db->count_all($this->_db_name);
    }

    public function list_page($limit, $start){
        $this->db->limit($limit, $start);
        $query = $this->db
        ->join('orders_groups','order.id = orders_groups.order_id','left')
        ->order_by('id','DESC')->get($this->_db_name);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function add($data){
        if(!isset($data)) return false;
        $this->db->insert($this->_db_name,$data);
        return $this->db->insert_id();
    }

    public function get($id = null){
        return $this->db->get_where($this->_db_name,"id = $id")->result();
    }

    public function update($data){
        if(isset($data['submit'])) unset($data['submit']);
        $id = $data['id'];
        unset($data['id']);
        return $this->db->where("id = $id")->update($this->_db_name,$data);
    }

    public function delete($id = null){
        return $this->db->where("id = $id")->delete($this->_db_name);
    }

    public function getAll($order = null){
        if($order != null){
            foreach ($order as $key => $value) {
                $this->db->order_by($key,$value);
            }
        }
        $this->db->join('orders_groups','order.id = orders_groups.order_id and date_create = ( SELECT max(date_create) from orders_groups where order_id=order.id )','left');
        return $this->db->get($this->_db_name)->result();
    }

    public function add_order_group($data){
        if(!isset($data)) return false;
        return $this->db->insert('orders_groups',$data);
    }

    public function get_order_group($id = null){
        $this->db->select('orders_groups.*, groups.group_name');
        $this->db->join('groups','groups.group_value = orders_groups.group_value','left');
        return $this->db->order_by('date_create','desc')->get_where('orders_groups',"order_id = $id and orders_groups.is_delete=0")->result();
    }

    public function create_order_detail($data){
        if(!isset($data)) return false;
        return $this->db->insert('order_detail',$data);
    }

    public function getByCustomerId($cid){
        return $this->db
                    ->where('customer_id',$cid)
                    ->order_by('datecreate','desc')
                    ->get($this->_db_name)->result();
    }

}