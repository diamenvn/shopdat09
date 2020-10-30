<?php if($not): ?>

<style>
    .ppp {
    font-weight: bold;
    text-align: center;
    }
        .duoi {
    position: absolute;
    z-index: 1000;
    /* border: 25px; */
    text-align: center;
    bottom:0;
    background: rgba(0, 0, 0, 0.5);
    width: 111;
    display: block;
}
.centered {
    text-align: center;
    font-size: 0;
}
.vvvv {
    text-align: center;
    color: rgba(255, 0, 0, 0.63);
    font-weight: bold;
}
.centered > div {
    float: none;
    display: inline-block;
    text-align: left;
    font-size: 13px;
}
.ccc {
    height: fit-content;
}
</style>
<div class="sa-mainsa">
    <div class="container">
        <div class="sa-lprod">
            <div class="sa-lpmain">
                <div class="sa-lsnmain clearfix">
                    <ul class="sa-brea">
                        <li><a href="/" title="Trang Chủ">Trang Chủ</a></li>
                        <li class="active"><a href="javascript:;" title="Tài Khoản #<?=$query[0]['noidung']?> - <?=get_string_rank($query[0]['rank']);?> - <?=get_string_khung($query[0]['khung']) ?>">Tài Khoản #<?=$query[0]['noidung']?> - Bảng ngọc : <?=$query[0]['count_bangngoc']?>
                            <?php if($query[0]['loainick'] == 'LMHT'){ ?>
                            - <?=get_string_khung($query[0]['khung']) ?> 
                            - Rank <?=get_string_rank($query[0]['rank']);?> 
                            - <?=$query[0]['ip']?> Tinh hoa lam - <?=$query[0]['rp']?> RP - Rank động : <?=$query[0]['rankdong']?>
                            <?php } else { ?>
                            
                            
                            
                            
                            - Rank <?=get_string_ranklq($query[0]['rank']);?> 
                            <?php } ?></a></li>
                    </ul>
                    <div class="sa-ttacc">
                        <div class="sa-ttactit clearfix">

                            <h1 class="sa-ttacc-tit">Tài Khoản #<?=$query[0]['noidung']?> - Bảng ngọc : <?=$query[0]['count_bangngoc']?>
                            <?php if($query[0]['loainick'] == 'LMHT'){ ?>
                            - <?=get_string_khung($query[0]['khung']) ?> 
                            - Rank <?=get_string_rank($query[0]['rank']);?> 
                            - <?=$query[0]['ip']?> Tinh hoa lam - <?=$query[0]['rp']?> RP - Rank động : <?=$query[0]['rankdong']?>
                            <?php } else { ?>
                            
                            
                            
                            
                            - Rank <?=get_string_ranklq($query[0]['rank']);?> 
                            <?php } ?>

                            <?=$query[0]['thongtin']?>
                            
                            </span></h1>
                            <ul class="sa-ttactul">
                                                                <li class="sa-ttac-pri"><?=number_format($query[0]['gia'])?><sup>đ</sup></li>                              
                                <li class="sa-ttac-btn"><a id="<?php echo ($query[0]['loainick'] != 'RANDOM' ?'button_mua' : 'button_mua1'); ?>" class="ac-buy-acc" data-price="<?=$query[0]['gia']?>" title="MUA NGAY" data-id="<?=$query[0]['noidung']?>">MUA NGAY</a></li>
                                                            </ul>
                        </div>



             

                        </div>
                        <ul class="sa-ttacc-tabs clearfix" role="tablist">
                            <li role="presentation" class="active"><a href="#ct-thong-tin" role="tab" data-toggle="tab">THÔNG TIN</a></li> 

                            <?php if($query[0]['loainick'] == 'LMHT'){ ?>
                            <li role="presentation">
                                <a href="#ct-trang-phuc" role="tab" data-toggle="tab">
                                    TRANG PHỤC
                                        <span><?=$query[0]['count_skin']?></span>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#ct-tuong" role="tab" data-toggle="tab">
                                    TƯỚNG
                                        <span><?=$query[0]['count_champ']?></span>
                                </a>
                            </li>
                            <?php } ?>

                                                      <!--  <li role="presentation">
                                <a href="#ct-ngoc-bo-tro" role="tab" data-toggle="tab">
                                    NGỌC HỖ TRỢ
                                        <span>0</span>
                                </a>
                            </li> -->
                                                    </ul>
                        <div class="sa-ttacc-tcont tab-content">
                                                        <div role="tabpanel" class="tab-pane active" id="ct-thong-tin">
                                <div style="text-align: center;">
