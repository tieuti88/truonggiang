<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Customer extends STPK_Controller {

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
        $this->load->model('customer_model');

    }

    public function index() {
        if(!$this->is_login()) exit;
        //template
        $arr['script'] = 'customer';
        $arr['menu'] = 'customer_manager';
        $arr['submenu'] = $this->router->fetch_method();
        $this->load->template('/customer/vwManage',$arr);
    }

    public function datasource(){
        //sord:asc
        $param = $this->input->post();

        //sort
        $order = array();
        if($param['order']){
            foreach ($param['order'] as $value) {
                $order[$param['columns'][$value['column']]['data']] = $value['dir'];
            }
        }
        $data['draw'] = 6;
        $data['recordsTotal'] = $this->customer_model->count_all();
        $data['recordsFiltered'] = $this->customer_model->count_all();
        $data['data'] = $this->customer_model->getAll($order);
        echo json_encode($data);
        exit;
    }

    public function info(){
        if(!$this->input->post()) $this->output_false(NULL,'Miss parameter!');
        $data = $this->input->post();
        $result['customer'] = $this->customer_model->get($data['id']);
        $result['order_customer'] = $this->customer_model->getOrderByCustomerId($data['id']);
        $this->output($result,'successful');
    }

    


}