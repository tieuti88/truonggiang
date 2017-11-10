<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class STPK_Controller extends CI_Controller {

    /**
     * @author UnoTrung
     * 2017-21-07
     */
    public function __construct() {
        parent::__construct();
        $arr['page'] ='login';
        if (!$this->session->userdata('is_client_login')) {
            if(!in_array($this->router->class,$this->allowed())){
                redirect('/login');
            }
        }
    }

    public function is_login(){
        return $this->session->userdata('is_client_login');
    }

    protected function allowed(){
        $controller = array('login');
        return $controller;
    }

    /**
     * @author UnoTrung
     * 2017-21-07
     */
    public function template($template_name, $vars = array(), $return = FALSE)
    {
        if($return):
            $content  = $this->view('layout/header_customer', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('layout/footer_customer', $vars, $return);

            return $content;
        else:
            $this->view('layout/header_customer', $vars);
            $this->view($template_name, $vars);
            $this->view('layout/footer_customer', $vars);
        endif;
    }

    /**
    * @author UnoTrung
    * 2017-08-07
    * Print Output Type Json
    */
    public function output($array_result = array(),$message = ''){
        $result = array( 'status' => 200,'result' =>$array_result, 'message' => $message );
        echo json_encode($result);
        die;
    }

    public function output_false($array_result = array(),$message = ''){
        $result = array( 'status' => 203,'result' =>$array_result, 'message' => $message );
        echo json_encode($result);
        die;
    }

    /**
    * @author Unotrung
    * view permission
    */
    public function error(){
        show_error('NOT PERMISSION, PLEASE CONTACT TO ADMIN!!',404);
    }


}