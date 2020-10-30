<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Phuoc Vo Van
class view extends CI_Controller {



  public function index(){
        if(isset($_POST['page']) && $_POST['page']){
		$per_page = 20;
		if($_POST)
		{
		$page =$_POST['page'];
		}
		$start = ($page-1)*$per_page;
		$lmht = array('loainick'=>$_POST['loainick'],'trangthai' => 'on','kichhoat'=>'yes');

		$data['querylmht'] = $this->db->where($lmht)->order_by("desc","desc")->limit($per_page,$start)->get("baidang");

		$this->load->view('view',$data);

  	} 



  }
	public function custom(){

    if(isset($_POST['price']) && $_POST['price'] >= 0 || isset($_POST['rank']) && $_POST['rank'] >= 0){

		switch($_POST['price'])
          {
			case '0':
              $price1 = 0;
			  $price2 = 1000000000;
              break;
            case 1:
              $price1 = 0;
			  $price2 = 50000;
              break;
            case 2:
              $price1 = 50000;
			  $price2 = 100000;

              break;
            case 3:
              $price1 = 100000;
			  $price2 = 500000;

              break;
            case 4:
	            $price1 = 500000;
				$price2 = 1000000;

              break;
            case 5:
              $price1 = 1000000;
			  $price2 = 10000000000;

            break;
             default:
	         $price1 = 1;
			 $price2 = 1000000000;
			  break;
          }

if(!empty($_POST['rank'])){
switch ($_POST['rank']) {
	case '0': // 
   $sql_rank1 =  0;
   $sql_rank2 = 300;
   break;	
   case '1': // 
   $sql_rank1 =  0;
   $sql_rank2 = 1;	
   	break;
	case '2': // đồng
   $sql_rank1 =  2;
   $sql_rank2 = 6;

	break;
	case '3': // bạc
	   $sql_rank1 =  7;
   $sql_rank2 = 11;
	break;
	case '4': // vàng
	   $sql_rank1 =  12;
   	   $sql_rank2 = 16;
	break;
	case '5': // bk
		   $sql_rank1 =  17;
   	   $sql_rank2 = 21;
	break;
	case '6': // kc
		   $sql_rank1 =  22;
   	   $sql_rank2 = 26;
   	   	break;	
   	   case '7': // kc
		$sql_rank1 =  27;
   	   $sql_rank2 = 27;
   	   	break;	
   	   	   	   case '8': // kc
		$sql_rank1 =  28;
   	   $sql_rank2 = 29;
   	   	break;	
	default:

   	//$sql_rank = "";
	break;

}
}
			if(!empty($this->input->post('frame')) && $this->input->post('frame') != 0 && $this->input->post('loai') == "LMHT"){

			$this->db->where(array('khung'=>$this->input->post('frame') - 1));

			}
			$this->db->where(array('loainick'=>$this->input->post('loai'),'trangthai' => 'on'));

			$this->db->where(array('gia <='=>$price2,'gia >='=>$price1,'trangthai' => 'on'));

			if(!empty($this->input->post('rank')) && $this->input->post('rank') != 0 && $this->input->post('loai') == "LMHT"){
			$this->db->where(array('rank <='=>$sql_rank2,'rank >='=>$sql_rank1,'trangthai' => 'on'));

			} else if(!empty($this->input->post('rank')) && $this->input->post('rank') != 0 && $this->input->post('loai') == "LQ"){
				$this->db->where(array('rank'=>$this->input->post('rank') - 1,'trangthai' => 'on'));

			}
			if(!empty($this->input->post('skin_str'))){
				$this->db->like('skins',''.$this->input->post('skin_str').'');

			}
			if(!empty($this->input->post('champ_str'))){
				$this->db->like('champs',''.$this->input->post('champ_str').'');

			}
				        $this->db->order_by('desc','desc');

			if($_POST['order'] == 1) $this->db->order_by('count_champ','desc');
			if($_POST['order'] == 2) $this->db->order_by('count_skin','desc');
	

			$data['querylmht'] = $this->db->get('baidang');
			$data['page'] = 3;
			$data['pages'] = 1;


			$this->load->view('view',$data);
			// $this->output->enable_profiler(TRUE);
		}

	}
}

?>
