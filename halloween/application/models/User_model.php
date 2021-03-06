<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function checkDuplicate($email)
	{
		$this->db->select('email');
		$this->db->from('nguoidung');
		$this->db->like('email', $email);
		return $this->db->count_all_results();
	}

	function insertUser($data)
	{
		if($this->db->insert('nguoidung', $data))
		{
			return  $this->db->insert_id();
		}
		else
		{
			return false;
		}
	}


	function userExist($email)
	{
		$this->db->select('*');
		$this->db->like('email', $email);
		$qry = $this->db->get('nguoidung');
		$rs = $qry->result_array();
		return $rs[0];
	}

	function userExistByToken($token)
	{
		$this->db->select('*');
		$this->db->where('access_token', $token);
		$qry = $this->db->get('user');
		$rs = $qry->result_array();
		return $rs[0];
	}

}
