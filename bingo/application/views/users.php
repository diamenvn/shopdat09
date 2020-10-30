      <div class="container">
	<div class="profile-page">
		<div class="row">

			<div class="col-md-4 sidebar">
				<div class="sb-profile">
					<div class="profile-thumb">
						<form id="update_ava" action="#" method="post" enctype="multipart/form-data">
							<div id="avatar_user">
								<img class="avatar" src="https://graph.facebook.com/<?=$user_profile['fb']?>/picture?type=large" alt=""/>
								<a href="#" class="btn-avatar"><i class="fa fa-camera"></i></a>
							</div>
							<h3 class="name-user"><?=$user_profile['name']?></h3>
						</form>
					</div>
					<ul class="acc-info">
						<li class="get-money">Tài khoản: <span><?=number_format($user_profile['money'])?></span> đ <a href="https://shopdat09.com/user/topup" class="btn-cs">Nạp Thêm</a></li>
						<li class="num-play">Số lượt quay: <span><?=number_format($user_profile['quay'])?></span> <a href="#" data-toggle="modal" data-target="#modalBuy" class="btn-cs">Mua Lượt</a></li>						
					</ul>
					<ul class="left-menu">
						<li <?php if($this->router->fetch_method() == 'profile'){ echo ' class="active"';}?>>
							<a href="/profile.html"><i class="fa fa-user"></i>Thông tin</a>
						</li>
						<li <?php if($this->router->fetch_method() == 'lichsuquay'){ echo ' class="active"';}?>>
							<a href="/lich-su-quay.html"><i class="fa fa-history"></i>Lịch sử quay</a>
						</li>

						<li><a href="/logout.html" title="Sign Out"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
					</ul>
				</div>
			</div>



        	<?=$this->load->chen('user/'.$this->router->fetch_method().'')?>




		</div>
	</div>
</div>
