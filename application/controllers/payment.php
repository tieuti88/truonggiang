<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Payment extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *    http://example.com/index.php/welcome
     *  - or -  
     *    http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('Customer_model');
        

    }

    public function index() {
        if(!$this->cart->contents()) redirect("/");
        if($this->session->userdata('is_customer_login')){
            $arr['customer'] = $this->_customer()[0];
            $this->load->view('vwThanhtoan',$arr);
        }else{
            redirect('/signup/register');
        }

        
    }
    private function _customer(){
        if(!$this->session->userdata('is_customer_login')) redirect("/signup");

        $cid = $this->session->userdata("cid");
        $data = $this->Customer_model->get($cid);
        return $data;
    }





    


}