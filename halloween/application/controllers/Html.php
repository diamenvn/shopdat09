<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Html extends CI_Controller {

public function __construct(){
		parent::__construct();

        // To use site_url and redirect on this controller.
        $this->load->helper('url');
		$this->load->model('shop_model');	
		$this->load->library('facebook'); 


	}
	

	public function random(){
		$user = is_user();
	    if($user['quay'] == 0 && $user['cash'] < 10000){
	        echo '{"link":"https:\/\/taikhoangame.com\/nap-tien.html","message":"Kh\u00f4ng \u0111\u1ee7 l\u01b0\u1ee3t quay. Vui l\u00f2ng n\u1ea1p th\u1ebb \u0111\u1ec3 c\u00f3 th\u00eam l\u01b0\u1ee3t quay."}';
	    } else {
	        $value = array('6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','1','6','6','2','6','4','5','6','7','8','9','10','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6','6');
	        $value11 = array('68','71','79','80','87','88','93','94','95','96');
	        $vl = $value[rand(0,count($value))];
	        echo $vl;
	        $this->db->where('id',$user['id'])->update('nguoidung',array('temp_quay'=>$value11[$vl - 1]));
	    }
	    
	}
    public function load(){
        echo '[{"id":68,"description":"Account LMHT","text":"Acc LOL","image":"/img/LuckyItem/1.png"},{"id":71,"description":"Account LMHT","text":"Acc LOL","image":"/img/LuckyItem/2.png"},{"id":79,"description":"Chúc Bạn May Mắn","text":"Lucky","image":"/img/LuckyItem/3.png"},{"id":80,"description":"Thẻ Cào 10k","text":"Card ","image":"/img/LuckyItem/4.png"},{"id":87,"description":"+ 10.000 VNĐ","text":"10k","image":"/img/LuckyItem/5.png"},{"id":88,"description":"Chúc Bạn May Mắn","text":"Lucky","image":"/img/LuckyItem/6.png"},{"id":93,"description":"+100 RP","text":"+100 RP","image":"/img/LuckyItem/7.png"},{"id":94,"description":"+ 30.000 VNĐ","text":"30k","image":"/img/LuckyItem/8.png"},{"id":95,"description":"+ 50.000 VNĐ","text":"50k","image":"/img/LuckyItem/9.png"},{"id":96,"description":"+ 100.000 VNĐ","text":"100k","image":"/img/LuckyItem/10.png"}]';
    }
    public function save($id){
            $user = is_user();
            if($user['temp_quay'] != $id) die();

            $solve = 0;
            
            
            switch($id){
                case '68':
                    $desc = 'Acc LOL';
                    $tien = '0';
                break;
                case '71':
                    $desc = 'Acc LOL';
                    $tien = '0';
                break;
                case '79':
                    $desc = 'Chúc Bạn May Mắn';
                    $solve = 1;

                    $tien = '0';
                break;                
                case '80':
                    $desc = 'Thẻ Cào 10k';
                    $tien = '';
                break;         
                case '87':
                    $desc = '+ 10.000 VNĐ';
                    $solve = 1;
                    $tien = '10000';
                break;
                case '88':
                    $desc = 'Chúc Bạn May Mắn';
                    $solve = 1;
                    $tien = '0';
                break;
                case '93':
                    $desc = '+100 RP';
                    $tien = '0';
                break;
                case '94':
                    $desc = '+ 30.000 VNĐ';
                                        $solve = 1;

                    $tien = '30000';
                break;    
                case '95':
                    $desc = '+ 50.000 VNĐ';
                    $tien = '50000';
                                        $solve = 1;

                break;
                case '96':
                    $desc = '+ 100.000 VNĐ';
                    $tien = '100000';
                    $solve = 1;

                break;      
            }
            
            
            if($user['cash'] >= 10000 || $user['quay'] > 0){
                $mount = $user['cash'];

                if($user['quay'] >= 1 ){
                
                    $this->db->where('id',$user['id'])->update('nguoidung',array('quay'=>$user['quay'] - 1));
                
                } else {
                    $mount = $mount - 10000;
                    $this->db->where('id',$user['id'])->update('nguoidung',array('cash'=>$mount));


                }
                
                $this->db->insert('top',array('uid'=>$user['uid'],'uname'=>$user['hovaten'],'ucash'=>$tien,'id_q'=>$id,'noidung'=>$desc,'solve'=>$solve));
                $this->db->where('id',$user['id'])->update('nguoidung',array('cash'=>$mount + $tien,'temp_quay'=>0));
                echo json_encode(array('info'=>$desc,'message'=>$desc));
                
            }
        }

    public function quayso(){
        	$user = is_user();
	        $data['user_profile'] = $user;
	        $data['money'] = $user['cash'];
	        $data['title'] = 'Quay số trúng thưởng';
        
        	$this->load->template('quayso',$data);

    }
		public function ref(){
			$user = is_user();
	        $data['user_profile'] = $user;
	        $data['money'] = $user['cash'];
	        $data['title'] = 'Hướng dẫn sử dụng mã giới thiệu';

			$this->load->template('ref',$data);
		}
		public function muaacc(){
			$user = is_user();
	        $data['user_profile'] = $user;
	        $data['money'] = $user['cash'];
	        $data['title'] = 'Hướng dẫn Mua Acc';

			$this->load->template('huong-dan-mua-acc',$data);
		}
		public function checkskin(){
			$user = is_user();
	        $data['user_profile'] = $user;
	        $data['money'] = $user['cash'];
	        $data['title'] = 'Tool check skins liên minh mới nhất';
	        $data['desc'] = 'Tool check skins liên minh mới nhất';

			$this->load->template('check-skin',$data);
		}
		public function dichvu(){
			$user = is_user();
	        $data['user_profile'] = $user;
	        $data['money'] = $user['cash'];
	        $data['title'] = 'Điều khoản dịch vụ';

			$this->load->template('dichvu',$data);
		}
		public function baomat(){
			$user = is_user();
	        $data['user_profile'] = $user;
	        $data['money'] = $user['cash'];
	        $data['title'] = 'Điều khoản dịch vụ';

			$this->load->template('baomat',$data);
		}
		public function hoantra(){
			$user = is_user();
	        $data['user_profile'] = $user;
	        $data['money'] = $user['cash'];
	        $data['title'] = 'Điều khoản dịch vụ';

			$this->load->template('hoantra',$data);
		}
}

	
	
	