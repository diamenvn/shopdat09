<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {

public function __construct(){
		parent::__construct();

        // To use site_url and redirect on this controller.
	        $this->load->helper('url');
			$this->load->model('shop_model');
			$this->load->library('facebook'); // Automatically picks appId and secret from config


		    $username = $this->input->server('PHP_AUTH_USER');
		    $password = $this->input->server('PHP_AUTH_PW');
			if ($username != 'admin' || $password != 'admin'){
			header('WWW-Authenticate: Basic realm="Xin vui long khai bao thong tin yeu cau truoc khi duoc chuyen den bang dang nhap"');
			header('HTTP/1.0 401 Unauthorized');
			header('HTTP/1.1 401 Unauthorized');

			//Trang sẽ hiển thị khi thông tin khai báo sai. (support HTML).
			echo '<center>Access Denied!!!</center>';
			die();
			}

	}




public function upload(){
	 if(is_array($_FILES)) {
				if(is_uploaded_file($_FILES['phuoc']['tmp_name'])) {
					$sourcePath = $_FILES['phuoc']['tmp_name'];


					$json = file_get_contents($_FILES["phuoc"]["tmp_name"]);
					$result_champions = array();    
					$result_skins = array();
					$loop = json_decode($json,true);
					foreach ($loop as $i => $code) {
						if ($code['ownership']['owned'] == TRUE){

						    $result_champions[] =  ''.$code['id'].'-'.$code['name'];
						}

						    foreach ($code['skins'] as $key => $skins) {


					    	if($key >= 1){
					    		if ($skins['ownership']['owned'] == TRUE){
					    			$result_skins[] =  'championsskin_'.$skins['id'].'='.$skins['name'];

					    		}

					    	}
					    }
					}

					$mang = array('tuong' => implode($result_champions, '|'),'ctuong' => count($result_champions),'skin' => implode($result_skins, '|'),'cskin' => count($result_skins));
					echo json_encode($mang);
					die();
					}
				}
}


					
public function add_thongbao(){
    $user = is_user();
    if($user['admin'] < 2) die();
    if(empty($_POST['thongbao'])){
        echo json_encode(array('err'=>1,'data'=>'Chua nhap gi ca'));
    } else {
		$file = $_SERVER['DOCUMENT_ROOT'].'/thongbao.xt';
		// Open the file to get existing content
		// Append a new person to the file
		$current = trim($_POST['thongbao']);
		// Write the contents back to the file
		file_put_contents($file, $current);

		echo json_encode(array('err'=>0,'data'=>'dang thanh cong'));	 
    }
    
}
    public function splitNewLine($text) {
        $code=preg_replace('/\n$/','',preg_replace('/^\n/','',preg_replace('/[\r\n]+/',"\n",$text)));
        return explode("\n",$code);
    }


public function add_random(){
        $user = is_user();
        if($user['admin'] < 1) die();
        if(empty($_POST['text'])){
            echo json_encode(array('err'=>1,'data'=>'Chua nhap gi ca'));
        } else {
            $acc = $this->splitNewLine($_POST['text']);
            foreach($acc as $value){
            $text = explode('|',$value);
            $ghichu = "";
            if(isset($text[2])){
                $ghichu = $text[2];
                
                
			}
			$loai = $this->input->post('loai');
			if($loai == 'SOCAP'){
			    $gia = 9000;
			    $hinhanh = 'socap.png';

			} else if($loai == 'TRUNGCAP'){
			    $gia = 15000;
			    $hinhanh = 'trungcap.png';

			} else if($loai == 'CAOCAP'){
			    $gia = 25000;
                $hinhanh = 'caocap.png';
			} else if($loai == 'SIEUCAP'){
			    $gia = 50000;
			    $hinhanh = 'sieucap.png';

			} else {
			    			    $hinhanh = 'sieucap.png';

			    $gia = 10000000;
			}
            $data = array(
                'loainick' => $this->input->post('loai')
				,'taikhoan' => $text[0]
				,'hinhanh'=> $hinhanh
				,'gia'=>$gia
                , 'matkhau' => $text[1]
                , 'time' => time()
				, 'trangthai' => 'on'
				,'kichhoat'=>'yes');
                 $this->db->insert('baidang',$data);
        }
                    echo json_encode(array('err'=>0,'data'=>'dang thanh cong'));     

    }
    }



public function setting(){
	    $user = is_user();
		$data['user_profile']  = $user;

        if ($user['admin'] >= 2 )	{


        	if(isset($_POST) && $_POST){


        			foreach ($_POST as $key => $value) {
        				$this->db->where('key',$key)->update('freefire_setting',array('value'=>$value));
        				# code...
        			}
        			redirect('admin/setting');



        		


        	} else {



			    $this->load->view('header_admin',$data);
		        $this->load->view('setting',$data);
		        $this->load->view('footer_admin',$data);        		
        	}

    	} else {
    		redirect(base_url());

    	}

}
public function history(){
	    $user = is_user();
		$data['user_profile']  = $user;

        if ($user['admin'] >= 2 )	{
		$data['lienminh'] = $this->db->where(array('loainick'=>'LMHT'))->count_all_results("baidang");
		$data['fifa'] = $this->db->where(array('loainick'=>'CF', 'trangthai'=> 'on'))->count_all_results("baidang");
	    $data['saled'] = $this->db->where(array('real'=>0))->count_all_results("lichsumua");
	    $data['sale'] = $this->db->where(array('real'=>0))->order_by("uid","desc")->get("lichsumua")->result_array();
	    $data['addmoney'] = $this->db->order_by("uid","desc")->get("lichsunap")->result_array();
		$data['user'] = $this->db->count_all('nguoidung');


		$data['queryall'] = $this->shop_model->getHisall();
		$data['querynapall'] = $this->shop_model->getHisnapall();
	    $this->load->view('header_admin',$data);
        $this->load->view('admin_his',$data);
        $this->load->view('footer_admin',$data);
    	} else {
    		redirect(base_url());

    	}

}
public function lichsuquay(){
	    $user = is_user();
		$data['user_profile']  = $user;

        if ($user['admin'] >= 2 )	{


		$data['queryall'] = $this->db->order_by('id desc')->get('lichsuquay')->result_array();
	    $this->load->view('header_admin',$data);
        $this->load->view('lichsuquay',$data);
        $this->load->view('footer_admin',$data);
    	} else {
    		redirect(base_url());

    	}

}
public function index(){
  		 $user = is_user();
		 $data['user_profile']  = $user;
         $data['money'] = $user['money'];
         if ($user['admin'] >= 2 )   $data['admin'] = true;

        if ($user['admin'] >= 2 )	{



	  	$lmht = array('loainick'=>'LMHT');
		$data['querylmht'] = $this->db->where(array('loainick' => 'FFVIP', 'loainick' => 'FFTHUONG'))->order_by("noidung","desc")->get("baidang")->result_array();
		$data['lienminh'] = $this->db->where($lmht)->count_all_results("baidang");
		$cf = array('loainick'=>'CF', 'trangthai'=> 'on');
	    $this->load->view('header_admin',$data);
        $this->load->view('administrator',$data);
        $this->load->view('footer_admin',$data);
        }else{redirect(base_url());}

	
}


		public function delacc($id){

			// Phuoc vo van -- fb.me/gietmxh already fix bug in here

		     $user = is_user();
			 $data['user_profile']  = $user;

        		if ($user['admin'] >= 2 )	{
        		    	$query = $this->db->where('noidung', $id)->get('baidang')->result_array();
        		    	if(!empty($query[0]['hinhanh'])){
    						$split = explode('|',$query[0]['hinhanh']);
    						foreach ($split as $value) {
    								unlink('./tep-tin/'.basename($value));
    						}
        		    	}
						$this->db->where('noidung', $id);
						$this->db->delete('baidang');
						$arr = array('err' => 0, 'msg' => 'Thành công');

				} else {
					$arr = array('err' => 1, 'msg' => 'Không thành công');


				}
			
			echo json_encode($arr);


		}






}
