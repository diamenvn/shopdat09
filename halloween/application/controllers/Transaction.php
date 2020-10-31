<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
//error_reporting(0);



  
function number_in_string($string){

        try {

            if (!is_string($string))
                throw new Exception("Error : Param Type");


            preg_match_all("/\d+/", $string, $matches);

            // Return the all coincidences
            return $matches[0];

        } catch (Exception $e) {
            echo $e->getMessage();
        }

}

class Transaction extends CI_Controller {

public function __construct(){
		parent::__construct();

        // To use site_url and redirect on this controller.
        $this->load->helper('url');

		$this->load->model('shop_model');


	}



            

            public function cron(){
              
                
                $query = $this->db->where('status',1)->or_where('status',2)->order_by('id','asc')->get('lichsunap')->result_array();
                
                
                
                                     
                foreach($query as $hihi){
                    	$result = curl('http://cardbank123.com/api/card?mathe='.$row['code']);
                    	$response = json_decode($result[1],true);
                    	if($response['err'] == 0){
                    
                        $this->db->set("cash","`cash` + '".$hihi['menhgia']."'",FALSE)->where('uid',$hihi['uid'])->update('nguoidung');
                    
                        $this->db->where('id',$hihi['id'])->update('lichsunap',array('status'=>0));
                    
                    	} else if($response['err'] == 2){
                             $this->db->where('id',$hihi['id'])->update('lichsunap',array('status'=>2));
                    
                    	}
               
                
                }
            }
            public function index(){
    	     $user = is_user();
            if($user){
            $data['user_profile'] = $user;
            $money = $user['cash'];
             if (!empty($_POST)){
                        if (!$_POST['type']) {
            echo json_encode(array('err' => "1", 'title' => "Lỗi", 'msg' => "Chưa chọn loại nhà mạng"));
                              die();

                }elseif (!$_POST['code']) {
                    echo json_encode(array('err' => "1", 'title' => "Lỗi", 'msg' => "Chưa nhập mã thẻ"));
                                      die();

                }elseif (!$_POST['serial']) {
                    echo json_encode(array('err' => "1", 'title' => "Lỗi", 'msg' => "Chưa nhập mã seri"));
                                      die();

                }else if(strlen($_POST['serial']) < 7){
                    echo json_encode(array('err' => "1", 'title' => "Lỗi", 'msg' => "Độ dài ko hợp lệ"));
                                      die();

                }else if(strlen($_POST['code']) < 7){
        
                  echo json_encode(array('err' => "1", 'title' => "Lỗi", 'msg' => "Độ dài ko hợp lệ"));
                  die();
        
                } 


		
			$username = 'langtucohon23051997@gmail.com'; // TK của bạn
			$password = 'chung199979'; // Mk của bạn

            $TxtCard  = $_POST['type'];// type=viettel
            $TxtMaThe = $_POST['code'];
            $TxtSeri  = $_POST['serial'];
            $request_id = time(); //Mã tự sinh trong mỗi giao dịch và không giống nhau (Chúng tôi s

            if($TxtCard == 'vcoin' || $TxtCard == 'zing'){

            $result = curl('https://uzipay.com');
            $cook = getcookie($result[0]);
            $post = 'email='.$username.'&password='.$password;
            $result = curl('https://uzipay.com/login.html',$post,'',$cook);
            $post = 'type='.$TxtCard.'&code='.$TxtMaThe.'&serial='.$TxtSeri.'&ghichu='.$user['uid'].'&cash='.$_POST['amount'];
            $result = curl('https://uzipay.com/transaction',$post,'',$cook);
            $response = json_decode($result[1],true);
            if($response['err'] == 0){

               $info_card = $response['amount'];

            
               $money += $info_card;
               
        	   $date = date("H:i Y-m-d");

             $data = array('cash' => $money );
             
    
                  $this->shop_model->updatedb($user['uid'],$data);
             
        	   $datanap = array('uid'=>$user['uid'], 'name' => $user['hovaten'] ,'loaithe' => $this->input->post('type'),'serial' => $this->input->post('serial'),'mathe' => $this->input->post('code'), 'menhgia' => $info_card , 'date' => $date,'status'=>$status);
        	   $this->shop_model->insertdba($datanap,'lichsunap');
               $arr = array('err' => 0, 'msg' => 'Nạp thẻ thành công mệnh giá '.$info_card);

        

        }
        else {
        
        
        				$arr = array('err' => 1, 'msg' => $response['msg']);
        
        
        }
        
             } else {
                         	   $date = date("H:i Y-m-d");

                    $info_card = $this->input->post('amount');
                     $datanap = array('uid'=>$user['uid'], 'name' => $user['hovaten'] ,'loaithe' => $this->input->post('type'),'serial' => $this->input->post('serial'),'mathe' => $this->input->post('code'), 'menhgia' => $info_card , 'date' => $date,'status'=>1);
                	   $this->shop_model->insertdba($datanap,'lichsunap');
                       $arr = array('err' => 0, 'msg' => 'Thẻ của bạn đang được duyệt. Vui lòng đợi 10p để admin cộng tiền');
                 
                 
             }

        }


        }else {
			$arr = array('err' => 1, 'msg' => 'Bạn chưa đăng nhập');
            // Solves first time login issue. (Issue: #10)
            //$this->facebook->destroySession();
        }
echo json_encode($arr);



	}
}

?>
