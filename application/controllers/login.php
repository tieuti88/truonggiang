<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends STPK_Controller {

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
    }

    public function index() {
      $arr['page'] ='login';
      if($this->session->userdata('is_client_login')){
        redirect('/client');  
      }
      $this->load->view('vwLogin',$arr);
    }

    public function do_login() {
        if ($this->session->userdata('is_client_login')) {
            redirect('/client');
        } else {
            $user = $_POST['email'];
            $password = $_POST['password'];

            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('/login');
            } else {
                $enc_pass  = md5($password);
                $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
                $val = $this->db->query($sql,array($user ,$enc_pass ));

                if ($val->num_rows) {
                    foreach ($val->result_array() as $recs => $res) {
                        $this->session->set_userdata(array(
                            'uid' => $res['id'],
                            'user_name' => $res['user_name'],
                            'email' => $res['email'],                            
                            'is_client_login' => true,
                            'roles' => array($res['role']),
                            'id_roles' => array($res['role']),
                            'social_info' => null,
                                )
                        );
                    }
                    redirect('/client');
                } else {
                    $err['error'] = 'Username or Password incorrect';
                    $this->load->view('/vwlogin', $err);
                }
            }
        }
           }

        
    public function logout() {
        $this->session->unset_userdata('uid');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('roles');
        $this->session->unset_userdata('is_client_login');   
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('/login');
    }

        public function ex(){
        $result = $this->db->query('ALTER TABLE `project` ADD COLUMN `desciption` text DEFAULT NULL AFTER `thumb`, ADD COLUMN `customer_name` varchar(110) DEFAULT NULL AFTER `desciption`');
        print_r($result);exit;

    }


}