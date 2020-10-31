<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Lichsu extends CI_Controller {

public function __construct(){
		parent::__construct();

        // To use site_url and redirect on this controller.
        $this->load->helper('url');
		$this->load->model('shop_model');	
		$this->load->library('facebook'); 


}
	public function add(){
	  $get = file_get_contents('http://banacclmht.net/real.txt');
	  
	  if($get == "1"){
	  $array = array('200000','300000','400000','500000','250000','240000','210000','350000','450000');
	   
	  $this->db->order_by('id', 'RANDOM');
      $this->db->limit(1);
      $query = $this->db->get('nguoidung')->result_array();

	   							$datamua = array('loainick'=>'LMHT'
								,'uid' => $query[0]['uid']
															 , 'idacc' => rand(1000,3000)
															 ,'name' =>  $query[0]['hovaten']
															 , 'price' =>  $array[rand(0,8)]
															  , 'real' =>  1

															 , 'date' => date("H:i Y-m-d"));
							$this->shop_model->insertdba($datamua,'lichsumua');
	  }
	}
	
	public function index(){


        $user = is_user();
        $data['user_profile'] = $user;
        $data['money'] = $user['cash'];
        $data['title'] = 'Lịch sử giao dịch';
		$data['query'] = $this->shop_model->getHis($user['uid']);

		$this->load->template('lichsugiaodich',$data);
	}
	
	 public function nap(){


        $user = is_user();
        $data['user_profile'] = $user;
        $data['money'] = $user['cash'];
		$data['querynap'] = $this->shop_model->getHisnap($user['uid']);
        $data['title'] = 'Lịch sử nạp';

		$this->load->template('lichsunap',$data);
	}
}

	
	
	