<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Staff extends STPK_Controller {

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
        $this->load->model('user_model');
        $action = $this->router->fetch_method();
        if(!$this->acl->has_permission(strtolower(__CLASS__), array($action))) exit('Not Permission');
    }

    public function index() {
        $arr['users'] = $this->user_model->getAll();
        $arr['groups'] = $this->groups();
        $arr['script'] = 'staff';
        $arr['menu'] = 'managers';
        $arr['submenu'] = $this->router->fetch_method();
        $this->load->template('/managers/vwStaff',$arr);
    }

    public function register(){ 
        if(empty( $this->input->post() )) $this->output_false( NULL,'error data' );
        $data = $this->input->post();

        if($data['id']){ 
            //update form
            if(!$this->user_model->update($data)){
                $this->output_false( NULL, 'Update was fail!' );    
            }
            $this->output( NULL, 'update is successful' );
        }else{
            //save form
            if(!$this->user_model->add($data)){
                $this->output_false( NULL, 'register is false, user has existed' );    
            }
            $this->output( NULL, 'register is successful' );
        }
        
    }

    public function info(){
        if(empty( $this->input->post() )) $this->output_false( NULL,'error data' );
        $data = $this->input->post();
        $result = $this->user_model->get($data['id']);
        if(!$result) $this->output_false(NULL, 'No Data');
        $this->output($result);
    }

    public function delete(){
        $data = $this->input->post();
        if(empty($data)) $this->error();
        $result = $this->user_model->delete($data['id']);
        if($result){
            $this->output(NULL,'Delete successful');
        }
        $this->output_false($result, 'Delete false');
    }

    public function reset_password(){
        $data = $this->input->post();
        if(empty($data)) $this->error();
        $data['password'] = md5('123');
        if($this->user_model->update($data)){
            $this->output(NULL, 'Reset successfull');
        }
        $this->output_false(NULL, 'Reset fail');
    }

    public function groups(){
        $this->load->model('group_model');
        return $this->group_model->getAll();
    }


}