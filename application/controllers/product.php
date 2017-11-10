<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -  
     *      http://example.com/index.php/welcome/index
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
        $this->load->model('Product_model');
        $this->load->model('catagory_model');
    }

    public function index( $param = null ) {

        if($param != null){
            $pro_id = $this->Product_model->getIdByUrl($param);
            $pro = $this->Product_model->getProductById($pro_id);
            $arr['product'] = $pro;
            $arr['more_products'] = $this->_more_product($pro->catagory_id, $pro->id, 10);
        }
        $arr['page'] ='product';
        $this->load->view('vwProduct',$arr);
    }

    private function _more_product($category = null, $id = null, $limit = 10){
        return $this->Product_model->get_more_product($category,$id,$limit);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */