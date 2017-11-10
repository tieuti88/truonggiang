<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Catagory extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Catagory_model");
        $this->load->library("pagination");
        $this->load->helper('url');
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index(){
    	$arr['page'] = 'catagory';

        $config['base_url'] = base_url('admin/catagory/index');
        $config['total_rows'] = $this->Catagory_model->count_all();
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
        $arr['catagoris'] = $this->Catagory_model->list_page($config["per_page"],$page);
        $arr['pagination'] = $this->pagination->create_links();
        $this->load->view('admin/catagory/vwManageCatagory',$arr);
    }

    public function add() {
        if(isset($_POST['submit'])){
            $data = $this->input->post();
            $data['seo_title'] = url_title($data['title'],'dash',true);
            $data['content'] = htmlspecialchars_decode($data['content']);
            $this->Catagory_model->add($data);
            redirect('admin/catagory/');
        }
        $arr['page'] = 'catagory';
        $this->load->view('admin/catagory/vwAddCatagory',$arr);
    }

    public function edit($id = null) {
        if(isset($_POST['submit'])){
            $data = $this->input->post();
            $data['seo_title'] = url_title($data['title'],'dash',true);
            $data['content'] = htmlspecialchars_decode($data['content']);
            $this->Catagory_model->update($data);
            redirect('admin/catagory/');
        }
        $arr['page'] = 'catagory';
        $arr['catagory'] = $this->Catagory_model->get($id)[0];
        $this->load->view('admin/catagory/vwEditCatagory',$arr);
    }

    public function delete($id){
        $this->Catagory_model->delete($id);
        redirect('admin/catagory/');
    }
}