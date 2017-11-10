<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contacts extends CI_Controller {
/**
 * ark Admin Panel for Codeigniter 
 * Author: Abhishek R. Kaushik
 * downloaded from http://devzone.co.in
 *
 */
    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Contacts_model");
        $this->load->library("pagination");
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {
        $arr['page'] = 'Contacts';

        $config['base_url'] = base_url('admin/contacts/index');
        $config['total_rows'] = $this->Contacts_model->count_all();
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
        $config["first_tag_open"] = "<li>";
        $config["first_tag_close"] = "</li>";
        $config["last_tag_open"] = "<li>";
        $config["last_tag_close"] = "</li>";
        $config["next_tag_open"] = "<li>";
        $config["next_tag_close"] = "</li>";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["num_tag_open"] = "<li>";
        $config["cur_tag_open"] = "<li class='active'><a>";
        $config["cur_tag_close"] = "</a></li>";


        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $arr['contacts'] = $this->Contacts_model->list_page($config["per_page"],$page);
        $arr['pagination'] = $this->pagination->create_links();
        $this->load->view('admin/contact/vwManageContact',$arr);
    }

    public function add_contact() {
        $arr['page'] = 'contact';
        $this->load->view('admin/vwAddContact',$arr);
    }

     public function edit_contact() {
        $arr['page'] = 'contact';
        $this->load->view('admin/vwEditContact',$arr);
    }
    
     public function block_contact() {
        // Code goes here
    }
    
     public function delete_contact() {
        // Code goes here
    }
    
    
    
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */