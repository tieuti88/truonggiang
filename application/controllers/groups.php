<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Groups extends STPK_Controller {

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
        $this->load->model('group_model');
        $this->load->library("pagination");
        $action = $this->router->fetch_method();
        if(!$this->acl->has_permission(strtolower(__CLASS__), array($action))) exit('Not Permission');
    }

    public function index() {
        $arr['page'] = 'groups';

        $config['base_url'] = base_url('/groups/index');
        $config['total_rows'] = $this->group_model->count_all();
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
        $arr['groups'] = $this->group_model->list_page($config["per_page"],$page);
        $arr['pagination'] = $this->pagination->create_links();
        // $arr['permissions'] = $this->get_permission();
        $arr['script'] = 'groups';
        $arr['menu'] = 'managers';
        $arr['submenu'] = 'groups';
        $this->load->template('/managers/vwGroup',$arr);
    }

    public function add(){ 
        if(empty( $this->input->post() )) $this->output_false( NULL,'error data' );
        $data = $this->input->post();
        $data['group_value'] = strtolower($data['group_value']);
        if($data['id']){ 
            //update form
            if(!$this->group_model->update($data)){
                $this->output_false( NULL, 'Update was fail!' );    
            }
            $this->output( NULL, 'update is successful' );
        }else{
            //save form
            if(!$this->group_model->add($data)){
                $this->output_false( NULL, 'register is false, user has existed' );    
            }
            $this->output( NULL, 'register is successful' );
        }
        
    }

    public function view(){
        if(empty( $this->input->post() )) $this->output_false( NULL,'error data' );
        $data = $this->input->post();
        $result = $this->group_model->get($data['id']);
        if(!$result) $this->output_false(NULL, 'No Data');
        $this->output($result);
    }

    public function delete(){
        $data = $this->input->post();
        if(empty($data)) $this->error();
        $result = $this->group_model->delete($data['id']);
        if($result){
            $this->output(NULL,'Delete successful');
        }
        $this->output_false($result, 'Delete false');
    }

    public function status(){
        $data = $this->input->post();
        if(empty($data)) $this->error();
        $data['status'] = ($data['status']=='active')?'denied':'active';
        $result = $this->group_model->status($data);
        if($result){
            $this->output(NULL,'Update successful');
        }
        $this->output_false($result, 'Update false');
    }

    public function permission($id = NULL){
        if(empty($id)) $this->error();
        $arr['script'] = 'groups';
        $arr['menu'] = 'managers';
        $arr['submenu'] = 'groups';
        $arr['group'] = $this->group_model->get($id)[0];

        //get permission
        $this->load->model('permission_model');
        $permissions = $this->permission_model->getByRole($arr['group']->group_value);
        $arr['all_permissions'] = $this->format_array( $this->permission_model->list_page() );

        $arr['permission'] = $permissions;
        $this->load->template('/managers/vwPermission',$arr);
    }

    public function add_permission(){
        if(empty( $this->input->post() )) $this->output_false( NULL,'error data' );
        $data = $this->input->post();

        $this->load->model('permission_model');

        $result = $this->permission_model->add($data);
        if($result){
            $this->output(NULL,'Add successful');
        }
        $this->output_false($result, 'Add false');
    }

    private function format_array($permissions){
        if( empty($permissions) ) $this->output_false( NULL, 'Empty data' );
        $temp_config['permission'] = array();
        foreach ($permissions as $permission) {
            if(!isset($temp_config['permission'][$permission->controller]))
                $temp_config['permission'][$permission->controller] = array();
            array_push($temp_config['permission'][$permission->controller],[$permission->action => json_decode($permission->role)]);

        }
        foreach ($temp_config['permission'] as $key => $value) {
            
            foreach ($value as $k => $arrAction) {
                $config['permission'][$key][key($arrAction)] = $arrAction[key($arrAction)];
            }
        }
        return $config['permission'];
    }

    /**
    * @author Unotrung
    * update role for group
    */
    public function update_permission(){
        if(empty( $this->input->post() )) $this->output_false( NULL,'Empty data' );
        $data = $this->input->post();

        $this->load->model('permission_model');
        $resource = array();
        $result = array();
        foreach ($data['permission'] as $controller => $action) {

            if(!empty($action)){
                foreach ($action as $action => $active) {
                    $resource['controller'] = $controller;
                    $resource['action'] = $action;

                    //old role
                    $row = $this->permission_model->getUnit($resource);
                    $role = json_decode($row[0]->role);
                    
                        if($active){
                            if(!strpos($row[0]->role,$data['role'])){
                                array_push($role,$data['role']);
                            }
                        }else{
                            if(strpos($row[0]->role,$data['role'])){
                                $key = array_search($data['role'],$role);
                                unset($role[$key]);
                            }
                        }
                    $resource['role'] = json_encode($role);
                    if(!$this->permission_model->update_noId($resource)){
                        $result[] = $controller."-".$action."-".$data['role'];
                    };
                }
            }
        }

        if(!$result){
            $this->output(NULL,'Add successful');
        }
        $this->output_false($result, 'Add false');
    }




}