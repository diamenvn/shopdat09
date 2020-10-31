<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Acc extends CI_Controller {

public function __construct(){
		parent::__construct();

        // To use site_url and redirect on this controller.
        $this->load->helper('url');
		$this->load->model('shop_model');	
		$this->load->library('facebook'); 

        $this->load->library('user_agent');

	}

	
	public function index($code){
        $data['login_url'] = $this->facebook->login_url();
        $user = is_user();
        $data['user_profile'] = $user;
        $data['money'] = $user['cash'];

		if($code)
		{
		$query = $this->db->where('noidung',$code)->get('baidang');
		$data['query'] = $query->result_array();
		$q = $data['query'];


        
		if ($query->num_rows() > 0)
		{
		$data['title'] = 'Tài khoản '.$q[0]['loainick'].' rank '.$q[0]['rank'].' giá rẻ '.$q[0]['gia'].' #'.$code;

		$data['desc'] = 'Tài khoản '.$q[0]['loainick'].' #'.$q[0]['noidung'].'  - Có '.$q[0]['count_champ'].' tướng  '.$q[0]['count_skin'].' skin - Giá: '.number_format($q[0]['gia'], 0, '.', '.').' vnđ -'.$q[0]['thongtin'].'';
		$data['querylmht'] = $this->db->where(array('loainick'=>$data['query'][0]['loainick'], 'trangthai' => 'on','gia' => $data['query'][0]['gia']))->order_by("noidung","desc")->limit(12,0)->get("baidang");

		$data['not'] = true;
		}
		else
		{
		    $data['title'] = 'Không tồn tại';
		$data['not'] = false;
		}
			$data['total']= 0;



        $data['mobile'] = $this->agent->is_mobile();

		$this->load->template('acc_views',$data);



		}
   

	
	}
	
	
}
