<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Signup extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Customer_model');
    }

    public function index() {
        if($this->session->userdata('is_customer_login'))
            redirect('/payment');
        $arr['page'] ='signup';
        $this->load->view('vwSignup',$arr);
    }

    public function signin(){
        if($this->input->post()){
            $post = $this->input->post();
            $post['email'] = $post['username'];
            if($this->Customer_model->check_exist_user($post) > 0){
                $data = $this->Customer_model->login($post)[0];
                $this->session->set_userdata(array(
                    'cid' => $data->id,
                    'customer_name' => $data->username,
                    'name' => $data->name,
                    'email' => $data->email,                            
                    'address' => $data->address,                            
                    'phone_number' => $data->phone_number,                            
                    'is_customer_login' => true,
                    )
                );
                if ($this->agent->is_referral())
                {
                    redirect($this->agent->referrer(),'refresh');
                }
            }
        }
    }

    public function register(){

        $bool = true;
        if(!$this->input->post()) {
            $arr['error'] = "";
            $bool = false;
        }else{
            $post = $this->input->post();
            if(!$post['rule']){
                $arr['error'] = "Not accept rules";
                $bool = false;
            }else{
                if($post['confirm_password'] != $post['password']){
                    $arr['error'] = "wrong confirm password";
                    $bool = false;
                }
            }
            if($this->Customer_model->check_exist_user($post) > 0){
                $arr['error'] = "Email này đã tồn tại, vui lòng đăng nhập email trên hoặc cung cấp email khác để hoàng thành đăng ký.";
                $bool=false;
            }
        }
        if($bool){
            
            $data = $post;
            unset($data['confirm_password']);
            unset($data['rule']);
            $cus_id = $this->Customer_model->add_id($data);
            if($cus_id!=null){
                $customer = $this->Customer_model->get($cus_id)[0];
                $this->session->set_userdata(array(
                    'cid' => $customer->id,
                    'customer_name' => $customer->username,
                    'name' => $customer->name,
                    'email' => $customer->email,                            
                    'address' => $customer->address,                            
                    'phone_number' => $customer->phone_number,                            
                    'is_customer_login' => true,
                    )
                );
            }
            redirect("/payment");
        }else{
            $this->load->view('vwCusRegister',$arr);
        }
        // v($this->session->userdata('is_customer_login'));
    }

    private function _check_login(){
        if($this->session->userdata('is_customer_login')){
            $this->load->view('vwThanhtoan');
        }
    }

    public function customer_logout(){
        $this->session->unset_userdata('cid');
        $this->session->unset_userdata('customer_name');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('address');
        $this->session->unset_userdata('phone_number');
        $this->session->unset_userdata('is_customer_login');
        redirect("/");
    }

    public function destroy(){
        $this->session->sess_destroy();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */