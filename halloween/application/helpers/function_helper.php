<?php

function get_value($value){


        $CI =&get_instance();

        $config = $CI->db->where('key',$value)->get('freefire_setting')->row_array();


        return $config['value'];

}
function status($status){
	switch($status){
		case '1':

		$str = 'Đang được duyệt';
		break;
		case '0':

		$str = 'Đã duyệt';
		break;
		case '2':

		$str = 'Từ chối';
		break;

		case '3':
		 		$str = 'Sai mã thẻ';

		break;
		case '4':
		 		$str = 'Sai seri';

		break;
		case '5':
		 		$str = 'Spam';

		break;

		default:
		$str = 'Không xác định';
		break;


	}

	return $str;


}
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function curl($url,$post = false,$ref = '', $cookie = false,$headers = false,$cookies = false,$header = true,$follow = false)
{
    $ch=curl_init($url);
    if($ref != '') {
        curl_setopt($ch, CURLOPT_REFERER, $ref);
    }
    if($cookie){
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    }
    if($cookies)
    {
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookies);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookies);
    }
    if($post){
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_POST, 1);
    }
    curl_setopt($ch, CURLOPT_HEADER, 1);

     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);

        //curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    $result[0] = curl_exec($ch);
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $result[1] = substr($result[0], $header_size);
    curl_close($ch);
    return $result;

}
function getcookie($content){
    preg_match_all('/Set-Cookie: (.*);/U',$content,$temp);
    $cookie = $temp[1];

    $cookies = "";
    $a = array();
    foreach($cookie as $c){
        $pos = strpos($c, "=");
        $key = substr($c, 0, $pos);
        $val = substr($c, $pos+1);
        $a[$key] = $val;
    }
    foreach($a as $b => $c){
        $cookies .= "{$b}={$c};";
    }
    return $cookies;
}

function seo1($text) {

$text = html_entity_decode(trim($text), ENT_QUOTES, 'UTF-8');
$text = str_replace(Array("?", "&amp;", '_', ':', '+', '?', '&quote', '!', '&lt;', '&gt;', '(', ')', '[', ']', '&ldquo;', '&rdquo;', '&sbquo;', '.', ',', '/', '&bdquo;'), '-', $text);
$text = str_replace(" ", '-', str_replace("&*#39;",'',$text));
$text = str_replace("----", '-',$text);
$text = str_replace("---", '-',$text);
$text = str_replace("--", '-', $text);
$text = str_replace("..", '-', $text);
$text = str_replace("/.../", '-', $text);
$text = str_replace("....", '-', $text);
$text = str_replace(".....", '-', $text);
$text = ltrim($text, "-");
$text = rtrim($text, "-");
$text=str_replace(" ","-", $text);$text=str_replace("--","-", $text);
$text=str_replace("@","-",$text);$text=str_replace("/","-",$text);
$text=str_replace("\\","-",$text);$text=str_replace(":","",$text);
$text=str_replace("\"","",$text);$text=str_replace("'","",$text);
$text=str_replace("<","",$text);$text=str_replace(">","",$text);
$text=str_replace(",","",$text);$text=str_replace("?","",$text);
$text=str_replace(";","",$text);$text=str_replace(".","",$text);
$text=str_replace("[","",$text);$text=str_replace("]","",$text);
$text=str_replace("(","",$text);$text=str_replace(")","",$text);
$text=str_replace("́","", $text);
$text=str_replace("̀","", $text);
$text=str_replace("̃","", $text);
$text=str_replace("̣","", $text);
$text=str_replace("̉","", $text);
$text=str_replace("*","",$text);$text=str_replace("!","",$text);
$text=str_replace("$","-",$text);$text=str_replace("&","-and-",$text);
$text=str_replace("%","",$text);$text=str_replace("#","",$text);
$text=str_replace("^","",$text);$text=str_replace("=","",$text);
$text=str_replace("+","",$text);$text=str_replace("~","",$text);
$text=str_replace("`","",$text);$text=str_replace("--","-",$text);
$text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
$text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
$text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
$text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
$text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
$text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
$text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
$text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
$text = preg_replace("/(đ)/", 'd', $text);
$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
$text = preg_replace("/(đ)/", 'd', $text);
$text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
$text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
$text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
$text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
$text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
$text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
$text = preg_replace("/(Đ)/", 'D', $text);
$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
$text = preg_replace("/(Đ)/", 'D', $text);
$text=strtolower($text);
return $text;
  }

