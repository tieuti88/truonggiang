<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Author : Mr.Uno
*/

class Catagory_model extends CI_Model
{
    private $_db_name = "catagory";
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
        if(isset($data['submit'])) unset($data['submit']);
        return $this->db->insert($this->_db_name,$data);
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

    public function getAll(){
        return $this->db->order_by('id','DESC')->get($this->_db_name)->result();
    }

    public function getIdByUrl($seo_title){
        if(!isset($seo_title)) return false;
        $data = $this->db->select('id')->where('seo_title',$seo_title)->get($this->_db_name)->row();
        return $data->id;
    }

    public function getProductByCategory($id_category){
        if(!isset($id_category)) return false;
        $data = $this->db->where('catagory_id',$id_category)->get('products')->result();
        return $data;
    }

}