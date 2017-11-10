<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Order extends STPK_Controller {

    /**
     * @author UnoTrung 
     * 2017-08-16
     * Desc : controller for order manager
     */

    public function __construct() {
        parent::__construct();
        $this->load->model('order_model');
        $this->load->model('group_model');
        $this->load->library("pagination");
    }

    public function index() {
        $action = $this->router->fetch_method();
        if(!$this->acl->has_permission(strtolower(__CLASS__), array($action))) exit('Not Permission');
        //template
        $arr['script'] = 'order';
        $arr['menu'] = 'order';
        $arr['submenu'] = $this->router->fetch_method();
        $arr['button'] = $this->button();
        $arr['groups'] = json_encode($this->group_model->select_group());

        $this->load->template('order/vwIndex',$arr);
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
        $data['recordsTotal'] = $this->order_model->count_all();
        $data['recordsFiltered'] = $this->order_model->count_all();
        $data['data'] = $this->order_model->getAll($order);
        echo json_encode($data);
        exit;
    }

    public function button(){
        $button = array();
        if($this->acl->has_permission(strtolower(__CLASS__), 'order_assign')){
            $button['unsigned'] = '<a data-type="unsigned" class="btn btn-danger" href="#" title="Tiep nhan"><i class="fa fa-plus"></i> Tiếp nhận</a><br/>';
        }
        if($this->acl->has_permission(strtolower(__CLASS__), 'order_market')){
            $button['market'] = '<a data-type="market" class="btn btn-primary" href="#" title="Len Market"><i class="fa fa-edit"></i> Lên Market</a><br/>';
        }
        if($this->acl->has_permission(strtolower(__CLASS__), 'order_gotoprint')){
            $button['processing'] = '<a data-type="processing" class="btn btn-success" href="#" title="Xuất in"><i class="fa fa-print"></i> Xuất in</a><br/>';
        }
        if($this->acl->has_permission(strtolower(__CLASS__), 'order_packing')){
            $button['packing'] = '<a data-type="packing" class="btn btn-warning" href="#" title="Xuất in"><i class="fa fa-cubes"></i> Đóng gói & lưu kho</a><br/>';
        }
        if($this->acl->has_permission(strtolower(__CLASS__), 'order_delivery')){
            $button['order_delivery'] = '<a data-type="order_delivery" class="btn btn-default" href="#" title="Giao Hàng"><i class="fa fa-truck"></i> Giao Hàng</a><br/>';
        }
        if($this->acl->has_permission(strtolower(__CLASS__), 'order_cancel')){
            $button['cancel'] = '<a data-type="order_cancel" class="btn btn-default" href="#" title="Huỷ đơn hàng"><i class="fa fa-remove"></i> Huỷ đơn hàng</a><br/>';
        }
        if(empty($button)) $button['done'] = '<span class="label bg-gray">Đã giao </span><br/>';
        return $button;
    }

    public function change_status(){
        if(!$this->input->post()) $this->output_false(NULL, "Miss parameter");
        $data = $this->input->post();
        $next_section = '';
        switch ($data['type']) {
            case 'unsigned':
                $next_section = 'market';
                break;
            case 'market':
                $next_section = 'processing';
                break;
            case 'processing':
                $next_section = 'packing';
                break;
            case 'packing':
                $next_section = 'order_delivery';
                break;
            case 'order_delivery':
                $next_section = 'done';
                break;
            case 'order_cancel':
                $next_section = 'order_cancel';
                break;
            
            default:
                $next_section = NULL;
                break;
        }
        $this->load->model('group_model');
        $group_value = $this->session->userdata('roles');

        if($group_value[0] != 'admin') 
            $group = $this->group_model->getIdByRole($group_value[0])[0];
        $arr = array(
            "order_id" => $data['id'],
            "group_value" => $group_value[0],
            "group_id" => ($group_value[0] == 'admin')?0:$group->id,
            "status"   => $next_section,
            "user_follow_id"=> $this->session->userdata('uid'),
            "user_follow"=> $this->session->userdata('email'),
            "note" => isset($data['note'])?$data['note']:''

        );

        $result = $this->order_model->add_order_group($arr);
        // if(!$result) $this->output_false($result,"has error");
        $this->output(NULL,"Thành công ");

    }

    public function info(){
        if(!$this->input->post()) $this->output_false(NULL, "Miss parameter");
        $data = $this->input->post();
        $result['order'] = $this->order_model->get($data['id']);
        $result['order_group'] = $this->order_model->get_order_group($data['id']);
        if(!$result['order'])
            $this->output_false(NULL, 'No data');
        $this->output($result,"Thành công");
    }

    


}