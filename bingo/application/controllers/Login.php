<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

public function __construct(){
		parent::__construct();

        // To use site_url and redirect on this controller.
        $this->load->helper('url');
		$this->load->model('shop_model');	
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('User_model');	
		$this->load->model('Mail_model');	



	}
	
public function ForgotPasswords(){
        
         $email = $this->input->post('email');      
         $findemail = $this->Mail_model->ForgotPassword($email);  
         if($findemail){
          $this->Mail_model->sendpassword($findemail);        
           }else{
          $this->session->set_flashdata('msg',' Không tồn tại Email');
          redirect(base_url().'forgot.html','refresh');
      }
}


public function Forgot(){
    		$data['title'] = 'Quên Mật Khẩu'; 
    		$this->load->template('forgot',$data);




}
public function Reset(){

		$data['title'] = 'Đổi mật khẩu'; 
		$user = is_user();
		$data['user_profile'] = $user;

		if($user){

			$this->form_validation->set_rules('last', 'Mật khẩu cũ', 'trim|required',array(
	                'required'      => 'Vui lòng nhập %s.',
	                'valid_email'     => ' %s không hợp lệ.'
	        ));

			$this->form_validation->set_rules('password', 'Mật khẩu', 'trim|required',array(
	                'required'      => 'Vui lòng nhập %s.',
	                'valid_email'     => ' %s không hợp lệ.'
	        ));
			$this->form_validation->set_rules('password1', 'Mật khẩu xác nhận', 'trim|required',array(
	                'required'      => 'Vui lòng nhập %s.',
	                'valid_email'     => ' %s không hợp lệ.'
	        ));

			$this->form_validation->set_error_delimiters('<div class="error-msg">', '</div>');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->template('change',$data);
			}
			else
			{
				$last_past 	= $this->security->xss_clean($this->input->post('last'));
				$password 	= $this->security->xss_clean($this->input->post('password'));
				

				if(password_verify($last_past,$user['pass']))
				{
				$options = array("cost"=>4);
				$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);

				$this->db->where('id',$user['id'])->update('nguoidung',array('pass'=>$hashPassword));


					header("Refresh: 3; url=\"/\"");
					echo "Thanh Cong";
					die();

				}
				else
				{
					$data['errorMsg'] = 'Mật khẩu không khớp';
					$this->load->template('change',$data);
				}
			}

		}






}
public function LoginUser()
	{	
		$data['title'] = 'Đăng nhập'; 

		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',array(
                'required'      => 'Vui lòng nhập %s.',
                'valid_email'     => 'Email %s không hợp lệ.'
        )
        );
		$this->form_validation->set_rules('password', 'Password', 'trim|required',array(
                'required'      => 'Vui lòng nhập %s.'
        ));
		
		$this->form_validation->set_error_delimiters('<div class="error-msg">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->template('dangnhap',$data);
		}
		else
		{
			$email 		= $this->security->xss_clean($this->input->post('email'));
			$password 	= $this->security->xss_clean($this->input->post('password'));
						
		
			$options = array("cost"=>4);
			$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
			
			
			$checkEmail = $this->User_model->checkDuplicate($email);
			
			if($checkEmail  == 1)
			{
				$getUserDetails = $this->User_model->userExist($email);
				if(password_verify($password,$getUserDetails['pass']))
				{
					
					$this->session->set_userdata("user_profile",array('id'=>$getUserDetails['uid'],'name'=>$getUserDetails['hovaten'],'email' =>$getUserDetails['email']));

					
					
									
					 header("Refresh: 3; url=\"/\"");
					 echo "Dang nhap thanh cong se chuyen trang trong 3 seconds...";

				}
				else
				{
					$data['errorMsg'] = "Sai Email Hoặc Pass";
					$this->load->template('dangnhap',$data);
				}
				
			
			}
			else
			{
				$data['errorMsg'] = 'Tài khoản không tồn tại';
				$this->load->template('dangnhap',$data);
			}
		}
	}

	public function logout(){ 
		$this->session->sess_destroy();
		redirect('/','refresh');
	}

	public function RegisterUser() 
	{
		$data['title'] = 'Đăng kí'; 
		$data['desc'] = 'Đăng kí'; 

		$this->form_validation->set_rules('hovaten', 'Họ và Tên', 'trim|required',array(
                'required'      => 'Vui lòng nhập %s.',
                'valid_email'     => ' %s không hợp lệ.'
        ));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',array(
                'required'      => 'Vui lòng nhập %s.',
                'valid_email'     => ' %s không hợp lệ.'
        ));
		$this->form_validation->set_rules('password', 'Mật khẩu', 'trim|required',array(
                'required'      => 'Vui lòng nhập %s.',
                'valid_email'     => ' %s không hợp lệ.'
        ));
		$this->form_validation->set_rules('password1', 'Mật khẩu xác nhận', 'trim|required',array(
                'required'      => 'Vui lòng nhập %s.',
                'valid_email'     => ' %s không hợp lệ.'
        ));

		$this->form_validation->set_error_delimiters('<div class="error-msg">', '</div>');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->template('register',$data);
		}
		else
		{
			$hoten 	= $this->security->xss_clean($this->input->post('hovaten'));
			$email 		= $this->security->xss_clean($this->input->post('email'));
			$password 	= $this->security->xss_clean($this->input->post('password'));
			
			$options = array("cost"=>4);
			$hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);

			
			$insertData = array('uid'=> $this->db->get('nguoidung')->num_rows(),
								'cash'=> 0,
								'hovaten'=>$hoten,
								'email'=>$email,
								'pass'=>$hashPassword,
								'admin'=>0,
								'time'=>time()
								);
								
			
			$checkDuplicate = $this->User_model->checkDuplicate($email);
			
			if($checkDuplicate == 0)
			{
				$insertUser = $this->User_model->insertUser($insertData);
			
				if($insertUser)
				{
						header("Refresh: 3; url=\"/login.html\"");
					 echo "Dang ki thanh cong se chuyen ve dang nhap trong 3 seconds...";
				}
				else
				{
					$data['errorMsg'] = 'Unable to save user. Please try again';
					$this->load->view('register',$data);
				}
			}
			else
			{
				$data['errorMsg'] = 'User email alreary exists';
				$this->load->template('register',$data);
			}
		}
	}

	




}

?>