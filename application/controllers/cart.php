<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cart extends CI_Controller {

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
        $this->load->helper("url");
        $this->load->helper('text');
    }

    public function index() {
           $arr['page'] ='about';
        $this->load->view('vwCart',$arr);
        $this->_create_order();
        $this->load->model('Product_model');
    }

    public function add_to_cart(){
        $data = $this->input->post();
        $item = $this->_findCartById($data['id']);
        if($item){
            $item['qty'] += 1;
            $this->cart->update($item);
        }else{
            $cart = array(
            'id'      => $data['id'],
            'qty'     => 1,
            'price'   => $data['price'],
            'name'    => url_title(convert_accented_characters($data['name']),'dash',true),
            'image'  => $data['thumb'],
            'desc'    => $data['name']
            );
            $this->cart->insert($cart);
        }
        echo $this->cart->total_items();
        exit;

    }
    public function empty_cart(){
        $this->cart->destroy();
    }

    public function update_cart(){
        if(!$this->input->post()) exit;

        $data = $this->input->post();
        $cart = array();
        foreach ($data['qty'] as $key => $value) {
            $cart['rowid'] = $key;
            $cart['qty'] = $value;
            $this->cart->update($cart);
        }
        $this->_update_order();
        print_r(true);exit;
    }

    public function update_item($id){
        $carts = $this->cart->contents();

        v($carts);exit;
    }

    private function _findCartById($id){
        foreach ($this->cart->contents() as $cart) {
            if($cart['id'] == $id)
                return $cart;
        }
        return false;
    }

    public function save_cart(){
        $this->load->model('Order_model');
        if($this->session->userdata('is_customer_login') && $this->cart->total_items() > 0){
            $this->_update_order();

            foreach ($this->cart->contents() as $cart) {
                $detail = array(
                    'order_id' => $this->session->userdata('oid'),
                    'name_pro' => $cart['name'],
                    'qty'       => $cart['qty'],
                    'price'     => $cart['price'],
                    'user_create'     => 'customer'
                );
                $this->Order_model->create_order_detail($detail);
            }
            $this->_destroy_cart();
            $this->load->view('vwFinish');
        }else{
            redirect("/signup");
        }
    }

    private function _create_order_id($id){
        $com = "RD";
        $year = date("Y");
        $ran = $this->_generateRandomString(3);
        return $com.$year.$ran.$id;

    }

    private function _generateRandomString($length = 10) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function _destroy_cart(){
        $this->cart->destroy();
        $this->session->unset_userdata('cart_id');
        $this->session->unset_userdata('oid');
    }

    private function _create_order(){

        $this->load->model('Order_model');
        if( !$this->session->userdata('cart_id') && $this->cart->total_items()){
            $data = array(
                'title' => date("Y-m-d H:i:s"),
                'qty'   => $this->cart->total_items(),
                'total_money' => ($this->cart->total()+$this->cart->tax()),
                'customer_id' => $this->session->userdata('cid')
            );

            $data['description'] = '';
            foreach ($this->cart->contents() as $cart) {
                if(!empty($cart['image']))
                    $data['thumb'] = $cart['image'];
                $data['description'] .= $cart['desc'].'-'.$cart['qty'].'<br/>';
            }
            $id = $this->Order_model->add($data);
            $order_id = $this->_create_order_id($id);
            $this->Order_model->update(array('id'=>$id,'order_id'=>$order_id));
            $this->session->set_userdata(array('cart_id' => $order_id, 'oid' => $id));
        }
    }

    private function _update_order(){
        $this->load->model('Order_model');
        if( $this->session->userdata('cart_id') ){
            if($this->cart->total_items() <= 0) die;
            $data = array(
                'title' => date("Y-m-d H:i:s"),
                'qty'   => $this->cart->total_items(),
                'total_money' => ($this->cart->total()+$this->cart->tax()),
                'customer_id' => $this->session->userdata('cid')
            );

            $data['description'] = '';
            foreach ($this->cart->contents() as $cart) {
                if(!empty($cart['image']))
                    $data['thumb'] = $cart['image'];
                $data['description'] .= $cart['desc'].'-'.$cart['qty'].'<br/>';
            }
            $data['id'] = $this->session->userdata('oid');
            $id = $this->Order_model->update($data);
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */