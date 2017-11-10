<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Author : Mr.Uno
*/

class Contacts_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function count_all(){
    	return $this->db->count_all("Contacts");
    }

    public function list_page($limit, $start){
    	$this->db->limit($limit, $start);
    	$query = $this->db->order_by('id','DESC')->get("Contacts");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function add($data){
        return $this->db->insert('contacts',$data);
    }

}