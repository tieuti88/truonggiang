<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project extends CI_Controller {
/**
 * ark Admin Panel for Codeigniter 
 * Author: Abhishek R. Kaushik
 * downloaded from http://devzone.co.in
 *
 */
    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Project_model");
        $this->load->model("Catagory_model");
        $this->load->library("pagination");
        $this->load->library('ckfinder');
        $this->ckfinder->setProjectPath('/');
        // Tên project của bạn      
        $this->ckfinder->setFolderUpload('uploads/images');
        // Cấu hình folder upload       
        $this->ckfinder->setCkfinderSourcePath('assets/ckfinder');
        // Đường dẫn tới source ckfinder       
        $this->ckfinder->setAuthentication(true);
 
        // Nếu true => cho phép sử dụng ckfinder          
        // ngược lại false thì ko được phép sử dụng        
        // Đường dẫn tuyệt đối dẫn đến function connector ở bên dưới      
        $this->ckfinder->setConnectorPath($this->config->base_url('admin/project/connector'));
    
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {
        $arr['page'] = 'project';

        $config['base_url'] = base_url('admin/project/index');
        $config['total_rows'] = $this->Project_model->count_all();
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
        $arr['projects'] = $this->Project_model->list_page($config["per_page"],$page);
        $arr['pagination'] = $this->pagination->create_links();
        $this->load->view('admin/project/vwManageProject',$arr);
    }

    public function add_project() {
        if(isset($_POST['submit'])){
            $data = $this->input->post();
            $data['catagory_id'] = @json_encode($data['catagory_id']);
            $data['thumb'] = $this->upload_file('thumb')['file_name'];
            $data['logo_customer'] = $this->upload_file('logo_customer')['file_name'];
            unset($data['submit']);
            $this->Project_model->add($data);
            redirect('admin/project/');
        }
        $arr['page'] = 'project';
        $arr['catagoris'] = $this->Catagory_model->getAll();        
        $this->load->view('admin/project/vwAddProject',$arr);
    }

     public function edit_project($id = null) {
        if(isset($_POST['submit'])){
            $data = $this->input->post();
            $data['catagory_id'] = @json_encode($data['catagory_id']);
            unset($data['submit']);
            $thumb = $this->upload_file('thumb')['file_name'];
            $logo_customer = $this->upload_file('logo_customer')['file_name'];
            if($thumb != ''){
                $data['thumb'] = $thumb;
            }
            if($logo_customer != ''){
                $data['logo_customer'] = $logo_customer;
            }
            $this->Project_model->update($data);
        }
        $arr['page'] = 'project';
        $arr['catagoris'] = $this->Catagory_model->getAll();       
        $arr['project'] = $this->Project_model->get($id)[0];
        $this->load->view('admin/project/vwEditProject',$arr);
    }
    
     public function block_project() {
        // Code goes here
    }
    
     public function delete_project($id) {
        $data['id'] = $id;
        $data['isdelete'] = 1;
        $this->Project_model->update($data);
        redirect('/admin/project/');
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
    
    public function connector() {
        $this->ckfinder->startConnector();
    }
 
    public function html() {
        $this->ckfinder->getHTML();
    }
    
    
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */