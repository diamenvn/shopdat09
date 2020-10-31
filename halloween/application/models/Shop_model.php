<?php
class Shop_model extends CI_Model
{
       function check_coc($id,$user = 1){
        $array = array('exp'=>'on','idacc'=>$id);
        $this->db->where($array);
        if($user != 1) $this->db->where('uid',$user);
        $not = $this->db->get('datcoc')->num_rows();


        if($not >= 1) return true;
        return false;
    }
    function isMua($acc,$id){

      if($this->db->where(array('idacc'=>$acc,'uid'=>$id))->get('lichsumua')->num_rows() > 0) return true;
      return false;

    }
	function getAcc($id){
      return $this->db->where('noidung',$id)->get('baidang')->row_array();
    }
	function insertdb($data){
// Inserting in Table(students) of Database(college)
    $this->db->insert('user', $data);
    }

	function updatedb($id,$data){
	$this->db->where('fb', $id);
	$this->db->update('user', $data);
	}
		function insertdba($data,$db){
// Inserting in Table(students) of Database(college)
    $this->db->insert($db, $data);
    }
	function updatedbacc($id,$data){
	$this->db->where('noidung', $id);
	$this->db->update('baidang', $data);
	}
		function updatedbacc1($id,$data){
	$this->db->where('noidung', $id);
	$this->db->update('baidang', $data);
	}
	function existsdb($id)
	{
	$this->db->where('fb',$id);
    $query = $this->db->get('user');
	return $query->num_rows();
	}
	function isCode($id){
		$this->db->where('fb',$id);
	    $query = $this->db->get('user');
		return $query->result_array();
	}
	function valCode($code){
		$this->db->where('code',$code);
	    $query = $this->db->get('user');
		return $query->result_array();
	}

	function checkUser($id,$email,$name){

       if ($this->existsdb($id) > 0){

      		$data = array('fb' => $id, 'name' => $name,'email' => $email);



	        $this->updatedb($id,$data);
		}else{
		   $data = array('fb' => $id, 'name' => $name,'email' => $email,'money' => 0,'admin' => 0,'add_time'=>time());
		   $this->insertdb($data);
		}
		$this->db->where('id',$id);
		$qa = $this->db->get("user");
    // echo $id;die;
		return $qa->result_array();
		}
		 function getHis($id){
		$this->db->where('uid',$id);
		$this->db->order_by("id","desc");
		$qa = $this->db->get("lichsumua");
		return $qa->result_array();
		}

		 function getHisnap($id){
		$this->db->where('uid',$id);
		$this->db->order_by("id","desc");
		$qa = $this->db->get("lichsunap");
		return $qa->result_array();
		}
		 function getHisall(){
		$this->db->where(array('real'=>'0'))->limit(200)->order_by("id","desc");
		$qa = $this->db->get("lichsumua");
		return $qa->result_array();
		}
		 function getHisnapall(){
		$this->db->order_by("id","desc")->limit(200);
		$qa = $this->db->get("lichsunap");
		return $qa->result_array();
		}

}

?>
