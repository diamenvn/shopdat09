<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'].'/src/Exception.php';
require $_SERVER['DOCUMENT_ROOT'].'/src/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'].'/src/SMTP.php';


class Mail_model extends CI_Model
{
public function ForgotPassword($email)
 {
        $this->db->select('email');
        $this->db->from('nguoidung'); 
        $this->db->where('email', $email); 
        $query=$this->db->get();
        return $query->row_array();
 }
 public function sendpassword($data)
{
        $email = $data['email'];
        $query1=$this->db->query("SELECT *  from nguoidung where email = '".$email."' ");
        $row=$query1->result_array();
        if ($query1->num_rows()>0)
      
{
        $passwordplain = "";
        $passwordplain  = rand(1000000,9999999999);
        $options = array("cost"=>4);
		$hashPassword = password_hash($passwordplain,PASSWORD_BCRYPT,$options);
        $newpass['pass'] = $hashPassword;
        $this->db->where('email', $email);
        $this->db->update('nguoidung', $newpass); 
        mail($email, 'Quen mat khau', 'Mat khau moi '.$passwordplain);

        $this->session->set_flashdata('msg','Password sent to your email!');

  redirect(base_url().'forgot.html','refresh');        
}
else
{  
 $this->session->set_flashdata('msg','Email not found try again!');
 redirect(base_url().'forgot.html','refresh');
}
}

}

?>