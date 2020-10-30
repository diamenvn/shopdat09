<?php $i = 0; ?>
<?php foreach($querylmht->result() as $row): ?>
<?php



if($row->loainick =='LQ'){
$rank = get_string_ranklq($row->rank);
$url = 'diamond'; 

} else if($row->loainick =='LMHT'){
$rank = get_string_rank($row->rank);
$url = get_khung($row->khung); 

} else {
    $url = "noborder";
    $rank = "";
}




?>

<div class="sa-lpcol">
                        <div class="sa-lpi" style="border-image: url(/assets/img/khung/<?=$url?>.png) 25 round;">                            <a class="sa-lpimg" href="/account/68">
                            </a><a class="sa-lpimg" href="/<?=seo($row->loainick,$rank,$row->gia,$row->noidung)?>.html">
                                 <?php if($row->loainick != 'RANDOM'){ ?>

                                <h3><span class="sa-lpcode">#<?=$row->noidung?> - <?php echo ($row->loainick == 'RANDOM' ? 'RANDOM' : $rank); ?></span></h3>
                                <?php } ?>
                                <p class="sa-lpping"><img src="<?php $image = explode("|",$row->hinhanh); echo $image[0];?>">
                                </p>
                                                                <?php if($row->loainick != 'RANDOM'){ ?>
    
                            <div class="sa-lpinfo">
                                <div class="sa-lpits mcustomscrollbar">

                                    <br>
                                    ● Rank: <?=$rank;?><br>
                                    
                                    <?php if($row->loainick == 'LMHT'){ ?>
                                    ● Khung <?=get_string_khung($row->khung);?><br>    
                                    <?php } ?>
                                    ● Tướng: <?=$row->count_champ;?><br>
                                    ● Trang Phục: <?=$row->count_skin?><br>
                                    ● Bảng Ngọc: <?=$row->count_bangngoc?><br>
                                                            </div>
                                                          
                        </div>     
                           <?php }  ?>      

                            </a>
                            <div class="sa-lpbott clearfix">
                                                                    <?php if($row->loainick != 'RANDOM'){ ?>

                                <div class="gg-info">
                                    <div class="gg-lpbif"> <p class="hero"> Tướng: <?=$row->count_champ;?> <br> </p><p class="skin"> Skin: <?=$row->count_skin?></p></div>
                                   
                                    <div class="gg-lpbpri"> <p class="hero"> Ngọc: <?=$row->count_bangngoc?> <br> </p><p class="skin"> Giảm giá: 0% </p></div>
                                </div>
                                 <?php } ?>

                                <div class="sa-lpbif" style="    text-align: left;">
                                                                                                    <?php if($row->loainick != 'RANDOM'){ ?>
    
                                    <p class="sa-lpbpice"><br></p>
                                    <a href="/<?=seo($row->loainick,$rank,$row->gia,$row->noidung)?>.html" class="xem-acc" title="XEM ACC">XEM ACC</a>
                                    <?php } else { echo '#'.$row->noidung.''; }?>
                                </div>

                                <div class="sa-lpbpri">
                                    <p class="sa-lpbpice"><?=number_format($row->gia)?><sup>đ</sup></p>
                                    <p></p>
                                 <?php if($row->loainick != 'RANDOM'){ ?>
    
                                    <a id="button_mua" class="sa-lpbbtn ac-buy-acc" data-price="<?=$row->gia?>" title="MUA NGAY" data-id="<?=$row->noidung?>" title="MUA NGAY">MUA NGAY</a>
                                    
                                <?php  } else { ?>
                                
                                    <a id="button_mua1" class="sa-lpbbtn ac-buy-acc" data-price="<?=$row->gia?>" title="MUA NGAY" data-id="<?=$row->noidung?>" title="MUA NGAY">THỬ NGAY</a>


                                <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>




<?php if($i % 4 == 3):?>
<div class="clearfix"></div> 
<?php endif; ?>


<?php $i++;?>
 <?php endforeach; ?>

 <?php 
 if (isset($page) && $page AND isset($pages) && $pages){
    if($page < $pages) { ?>
 <br />
 <div class="text-center button-more">
            <a class="last btn btn-flat" href="/view/index?page=<?php echo $page + 1; ?>&loainick=<? echo $type ?>" title="Xem thêm">Xem thêm </a>
        </div>

<? }} ?>
