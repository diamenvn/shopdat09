<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once("BiasedRandom/Element.php");
require_once("BiasedRandom/Randomizer.php");
use BiasedRandom\Element;
use BiasedRandom\Randomizer;



class Quay extends CI_Controller {

public function __construct(){
		parent::__construct();
        date_default_timezone_set( 'Asia/Ho_Chi_Minh' );

        // To use site_url and redirect on this controller.
        $this->load->helper('url');
		$this->load->model('shop_model');

	}

   public function buy(){
        $user = is_user();
        $data['user_profile'] = $user;

        if($user){
        	$sl = $this->input->post('quantity');

        	if($sl < 0) die();


        	$amount = $sl * get_value('price');

        	if($user['money'] >= $amount){


        			$this->db->where('id',$user['id'])->update('user',array('money'=>$user['money'] - $amount));

        			$this->db->where('id',$user['id'])->update('user',array('quay'=>$user['quay'] + $sl));



        			echo json_encode(array('check'=>true,'qty'=>$sl,'money'=>$user['money'] - $amount));




        	} else {

        			echo json_encode(array('check'=>false,'qty'=>$sl,'money'=>$user['money']));


        	}


       	}

   }
   public function quay(){

        $user = is_user();
        $data['user_profile'] = $user;

        if($user){


        if($user['money'] >= 20000){
        	$status = 1;
			$item = 0;

			$this->db->where('id',$user['id'])->update('user',array('money'=>$user['money'] - 20000));
			$randomizer = new Randomizer();


		    $randomizer->add( new Element('1', get_value('quay_1'))) // kim cương
		               ->add( new Element('2', get_value('quay_2'))) // kim cương
		               ->add( new Element('3', get_value('quay_3'))) // thêm lượt

		               ->add( new Element('4', get_value('quay_4'))) // kim cương
		               ->add( new Element('5', get_value('quay_5'))) // gas
		               ->add( new Element('6', get_value('quay_6'))) //cộng tiền
                   ->add( new Element('7', get_value('quay_7'))) //FF Vip
		               ->add( new Element('8', get_value('quay_8'))); // bad

		    $get_num = $randomizer->get();

		    $location = 36 * $get_num;
		    switch ($get_num) {

		    		case '1':
		    			$str = 'Kim cương'; // Tặng thêm lượt cũ

	$acc = $this->db->where(array('loainick'=>'FFTHUONG','trangthai'=>'on'))->get('baidang')->row_array();

		           		if(empty($acc)){

		           			$noidung = 'Kho acc chúng tôi đã hết';

							//$this->db->where('id',$user['id'])->update('user',array('quay'=>$user['quay']));


		           		} else {
							$dataacc = array("trangthai" => "off");
							$this->shop_model->updatedbacc($acc['noidung'],$dataacc);
							$noidung = $str.' - '.$acc['taikhoan'].' - '.$acc['matkhau'];


		           		}


						$datamua = array('loainick'=> 'FFTHUONG'
											,'uid' => $user['fb']
											,'name' =>  $user['name']
											, 'noidung' =>  $noidung
											, 'price' =>  0
											, 'phanthuong'=> $str
											, 'date' => time());
						$this->shop_model->insertdba($datamua,'lichsuquay');
		    		break;
		           	case '2':
		           		$str = 'Kim cương ngẫu nhiên'; // Acc Trắng Thông Tin cũ
		           		$acc = $this->db->where(array('loainick'=>'KIMCUONG','trangthai'=>'on'))->get('baidang')->row_array();

		           		if(empty($acc)){

		           			$noidung = 'Kho acc chúng tôi đã hết';

							//$this->db->where('id',$user['id'])->update('user',array('quay'=>$user['quay']));


		           		} else {
							$dataacc = array("trangthai" => "off");
							$this->shop_model->updatedbacc($acc['noidung'],$dataacc);
							$noidung = $str.' - '.$acc['taikhoan'].' - '.$acc['matkhau'];


		           		}


						$datamua = array('loainick'=> 'VIP'
											,'uid' => $user['fb']
											,'name' =>  $user['name']
											, 'noidung' =>  $noidung
											, 'price' =>  0
											, 'phanthuong'=> $str
											, 'date' => time());
						$this->shop_model->insertdba($datamua,'lichsuquay');






		           	break;

		           	case '3':
		           		$str = 'Thêm lượt quay'; // Acc Nhiều Tướng cũ


//$this->db->where('id',$user['id'])->update('user',array('quay'=>$user['quay']));
							$datamua = array('loainick'=> 'FFTHEM'
											,'uid' => $user['fb']
											,'name' =>  $user['name']
											, 'noidung' =>  'Tặng thêm lượt quay'
											, 'price' =>  0
											, 'phanthuong'=> 'Tặng thêm lượt quay'
											, 'date' => time());
						$this->shop_model->insertdba($datamua,'lichsuquay');


		           	break;

		           	case '4':
		           		$str = 'Kim cươngg';// Cộng tiền cũ

					$datamua = array('loainick'=> 'BAD'
											,'uid' => $user['fb']
											,'name' =>  $user['name']
											, 'noidung' =>  'Chúc bạn may mắn'
											, 'price' =>  0
											, 'phanthuong'=> $str
											, 'date' => time());
						$this->shop_model->insertdba($datamua,'lichsuquay');


		           	break;
					case '5':
		           		$str = 'Nick Gas'; // Vip cũ
		           		$acc = $this->db->where(array('loainick'=>'FFGAS','trangthai'=>'on'))->get('baidang')->row_array();

		           		if(empty($acc)){

		           			$noidung = 'Kho acc chúng tôi đã hết';

							//$this->db->where('id',$user['id'])->update('user',array('quay'=>$user['quay']));


		           		} else {
							$dataacc = array("trangthai" => "off");
							$this->shop_model->updatedbacc($acc['noidung'],$dataacc);
							$noidung = $str.' - '.$acc['taikhoan'].' - '.$acc['matkhau'];


		           		}


						$datamua = array('loainick'=> 'FFGAS'
											,'uid' => $user['fb']
											,'name' =>  $user['name']
											, 'noidung' =>  $noidung
											, 'price' =>  0
											, 'phanthuong'=> $str
											, 'date' => time());
						$this->shop_model->insertdba($datamua,'lichsuquay');


		           	break;
					case '6':
		           		$str = 'Cộng tiền'; // Chúc bạn may mắn cũ


$tien = array(10000,20000,30000);
		           		$trigia = $tien[rand(0,count($tien) - 1)];
		           		$this->db->where('id',$user['id'])->update('user',array('money'=>$user['money'] + $trigia));
						$datamua = array('loainick'=> 'FFTIEN'
											,'uid' => $user['fb']
											,'name' =>  $user['name']
											, 'noidung' =>  'Cộng + '.number_format($trigia)
											, 'price' =>  0
											, 'phanthuong'=> $str
											, 'date' => time());
						$this->shop_model->insertdba($datamua,'lichsuquay');

		           	break;
		           	case '7':
		           		$str = 'Nick FreeFire VIP'; // VIP
		           		$acc = $this->db->where(array('loainick'=>'FFVIP','trangthai'=>'on'))->get('baidang')->row_array();

		           		if(empty($acc)){

		           			$noidung = 'Kho acc chúng tôi đã hết';

							//$this->db->where('id',$user['id'])->update('user',array('quay'=>$user['quay']));


		           		} else {
							$dataacc = array("trangthai" => "off");
							$this->shop_model->updatedbacc($acc['noidung'],$dataacc);
							$noidung = $str.' - '.$acc['taikhoan'].' - '.$acc['matkhau'];


		           		}


						$datamua = array('loainick'=> 'FFVIP'
											,'uid' => $user['fb']
											,'name' =>  $user['name']
											, 'noidung' =>  $noidung
											, 'price' =>  0
											, 'phanthuong'=> $str
											, 'date' => time());
						$this->shop_model->insertdba($datamua,'lichsuquay');


		           	break;
		           	case '8':
		           		$str = 'Chúc bạn may mắn lần sau'; // Nick ngẫu nhiên cũ

					$datamua = array('loainick'=> 'FFBAD'
											,'uid' => $user['fb']
											,'name' =>  $user['name']
											, 'noidung' =>  'Chúc bạn may mắn'
											, 'price' =>  0
											, 'phanthuong'=> $str
											, 'date' => time());
						$this->shop_model->insertdba($datamua,'lichsuquay');

		           	break;


		           	default:

		           	break;
		           }








        } else {

        	$array = array('check'=>false,'location'=>0,'times_play'=>$user['quay'],'money'=>$user['money'],'deg'=>0,'content'=>'Bạn không đủ tiền','msg'=>'Bạn không đủ tiền');

        	echo json_encode($array);
        	die();
        }

        	$array = array('check'=>true,'location'=>$location,'times_play'=>$user['quay'] - 1,'money'=>$user['money'],'deg'=>$get_num * 45,'content'=>$str);

        echo json_encode($array);
    } else {

    	$array = array('check'=>false,'msg'=>'Bạn chưa đăng nhập','tien'=>false);

        echo json_encode($array);
    }

    }





	public function napthe(){
	    $user = is_user();
	    $data['user_profile'] = $user;
	    $data['money'] = $user['money'];
	    $data['title'] = 'Nạp thẻ ';
	    $data['desc'] = 'Nạp thẻ ';

	    $this->load->template('napthe',$data);


	}
	public function quay50k(){
	    $user = is_user();
	    $data['user_profile'] = $user;
	    $data['money'] = $user['money'];
	    $data['title'] = 'Quay 50K ';
	    $data['desc'] = 'Quay 50K';

	    $this->load->template('50k',$data);


	}


/*    public function logout(){


		$this->session->sess_destroy();

        redirect(base_url());
    }*/
}