<?php if($mobile){
    
    $image = explode("|",$query[0]['hinhanh']);
    foreach ($image as $row){
        echo '<img src="'.$row.'">';
    }
}  else {

?>
<div class="swiper-container ccc swiper-container-horizontal">
                    <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px); transition-duration: 0ms;">
      

                            <?php $image = explode("|",$query[0]['hinhanh']); ?>
                            <?php foreach($image as $row): ?>


                                <div class="swiper-slide" style="width: 100%; margin-right: 5px;">
                                <a>
                                    
                                    <img style="width: 100%; border: 3px solid #948159;" src="<?=$row?>">
                                    
                                </a>
                            </div>

            
                        <?php endforeach; ?>      

                                                                        
                </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
                </div>                                               
    
<?php } ?>
               
 
                                </div>
                            </div>
<?php if($query[0]['loainick'] == "LMHT"){ ?>
<div role="tabpanel" class="tab-pane" id="ct-trang-phuc">

<div class="row" style="margin-bottom: 10px;">
                        
<div class="col-md-4"> </div>
<div class="col-md-4"> </div>
                            <div class="col-md-4">
                                                 <div class="input-group">
                     <div class="input-group-addon">Lọc theo Skin</div>
                     <input class="form-control " id="searchSkins" placeholder="Tìm tên Skin">
                  </div>
                            </div>

                        </form></div>
 <script type="text/javascript">
    document.getElementById("searchSkins")
    .oninput = function() {
        var matcher = new RegExp(document.getElementById("searchSkins")
            .value, "gi");
        for (var i = 0; i < document.getElementsByClassName("ui equal width skin card")
            .length; i++) {
            if (matcher.test(document.getElementsByClassName("duoi")[i].innerHTML)) {
                document.getElementsByClassName("ui equal width skin card")[i].style.display = "inline-block";
            }
            else {
                document.getElementsByClassName("ui equal width skin card")[i].style.display = "none";
            }

        }
    }

 </script>
     

<ul class="l-i-c-acc centered">



<?php

if(!empty($query[0]['skins']) && $query[0]['count_skin'] > 0){


 $skintest = "championsskin_51011-Caitlyn Vũ Khí Tối Thượng/150000|championsskin_77003-Udyr Tứ Linh Vệ Hồn/120000|championsskin_37006-DJ Sona/120000|championsskin_1010-Annie Công Nghệ/120000|championsskin_67010-Vayne Đoạt Hồn/150000|championsskin_92016-Riven Thần Kiếm/100000|championsskin_92007-Riven Quán Quân 2016/200000|championsskin_157009-Yasuo Ma Kiếm/100000|championsskin_15008-Sivir Vinh Quang/20000|championsskin_13004-Ryze Vinh Quang/500000|championsskin_25006-Morgana Vinh Quang/30000|championsskin_60002-Elise Vinh Quang/30000|championsskin_429002-Kalista Quán Quân/20000|championsskin_238010-Zed Quán Quân/30000|championsskin_92007-Riven Quán Quân/200000|championsskin_15005-PAX Sivir/3000000|championsskin_29003-Twitch Trung Cổ/300000|championsskin_4001-PAX Twisted Fate/3000000|championsskin_42001-Corki Đĩa Bay/20000|championsskin_19001-Warwick Xám/50000|championsskin_53001-Blitzcrank Rệu Rã/20000|championsskin_59004-Jarvan IV Vinh Quang/100000|championsskin_412002-Thresh Quán Quân/30000|championsskin_238003-SIÊU PHẨM: Zed/30000|championsskin_157002-SIÊU PHẨM: Yasuo/30000|championsskin_114004-SIÊU PHẨM: Fiora/30000|championsskin_11009-SIÊU PHẨM: Yi/30000|championsskin_236006-SIÊU PHẨM: Lucian/30000|championsskin_89008-SIÊU PHẨM: Leona/30000|championsskin_55009-SIÊU PHẨM: Katarina/30000|championsskin_22008-SIÊU PHẨM: Ashe/50000|championsskin_245003-SIÊU PHẨM: Ekko/50000|championsskin_68003-Rumble Siêu Nhân Thiên Hà/40000|championsskin_14005-Sion Người Máy Biến Hình/20000|championsskin_15006-Sivir Bão Tuyết/10000|championsskin_18010-Tristana Luyện Rồng/20000|championsskin_23004-Tryndamere Quỷ Kiếm/10000|championsskin_110006-Varus Hắc Tinh/10000|championsskin_45008-Veigar Trùm Cuối/10000|championsskin_102005-Shyvana Quán Quân/30000|championsskin_5005-Xin Zhao Triệu Tử Long/10000|championsskin_157003-Yasuo Huyết Nguyệt/20000|championsskin_63005-Brand Hỏa Linh/10000|championsskin_122004-Darius Siêu Sao Úp Rổ/20000|championsskin_105009-Fizz Siêu Nhân Thiên Hà/30000|championsskin_62005-Ngộ Không Bá Nhật/30000|championsskin_222004-Jinx Vệ Binh Tinh Tú/20000|championsskin_62004-Ngộ Không Âm Phủ/20000|championsskin_11010-Master Yi Kiếm Sĩ Vũ Trụ/80000|championsskin_54006-Malphite Máy Móc/20000|championsskin_117006-Lulu Vệ Binh Tinh Tú/10000|championsskin_64011-Lee Sin Tuyệt Vô Thần/50000|championsskin_64010-Lee Sin Nốc Ao/1000|championsskin_121003-Kha'Zix Hoa Độc/1000|championsskin_121004-Kha'Zix Hắc Tinh/10000|championsskin_40004-Janna Vinh Quang/200000|championsskin_223002-Tahm Kench Urf/10000|championsskin_24003-Jax Ngư Ông/10000|championsskin_24004-PAX Jax/3000000|championsskin_203002-Kindred Siêu Nhân Thiên Hà/30000|championsskin_222003-Jinx Thợ Săn Xác Sống/30000|championsskin_59005-Jarvan IV Lữ Bố/40000|championsskin_104005-Graves Tiệc Bể Bơi/20000|championsskin_104004-Riot Graves/2000000|championsskin_86011-Garen Long Tướng/50000|championsskin_24003-Jax Ngư Ông/40000|championsskin_86006-Garen Quân Đoàn Thép/10000|championsskin_114003-Cô Giáo Fiora/30000|championsskin_126003-Jayce Kẻ Phản Diện/20000|championsskin_27001-Riot Squad Singed/500000|championsskin_53007-Riot Blitzcrank/500000|championsskin_75004-Riot K-9 Nasus/500000|championsskin_104004-Riot Graves/1000000|championsskin_99007-Lux Thập Đại Nguyên Tố/200000";
$vc = array();
$skins = explode('|',$query[0]['skins']);
if(count($skins) != 0){
foreach ($skins as $value) {
    $tenSkin = explode('-',$value);

    preg_match_all('/championsskin_([0-9]+)-'.$tenSkin[1].'\/([0-9]+)/', $skintest, $xuat);
    if(isset($xuat[1][0])){


            $vc[] = 'championsskin_'.$xuat[1][0].'-'.$tenSkin[1].'';
            if(($key = array_search('championsskin_'.$xuat[1][0].'-'.$tenSkin[1].'', $skins)) !== false) {
                unset($skins[$key]);
            }
      }

}
if(count($vc) > 0){
foreach ($vc as $key => $value) {
    $output = explode('-',$value);
    echo '<div class="ui equal width skin card" style="    border: 2px solid #f5b003;
    border-radius: 6px;">
                <div class="image skin-search-image-div vip"><img class="skin-search-image-id" src="/assets/skins/'.$output[0].'.jpg" alt="'.$output[1].'">
                                <div class="duoi">'.$output[1].'</div>

</div>

              </div>';
    }

}
}?>
</ul>
<ul class="l-i-c-acc">

<?
foreach($skins as $sss): 
?>
<?php $skins1 = explode('-',$sss); ?>

                   <div class="ui equal width skin card" style="border: 1px solid #615B35;">
                <div class="image skin-search-image-div"><img class="skin-search-image-id" src="/assets/skins/<?=$skins1[0]?>.jpg" alt="<?=$skins1[1]?>">
                                <div class="duoi"><?=$skins1[1]?></div>

</div>

              </div>
                                   
<?php endforeach; } ?>
                                                                    </ul>
                            </div>
 <div role="tabpanel" class="tab-pane" id="ct-tuong">
                                                                <ul class="l-i-c-acc">
                                                                        <?php
$champs = explode('|',$query[0]['champs']);
foreach($champs as $ssss): 
?>
<?php $champs1 = explode('-',$ssss); ?>

<div class="ui equal width champion card" style="border: 1px solid #615B35;">
                <div class="image"><img src="/assets/champs/<?=$champs1[0]?>_Web_0.jpg" alt="<?=$champs1[1]?>">
                              <div class="duoi"><?=$champs1[1]?></div>
</div>

              </div>

<?php endforeach; ?>
                                   


                                                                    </ul>
                            </div>
                            <?php } ?>


                                                    </div>
                    </div>
                                  

                          <? $acc = array('querylmht' => $querylmht,'type' => $query[0]['loainick'],'page' => 2,'pages' => '1');

                           $this->load->view('view',$acc);?>





                    </div>
                                    </div>
            </div>
        </div>
    </div>
</div>
           <script>
    var mySwiper = new Swiper('.swiper-container', {
     preventClicks: false,
                paginationClickable: true,
                pagination: '.swiper-pagination',
                nextButton: '.swiper-button-next',
                prevButton: '.swiper-button-prev',
                spaceBetween: 5,
                centeredSlides: true,
                autoplay: 2500,
                autoplayDisableOnInteraction: false
});
    </script>       
<?php else: ?>
    <div class="sa-mainsa">
    <div class="container">
<div class="block remove-margin-b remove-padding-b">
	<div class="alert alert-danger">
		<span><strong>Opps!</strong> Tài khoản này không có hoặc đã bị xóa.</span>
	</div>
</div>
</div>
</div>
<?php endif; ?>
  