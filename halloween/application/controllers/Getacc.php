<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Getacc extends CI_Controller {

public function __construct(){
		parent::__construct();

        // To use site_url and redirect on this controller.
        $this->load->helper('url');
						$this->load->model('shop_model');	


	}
	
		
	public function auto(){
	    
	  $isCoc = $this->db->where('time <', time())->get('datcoc');
	  if($isCoc->num_rows() > 0 ){
	      foreach($isCoc->result_array() as $row){
	                $this->db->set('exp', 'off');
                    $this->db->where('idacc', $row['idacc']);
                    $this->db->update('datcoc');
	          	    $this->db->where('noidung',$row['idacc'])->update('baidang',array('coc'=>1));

	      }
        	      
 

	  }
	  

	    
	}
	private function encrypt_decrypt($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = '6818f23eef19d38dad1d2729991f6368';
        $secret_iv = '0ac35e3823616c810f86e526d1ed59e7';
        // hash
        $key = hash('sha256', $secret_key);
        
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if( $action == 'decrypt' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
	
	public function buy($id){
	        $status = 1;
	        $encrypted_txt = "";
	        $pass = "";
	        $user = is_user();
	        $err = "";
			$data['user_profile']  = $user;
			if($user){
			    
    		    $khadung = $this->db->where(array('trangthai'=>'on','kichhoat'=>'yes','noidung'=> $id))->get('baidang')->num_rows();
    		    if($khadung == 1){
    	        	$money = $user['cash'];
    	        	$giaacc = $this->db->where('noidung',$id)->get('baidang')->result_array()[0];
    	        	
    	        	
    	        	if($this->shop_model->check_coc($id) && !$this->shop_model->check_coc($id,$user['uid'])){
            	    $arr = array('error' => 1, 'msg' => 'Lỗi cọc.', 'link' => '');      
            	        
            	    echo json_encode($arr);
            	    die();
            	    } elseif(($this->shop_model->check_coc($id,$user['uid']) == false && $user['cash'] < $giaacc['gia']) || ($this->shop_model->check_coc($id,$user['uid']) && $user['cash'] < $giaacc['gia'] * 50 / 100)  ){
            	    $arr = array('status' => 1, 'msg' => 'Bạn không đủ tiền trong tài khoản, hãy nạp thêm.', 'link' => '');
            	                	    echo json_encode($arr);
            	    die();
            	    }
            	    
	    
	                if($this->shop_model->check_coc($id,$user['uid'])){
					            
					            $giaacc['gia'] = $giaacc['gia'] * 50 / 100;
					  					            
					            $this->db->set('exp', 'off');
                                $this->db->where('idacc', $id);
                                $this->db->update('datcoc');          
					}
    	        	if($money >= $giaacc['gia']){
    	        	    $status = 0;
    	        	    $plain_txt = $id.'-phuocvovan';
                        $encrypted_txt = $this->encrypt_decrypt('encrypt', $plain_txt);
                        $pass = $giaacc['matkhau'];
                        $value = $giaacc;
                        
                        
						$dataacc = array("trangthai" => "off");
						$money -= $giaacc['gia'];
						$datauser = array("cash" => $money);
						$this->shop_model->updatedbacc($id,$dataacc);
						$this->shop_model->updatedb($user['uid'],$datauser);
						$datamua = array('loainick'=>$value['loainick']
								,'uid' => $user['uid']
															 , 'idacc' => $id
															 ,'name' =>  $user['hovaten']
															 , 'taikhoan' =>  ""
															 , 'matkhau' => ""
															 , 'price' =>  $giaacc['gia']
															 , 'date' => date("H:i Y-m-d"));
							$this->shop_model->insertdba($datamua,'lichsumua');
							
    	        	    
    	        	} else {
    	        	    $err = 'Không đủ tiền';
    	        	}
    		    } else {
    		           $err = 'Không khả dụng';
    		        
    		    }
                
                
			} else {
			    $err = 'Vui lòng đăng nhập';
			}
			
			

			echo json_encode(array('status'=>$status,'err'=>$err,'encode'=>$encrypted_txt,'pass'=>trim($pass)));
	}
	
	public function check_login(){
	    $id = $_POST['id'];
        if(isset($_POST)){
            $decrypted_txt = $this->encrypt_decrypt('decrypt', $_POST['decode']);
            
            if($decrypted_txt == $_POST['id'].'-phuocvovan'){

                
                
    
                $RSApassword = $_POST['rsapass'];
                $username = $this->db->select('taikhoan')->where('noidung',$id)->get('baidang')->result_array()[0]['taikhoan'];
             /* $url="https://borrow.garena.com/index/";
                $resulta = curl($url);
                $csrf = get_input_val($resulta[1],'input[name=csrfmiddlewaretoken]');
            
                $postdata="csrfmiddlewaretoken=".$csrf."&next=/home&username=".trim($username)."&password=".$RSApassword."&password2=garena_gcms_pass";
                        
                $result = curl('https://borrow.garena.com/login/',$postdata,'',getcookie($resulta[0]));
                            
                preg_match('#Location: (.*)#i', $result[0], $res2ult);
            
            
                if(preg_match('#302 FOUND#', $result[0]) && trim($res2ult[1]) == "http://borrow.garena.com/") {
                    $pesan =  1;
                }else {
                    $pesan = 0;
                }*/
                
                if($this->db->select('loainick')->where('noidung',$id)->get('baidang')->result_array()[0]['loainick'] == 'RANDOM') $pesan = 1;
                echo json_encode(array('err'=>1,'id'=>$id));
            }
        }
	}
	public function update_acc($id){
	        $user = is_user();
			$data['user_profile']  = $user;

	        if ($user)	{
	            $khadung = $this->db->where(array('idacc'=> $id,'uid'=> $user['uid']))->get('lichsumua')->num_rows();
	            if($khadung >= 1 && $_POST['error'] == 1){
	                $acc  = $this->db->where(array('noidung'=> $id))->get('baidang')->result_array();
	                $this->db->where('idacc',$id)->update('lichsumua',array('taikhoan'=>$acc[0]['taikhoan'],'matkhau'=>$acc[0]['matkhau']));

	                echo json_encode(array('err'=>0));

	            } else {
	                if($khadung >=1){
	                    $acc  = $this->db->where(array('noidung'=> $id))->get('baidang')->result_array();
    	                $this->db->where('idacc',$id)->update('lichsumua',array('taikhoan'=>"Tài khoản lỗi",'matkhau'=>"Tài Khoản Này Mật Khẩu Sai Vui Lòng Liên Hệ Admin Để Được Hỗ Trợ"));
    	        /*        $this->db->where(array('noidung'=> $id))->update('baidang',array('err'=>1));*/
/*	                    $this->db->delete('lichsumua',array('idacc'=>$id));
	                    $this->db->where('noidung',$id)->update('baidang',array('trangthai'=>'on','kichhoat'=>'yes'));*/
	         


     
	                } 
	                echo json_encode(array('err'=>1));
	            }
	            
	            
	        }

	    
	}	
	
	public function coc(){
		$user = is_user();
		$id = $this->input->post('id');
		$not = $this->db->where('noidung',$id)->get('baidang')->num_rows();
		$query = $this->db->where('noidung',$id)->get('baidang')->row_array();
		if (!isset($user)){
	    $arr = array('error' => 1, 'msg' => 'Bạn chưa đăng nhập.', 'link' => 'login.php');
	    }elseif($query['trangthai']=='off'){
	    $arr = array('error' => 1, 'msg' => 'Tài khoản này đã được mua bởi người khác :(', 'link' => '');       
	    }elseif($query['kichhoat']=='no'){
	    $arr = array('error' => 1, 'msg' => 'Tài khoản này chưa được kích hoạt bán', 'link' => '');       
	    }elseif($not==0){
	    $arr = array('error' => 1, 'msg' => 'Tài khoản này không tồn tại', 'link' => '');       
	    }elseif($user['cash'] < $query['gia'] * 50 / 100){
	    $arr = array('error' => 1, 'msg' => 'Bạn không đủ tiền trong tài khoản, hãy nạp thêm.', 'link' => '');      
	    }elseif($this->shop_model->check_coc($id)){
	    $arr = array('error' => 1, 'msg' => 'Tài khoản đã bị cọc.', 'link' => '');      
	    } else {
	    $datamsg = "Cọc thành công";

	    $arr = array('error' => 0, 'msg' => $datamsg, 'link' => ''); 

	    # Thêm vào data
	    $now = getdate();
	    $this->db->insert('datcoc',array('uid'=>$user['uid'],'idacc'=>$id,'time'=>time() + 3 * 24 * 60 * 60,'ucash'=>$query['gia'] * 50 / 100,'exp'=>'on'));
	    $this->db->where('noidung',$id)->update('baidang',array('coc'=>1));
	//    mysql_query("UPDATE `nguoidung` SET `point` = `point` + '1' WHERE `uid` = '".$data['uid']."'");
	    # Thay đổi trạng thái và trừ tiền
	    $coc = $query['gia'] * 50 / 100;
	    $this->db->where('uid',$user['uid'])->set("cash","`cash` - $coc",FALSE)->update('nguoidung');
	    }
	    echo json_encode($arr);
	}
	
	public function index(){

   

        
        $user = is_user();
		$id = $this->input->post('id');
		$not = $this->db->where('noidung',$id)->get('baidang')->num_rows();
		$query = $this->db->where('noidung',$id)->get('baidang')->row_array();
		if (!isset($user['uid'])){
	    $arr = array('error' => 1, 'msg' => 'Bạn chưa đăng nhập.', 'link' => 'login.php');
	    }elseif($query['trangthai']=='off'){
	    $arr = array('error' => 1, 'msg' => 'Tài khoản này đã được mua bởi người khác :(', 'link' => '');       
	    }elseif($query['kichhoat']=='no'){
	    $arr = array('error' => 1, 'msg' => 'Tài khoản này chưa được kích hoạt bán', 'link' => '');       
	    }elseif($not==0){
	    $arr = array('error' => 1, 'msg' => 'Tài khoản này không tồn tại', 'link' => '');       
	    }elseif($this->shop_model->check_coc($id) && !$this->shop_model->check_coc($id,$user['uid'])){
	    $arr = array('error' => 1, 'msg' => 'Lỗi cọc.', 'link' => '');      
	        
	        
	    } elseif(($this->shop_model->check_coc($id,$user['uid']) == false && $user['cash'] < $query['gia']) || ($this->shop_model->check_coc($id,$user['uid']) && $user['cash'] < $query['gia'] * 50 / 100)  ){
	    $arr = array('error' => 1, 'msg' => 'Bạn không đủ tiền trong tài khoản, hãy nạp thêm.', 'link' => '');      
	    } else {
	    					$money = $user['cash'];
							$dataacc = array("trangthai" => "off");
												        
					        if($this->shop_model->check_coc($id,$user['uid'])){
					            
					            $query['gia'] = $query['gia'] * 50 / 100;
					            $this->db->set('exp', 'off');
                                $this->db->where('idacc', $id);
                                $this->db->update('datcoc');
					        }
							$money -= $query['gia'];
							$datauser = array("cash" => $money,"quay" => $user['quay']);
							$this->shop_model->updatedbacc($id,$dataacc);
							$this->shop_model->updatedb($user['uid'],$datauser);
							$datamua = array('loainick'=>$query['loainick']
								,'uid' => $user['uid']
								, 'idacc' => $id
								,'name' =>  $user['hovaten']
								, 'taikhoan' => $query['taikhoan'] 
								, 'matkhau' => $query['matkhau'] 
								, 'price' =>  $query['gia']
								, 'date' => date("H:i Y-m-d"));
							$this->shop_model->insertdba($datamua,'lichsumua');


							$arr = array('err' => 0, 'msg' => 'Mua thành công với giá '.$query['gia'].' Xem thông tin tài khoản trong Lịch sử giao dịch.');


			}

			echo json_encode($arr); 

}
}

?>