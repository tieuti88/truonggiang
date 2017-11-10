<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer extends CI_Controller {
/**
 * ark Admin Panel for Codeigniter 
 * Author: Abhishek R. Kaushik
 * downloaded from http://devzone.co.in
 *
 */
    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Customer_model");
        $this->load->library("pagination");
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {
        $arr['page'] = 'customer';

        $config['base_url'] = base_url('admin/customer/index');
        $config['total_rows'] = $this->Customer_model->count_all();
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
        $arr['customers'] = $this->Customer_model->list_page($config["per_page"],$page);
        $arr['pagination'] = $this->pagination->create_links();
        $this->load->view('admin/customer/vwManage',$arr);
    }

    public function add_customer() {
        if(isset($_POST['submit'])){
            $data = $this->input->post();
            $data['thumb'] = $this->upload_file('thumb')['file_name'];
            unset($data['submit']);
            $this->Customer_model->add($data);
            redirect('admin/customer/');
        }
        $arr['page'] = 'customer';   
        $this->load->view('admin/customer/vwAdd',$arr);
    }

     public function edit_customer($id = null) {
        if(isset($_POST['submit'])){
            $data = $this->input->post();
            unset($data['submit']);
            $thumb = $this->upload_file('thumb')['file_name'];
            if($thumb != ''){
                $data['thumb'] = $thumb;
            }
            $this->Customer_model->update($data);
        }
        $arr['page'] = 'customer';   
        $arr['customer'] = $this->Customer_model->get($id)[0];
        $this->load->view('admin/customer/vwEdit',$arr);
    }
    
     public function block_customer() {
        // Code goes here
    }
    
     public function delete_customer() {
        // Code goes here
    }

    private function upload_file($field){
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '100000';
        $config['max_width'] = '102400';
        $config['max_height'] = '76800';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->do_upload($field);
        return $this->upload->data();
    }
    
    
    
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */