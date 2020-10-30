<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
        case on:
            $str = "Chưa Bán";
            break;
        case off:
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
        case yes:
            $str = "OK";
            break;
        case no:
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
        case LMHT:
            $str = "Liên Minh Huyền Thoại";
            break;
        case LQ:
            $str = "Liên Quân";
            break;
       case FA:
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
            $str = "Đồng I";
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
            $str = "Bạc I";
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
            $str = "Vàng I";
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
            $str = "Bạch Kim I";
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
            $str = "Kim Cương I";
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