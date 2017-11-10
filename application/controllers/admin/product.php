<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller {
/**
 * ark Admin Panel for Codeigniter 
 * Author: Abhishek R. Kaushik
 * downloaded from http://devzone.co.in
 *
 */
    public function __construct() {
        parent::__construct();
        $this->load->helper("url");
        $this->load->helper('text');
        $this->load->model("Product_model");
        $this->load->model("Catagory_model");
        $this->load->library("pagination");
        $this->load->library('ckfinder');
        $this->ckfinder->setProjectPath('/');
        // Tên product của bạn      
        $this->ckfinder->setFolderUpload('uploads/images');
        // Cấu hình folder upload       
        $this->ckfinder->setCkfinderSourcePath('assets/ckfinder');
        // Đường dẫn tới source ckfinder       
        $this->ckfinder->setAuthentication(true);
 
        // Nếu true => cho phép sử dụng ckfinder          
        // ngược lại false thì ko được phép sử dụng        
        // Đường dẫn tuyệt đối dẫn đến function connector ở bên dưới      
        $this->ckfinder->setConnectorPath($this->config->base_url('admin/product/connector'));
    
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {
        $arr['page'] = 'product';

        $config['base_url'] = base_url('admin/product/index');
        $config['total_rows'] = $this->Product_model->count_all();
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
        $arr['products'] = $this->Product_model->list_page($config["per_page"],$page);
        $arr['pagination'] = $this->pagination->create_links();
        $this->load->view('admin/product/vwManage',$arr);
    }

    public function add_product() {
        if(isset($_POST['submit'])){
            $data = $this->input->post();

            $data['thumb'] = $this->upload_file('thumb')['file_name'];

            // $data['logo_customer'] = $this->upload_file('logo_customer')['file_name'];
            $data['seo_title'] = url_title(convert_accented_characters($data['name']),'dash',true);
            unset($data['submit']);
            $this->Product_model->add($data);
            redirect('admin/product/');
        }
        $arr['page'] = 'product';
        $arr['catagoris'] = $this->Catagory_model->getAll();        
        $this->load->view('admin/product/vwAddproduct',$arr);
    }

     public function edit_product($id = null) {
        if(isset($_POST['submit'])){
            $data = $this->input->post();
            $data['seo_title'] = url_title(convert_accented_characters($data['name']),'dash',true);
            unset($data['submit']);
            $thumb = $this->upload_file('thumb')['file_name'];
            $logo_customer = $this->upload_file('logo_customer')['file_name'];
            if($thumb != ''){
                $data['thumb'] = $thumb;
            }
            if($logo_customer != ''){
                $data['logo_customer'] = $logo_customer;
            }

            //upload multi file
            if(!empty($_FILES['images']['name'][0])){
                $file = $this->upload_multi_file('images',true,'test');
                if($file != null){
                    $str_filename = '';
                    foreach ($file as $listFile) {
                        $str_filename .=$listFile['file_name'].',';
                    }
                    $data['gallery'] = rtrim($str_filename,",");
                }
            }

            $this->Product_model->update($data);
        }
        $arr['page'] = 'product';
        $arr['catagoris'] = $this->Catagory_model->getAll();      
        $arr['product'] = $this->Product_model->get($id)[0];
        $this->load->view('admin/product/vwEdit',$arr);
    }
    
     public function block_product() {
        // Code goes here
    }
    
     public function delete_product($id) {
        $data['id'] = $id;
        $data['isdelete'] = 1;
        $this->Product_model->update($data);
        redirect('/admin/product/');
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

    private function upload_multi_file($field){
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '100000';
        $config['max_width'] = '102400';
        $config['max_height'] = '76800';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        return $this->upload->do_multi_upload($field);
    }

    public function remove_image($id,$filename=null){
        $this->load->helper("file");
        if(!empty($filename)){
            $path = "/uploads/".$filename;
            delete_files($path);
            $data['thumb'] = '';
            $data['id'] = $id;
            $this->Product_model->update($data);
        }
        $this->edit_product($id);
    }

    public function remove_gallery($id,$filename){
        $this->load->helper("file");

        if(!empty($filename)){
            $product = $this->Product_model->get($id);
            $data['gallery'] = '';
            $gallerys = explode(',',$product[0]->gallery);
            foreach ($gallerys as $gallery) {
                if($gallery != $filename){
                    $data['gallery'] .= $gallery.',';
                }
            }
            $data['gallery'] = rtrim($data['gallery'],",");
            
            $path = "/uploads/".$filename;
            delete_files($path);

            $data['id'] = $id;
            $this->Product_model->update($data);
        }
        $this->edit_product($id);
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