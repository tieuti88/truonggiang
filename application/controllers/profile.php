<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Profile extends CI_Controller {

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
        $this->load->model('Order_model');
        if(!$this->session->userdata('is_customer_login')){
            redirect('/signup');
        }

    }

    public function index() {
        $arr = array('orders'=>$this->_order());
        $this->load->view('vwProfile',$arr);

        
    }
    private function _customer(){
        if(!$this->session->userdata('is_customer_login')) redirect("/signup");

        $cid = $this->session->userdata("cid");
        $data = $this->Customer_model->get($cid);
        return $data;
    }

    private function _order(){
        if(!$this->session->userdata('cid'))
            return false;
        $cid = $this->session->userdata('cid');
        $data = $this->Order_model->getByCustomerId($cid);
        return $data;
    }





    


}