function seo($loainick,$rank,$gia,$id) {
$text = 'acc '.$loainick.' rank '.$rank.' giá rẻ '.$gia.'-'.$id.'';

$text = html_entity_decode(trim($text), ENT_QUOTES, 'UTF-8');
$text = str_replace(Array("?", "&amp;", '_', ':', '+', '?', '&quote', '!', '&lt;', '&gt;', '(', ')', '[', ']', '&ldquo;', '&rdquo;', '&sbquo;', '.', ',', '/', '&bdquo;'), '-', $text);
$text = str_replace(" ", '-', str_replace("&*#39;",'',$text));
$text = str_replace("----", '-',$text);
$text = str_replace("---", '-',$text);
$text = str_replace("--", '-', $text);
$text = str_replace("..", '-', $text);
$text = str_replace("/.../", '-', $text);
$text = str_replace("....", '-', $text);
$text = str_replace(".....", '-', $text);
$text = ltrim($text, "-");
$text = rtrim($text, "-");
$text=str_replace(" ","-", $text);$text=str_replace("--","-", $text);
$text=str_replace("@","-",$text);$text=str_replace("/","-",$text);
$text=str_replace("\\","-",$text);$text=str_replace(":","",$text);
$text=str_replace("\"","",$text);$text=str_replace("'","",$text);
$text=str_replace("<","",$text);$text=str_replace(">","",$text);
$text=str_replace(",","",$text);$text=str_replace("?","",$text);
$text=str_replace(";","",$text);$text=str_replace(".","",$text);
$text=str_replace("[","",$text);$text=str_replace("]","",$text);
$text=str_replace("(","",$text);$text=str_replace(")","",$text);
$text=str_replace("́","", $text);
$text=str_replace("̀","", $text);
$text=str_replace("̃","", $text);
$text=str_replace("̣","", $text);
$text=str_replace("̉","", $text);
$text=str_replace("*","",$text);$text=str_replace("!","",$text);
$text=str_replace("$","-",$text);$text=str_replace("&","-and-",$text);
$text=str_replace("%","",$text);$text=str_replace("#","",$text);
$text=str_replace("^","",$text);$text=str_replace("=","",$text);
$text=str_replace("+","",$text);$text=str_replace("~","",$text);
$text=str_replace("`","",$text);$text=str_replace("--","-",$text);
$text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
$text = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $text);
$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
$text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $text);
$text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
$text = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $text);
$text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
$text = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $text);
$text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
$text = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $text);
$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
$text = preg_replace("/(đ)/", 'd', $text);
$text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $text);
$text = preg_replace("/(đ)/", 'd', $text);
$text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
$text = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $text);
$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
$text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $text);
$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
$text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $text);
$text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
$text = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $text);
$text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
$text = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $text);
$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
$text = preg_replace("/(Đ)/", 'D', $text);
$text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $text);
$text = preg_replace("/(Đ)/", 'D', $text);
$text=strtolower($text);
return $text;
  }

function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function is_user(){
        $CI = & get_instance();  //get instance, access the CI superobject

        $user_profile = $CI->session->userdata("user_profile");
        if($user_profile){
        if(isset($user_profile['email'])) $emaila = $user_profile['email'];
        $getuserif = $CI->shop_model->checkUser($user_profile['id'],(!empty($emaila) ? $emaila : ''),$user_profile['name']);
        return $getuserif[0];

        } else {
            return 0;
        }

}

function lichsumua(){
        $CI = & get_instance();  //get instance, access the CI superobject
/*like('date',date('Y-m-d'))->*/
        $his = $CI->db->limit(15)->order_by("id","desc")->get("lichsumua")->result_array();

        return $his;

}


 function time_stamp($time)
{

   $periods = array("giây", "phút", "giờ", "ngày", "tuần", "tháng", "năm", "thập kỉ");
   $lengths = array("60","60","24","7","4.35","12","10");

   $now = time();

       $difference     = $now - $time;
       $tense         = "trước";

   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
       $difference /= $lengths[$j];
   }

   $difference = round($difference);



   return " $difference $periods[$j] trước";
}

function get_ranklq($rank) {
    switch ($rank) {
        case 0:
            $str = "noborder";
            break;
         case 1:
            $str = "bronze";
            break;
        case 2:
            $str = "silver";
            break;
            case 3:
            $str = "gold";
            break;
            case 4:
            $str = "platinum";
            break;
            case 5:
            $str = "diamond";
            break;
             case 6:
            $str = "master";
            break;
             case 7:
            $str = "challenger";
            break;

        default:
            $str = "noborder";
            break;
    }
    return $str;
}


function get_rank($rank,$yes = 0){

   if($rank >=0 && $rank <=1){
        if($yes == 1){
            $result = "provisional";
        } else {
        $result = "noborder";
         }

   }else if($rank >=2 && $rank <=6){
        if($yes == 1){
            $result = "bronze";
            } else {
            $result = "noborder";
             }

   }else if($rank >=7 && $rank <=11){
        $result = "silver";

   }else if($rank >=12 && $rank <=16){
        $result = "gold";

   }else if($rank >=17 && $rank <=21){
        $result = "platinum";

   }else if($rank >=22 && $rank <=26){
        $result = "diamond";

   } else if($rank == 27){
            $result = "master";


   } else if($rank == 28){
            $result = "challenger";

   }
   return $result;
}

