<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $this->load->model("Project_model");
        $this->load->model("Customer_model");
        $this->load->model("Catagory_model");
        $this->load->model("Comment_model");
        $this->load->library("pagination");
    }

    public function index() {

        $arr['page'] ='home';
        $arr['projects'] =$this->project();
        $arr['customers'] =$this->customer();
        $arr['category'] =$this->catagory();
        $arr['arrCat'] =$this->array_catagory($arr['category']);
        $this->load->view('vwHome',$arr);

    }

    public function do_login() {

        if ($this->session->userdata('is_client_login')) {
            redirect('home/loggedin');
        } else {
            $user = $_POST['username'];
            $password = $_POST['password'];

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
 /*
         * Code By Abhishek R. Kaushik
         * Sr. Software Developer 
         */
                $this->load->view('login');
            } else {
                $sql = "SELECT * FROM users WHERE user_name = '" . $user . "' AND user_hash = '" . md5($password) . "'";
                $val = $this->db->query($sql);


                if ($val->num_rows) {
                    foreach ($val->result_array() as $recs => $res) {

                        $this->session->set_userdata(array(
                            'id' => $res['id'],
                            'user_name' => $res['user_name'],
                            'email' => $res['email'],                            
                            'is_client_login' => true
                                )
                        );
                    }
                    redirect('calls/call');
                } else {
                    $err['error'] = 'Username or Password incorrect';
                    $this->load->view('login', $err);
                }
            }
        }
           }

        
    public function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('title');
         $this->session->unset_userdata('ag_country');
        
        $this->session->unset_userdata('is_client_login');
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
        redirect('home', 'refresh');
    }

    public function project() {

        $config['base_url'] = base_url('home/index');
        $config['total_rows'] = $this->Project_model->count_all();
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
        $arr['projects'] = $this->Project_model->list_page($config["per_page"],$page);
        $arr['pagination'] = $this->pagination->create_links();
        return $arr;
    }

    public function detail_project($id){
        $arr = array();
        $this->Project_model->seen($id);
        $arr['detail'] = $this->Project_model->get($id);
        $arr['more_pro'] = $this->Project_model->getMore($id);
        $arr['comment'] = $this->Comment_model->getByProject($id);
        $this->load->view('vwDetail',$arr);
    }

    public function video($id){
        $this->load->view('vwVideo');
    }

    private function customer(){
        return $this->Customer_model->getAll();
    }
    
    private function catagory(){
        return $this->Catagory_model->getAll();
    }

    private function array_catagory($allCat){
        $arr = array();
        foreach ($allCat as $key => $value) {
            $arr[$value->id] = $value->seo_title;
        }
        return $arr;
    }

    public function like(){
        $id = $_POST['id'];
        echo $this->Project_model->like($id);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */