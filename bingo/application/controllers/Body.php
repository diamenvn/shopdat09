<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Body extends CI_Controller {

public function __construct(){
		parent::__construct();
        date_default_timezone_set( 'Asia/Ho_Chi_Minh' );

        // To use site_url and redirect on this controller.
        $this->load->helper('url');
		$this->load->model('shop_model');
$this->load->model('user_model');
	}


 	public function login1(){

        require_once 'vendor/Facebook/autoload.php';
				$accessToken = $_GET['access_token'];

				if (empty($accessToken)) redirect(base_url());

				$info = $this->user_model->userExistByToken($accessToken);

				// echo $info['fb'];die;

        if (!empty($info)){
	        $email = $info['email'];
	        $fb_ID = $info['id'];
					$name = $info['fb'];

	        $this->session->set_userdata("user_profile",array('name'=>$fb_ID,'id'=>$fb_ID,'email'=>$email, 'money' => $info['money']));
	        $data['user_profile'] = $this->session->userdata("user_profile");
	        $emaila = "";
	        $datadb = $data['user_profile'];
	        $data['user_profile']['hovaten'] = $data['user_profile']['name'];
	        if(isset($datadb['email'])) $emaila = $datadb['email'];
	                    $getuserif = $this->shop_model->checkUser($datadb['id'],$emaila,$datadb['name']);


        }
        redirect(base_url());

   }


   public function index(){

    
        $user = is_user();

        $data['user_profile'] = $user;
        $data['money'] = $user['money'];
        $data['money'] = $user['money'];
        $data['title'] = $this->config->item('title');
        $this->load->template('shopacc_views',$data);
    }


	public function napthe(){
	    $user = is_user();
	    $data['user_profile'] = $user;
	    $data['money'] = $user['money'];
	    $data['title'] = 'Nạp thẻ ';
	    $data['desc'] = 'Nạp thẻ ';

	    $this->load->template('napthe',$data);


	}

    public function random($type = 'NULL'){


        $user = is_user();
        $data['user_profile'] = $user;
        $data['money'] = $user['money'];
        $data['title'] = 'THỬ MAY '.$type;
        $data['desc'] = 'Nạp thẻ ';
        $config['per_page'] = 12;

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));


        $config['base_url'] = base_url() . 'body/random/'.$type;
        $config['first_url'] = base_url() . 'body/random/'.$type;


        $config['page_query_string'] = TRUE;
        $random = array('loainick'=>$type,'trangthai'=>'on');
        $config['total_rows'] = $this->db->where($random)->count_all_results('baidang');
        $lichsunap = $this->db->where($random)->limit($config['per_page'], $start)->get('baidang')->result_array();

        $data['type'] = $type;

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $row = array(
            'random_data' => $lichsunap,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        foreach($row as $key=>$value){
                    $data[$key] = $value;
        }



        $this->load->template('random',$data);


    }

    public function profile(){
        $user = is_user();
				//
				// print_r($user);die;
        $data['user_profile'] = $user;
        $data['money'] = $user['money'];
        $data['title'] = 'Trang Cá Nhân ';
        if(!$user) redirect('vai.php');

        $this->load->template('users',$data);

    }

		public function kimcuong(){
        $user = is_user();
				//
				// print_r($user);die;
        $data['user_profile'] = $user;
        $data['money'] = $user['money'];
				$data['point'] = $user['point'];
        $data['title'] = 'Trang Cá Nhân ';
        if(!$user) redirect('vai.php');

        $this->load->template('users',$data);

    }

    public function naptien(){
        $user = is_user();
        if(!$user) redirect('vai.php');

        $data['user_profile'] = $user;
        $data['money'] = $user['money'];
        $data['title'] = 'Trang Cá Nhân ';

        $this->load->template('users',$data);

    }

    public function lichsunap(){
        $user = is_user();
        if(!$user) redirect('vai.php');

        $data['user_profile'] = $user;
        $data['money'] = $user['money'];
        $data['title'] = 'Trang Cá Nhân ';
        $data['querynap'] = $this->shop_model->getHisnap($user['fb']);

        $this->load->template('users',$data);

    }

    public function lichsumua(){
        $user = is_user();
        if(!$user) redirect('vai.php');

        $data['user_profile'] = $user;
        $data['money'] = $user['money'];
        $data['title'] = 'Trang Cá Nhân ';
        $data['query'] = $this->shop_model->getHis($user['fb']);

        $this->load->template('users',$data);

    }

    public function lichsuquay(){
        $user = is_user();
        if(!$user) redirect('vai.php');
        $data['user_profile'] = $user;
        $data['money'] = $user['money'];
        $data['title'] = 'Trang Cá Nhân ';
        $data['query'] = $this->db->where('uid',$user['fb'])->get('lichsuquay')->result_array();

        $this->load->template('users',$data);

    }
    public function logout(){


		$this->session->sess_destroy();

        redirect(base_url());
    }
}