function get_khung($khung) {
    switch ($khung) {
        case 0:
            $str = "noborder";
            break;
        case 1:
            $str = "silver";
            break;
        case 2:
            $str = "gold";
            break;
        case 3:
            $str = "platinum";
            break;
        case 4:
            $str = "diamond";
            break;
        case 5:
            $str = "master";
            break;
        case 6:
            $str = "challenger";
            break;
        default:
            $str = "noborder";
            break;
    }
    return $str;
}
function get_string_khung($khung) {
    switch ($khung) {
        case 0:
            $str = "Không Khung";
            break;
        case 1:
            $str = "Khung Bạc";
            break;
        case 2:
            $str = "Khung Vàng";
            break;
        case 3:
            $str = "Khung Bạch Kim";
            break;
        case 4:
            $str = "Khung Kim Cương";
            break;
        case 5:
            $str = "Khung Cao Thủ";
            break;
        case 6:
            $str = "Khung Thách Đấu";
            break;
        default:
            $str = "Chưa Xác Định";
            break;
    }
    return $str;
}


function get_string_trangthai($trangthai) {
    switch ($trangthai) {
        case 'on':
            $str = "Chưa Bán";
            break;
        case 'off':
            $str = "Đã Bán";
            break;

        default:
            $str = "Chưa Xác Định";
            break;
    }
    return $str;
}



function get_string_kichhoat($kichhoat) {
    switch ($kichhoat) {
        case 'yes':
            $str = "OK";
            break;
        case 'no':
            $str = "Không Kích Hoạt";
            break;

        default:
            $str = "Chưa Xác Định";
            break;
    }
    return $str;
}

function get_string_kichhoat1($kichhoat) {
    switch ($kichhoat) {
        case yes:
            $str = "<pre><b>Có Thể Mua!</b></pre>";
            break;
        case no:
            $str = "<pre>Chưa Định Giá!</pre>";
            break;

        default:
            $str = "Chưa Xác Định";
            break;
    }
    return $str;
}

function get_string_loaitaikhoan($loainick) {
    switch ($loainick) {
        case 'LMHT':
            $str = "Liên Minh Huyền Thoại";
            break;
        case 'LQ':
            $str = "Liên Quân";
            break;
       case 'FA':
            $str = "FIFA";
            break;

        default:
            $str = "Chưa Xác Định";
            break;
    }
    return $str;
}

function get_string_admin($admin) {
    switch ($admin) {
        case 0:
            $str = "Member";
            break;
             case 1:
            $str = "Member Gold";
            break;
        case 2:
            $str = "Quản Trị Viên";
            break;

        default:
            $str = "Chưa Xác Định";
            break;
    }
    return $str;
}


function get_string_ranklq($rank) {
    switch ($rank) {
        case 0:
            $str = "K.Rank";
            break;
         case 1:
            $str = "Đồng";
            break;
        case 2:
            $str = "Bạc";
            break;
            case 3:
            $str = "Vàng";
            break;
            case 4:
            $str = "B.Kim";
            break;
            case 5:
            $str = "K.Cương";
            break;
             case 6:
            $str = "C.Thủ";
            break;
             case 7:
            $str = "T.Đấu";
            break;

        default:
            $str = "Chưa Xác Định";
            break;
    }
    return $str;
}



function get_string_rank($rank)
{
    switch ($rank) {
        case 0:
            $str = "K.Rank";
            break;
        case 1:
            $str = "Chưa xác định";
            break;
        case 2:
            $str = "Đồng V";
            break;
        case 3:
            $str = "Đồng IV";
            break;
        case 4:
            $str = "Đồng III";
            break;
        case 5:
            $str = "Đồng II";
            break;
        case 6:
            $str = "Đồng";
            break;
        case 7:
            $str = "Bạc V";
            break;
        case 8:
            $str = "Bạc IV";
            break;
        case 9:
            $str = "Bạc III";
            break;
        case 10:
            $str = "Bạc II";
            break;
        case 11:
            $str = "Bạc";
            break;
        case 12:
            $str = "Vàng V";
            break;
        case 13:
            $str = "Vàng IV";
            break;
        case 14:
            $str = "Vàng III";
            break;
        case 15:
            $str = "Vàng II";
            break;
        case 16:
            $str = "Vàng";
            break;
        case 17:
            $str = "Bạch Kim V";
            break;
        case 18:
            $str = "Bạch Kim IV";
            break;
        case 19:
            $str = "Bạch Kim III";
            break;
        case 20:
            $str = "Bạch Kim II";
            break;
        case 21:
            $str = "Bạch Kim";
            break;
        case 22:
            $str = "Kim Cương V";
            break;
        case 23:
            $str = "Kim Cương IV";
            break;
        case 24:
            $str = "Kim Cương III";
            break;
        case 25:
            $str = "Kim Cương II";
            break;
        case 26:
            $str = "Kim Cương";
            break;
        case 27:
            $str = "Cao Thủ";
            break;
        case 28:
            $str = "Thách Đấu";
            break;
        defaut:
            $str = "Chưa Xác Định";
            break;
    }
    return $str;
}

?>
