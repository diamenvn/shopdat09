			<div class="col-md-4 sidebar">
				<div class="sb-profile">
					<div class="profile-thumb">
						<form id="update_ava" action="#" method="post" enctype="multipart/form-data">
							<div id="avatar_user">
								<img class="avatar" src="https://quaynhanh.com/wp-content/uploads/bfi_thumb/no_img-o0oxga7un457s2b6e1dxi4qwho356eopdnmbnz19wc.jpg" alt=""/>
								<a href="#" class="btn-avatar"><i class="fa fa-camera"></i></a>
							</div>
							<h3 class="name-user"><?=$user_profile['hovaten']?></h3>
						</form>
					</div>
					<ul class="acc-info">
						<li class="get-money">Tài khoản: <span><?=number_format($user_profile['cash'])?></span> đ <a href="/nap-tien.html" class="btn-cs">Nạp thêm</a></li>
						<li class="num-play">Số lượt quay: <span><?=number_format($user_profile['quay'])?></span> <a href="#" data-toggle="modal" data-target="#modalBuy" class="btn-cs">Mua lượt</a></li>						
					</ul>
					<ul class="left-menu">
						<li class="active">
							<a href="/profile.html"><i class="fa fa-user"></i>Thông tin</a>
						</li>
						<li class="">
							<a href="/lich-su-quay.html"><i class="fa fa-history"></i>Lịch sử quay</a>
						</li>
						<li class="">
							<a href="/lich-su-nap.html"><i class="fa fa-credit-card"></i>Lịch sử nạp</a>
						</li>
						<li class="">
							<a href="/lich-su-mua.html"><i class="fa fa-credit-card"></i>Lịch sử mua</a>
						</li>
						<li><a href="/logout.html" title="Sign Out"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
					</ul>
				</div>
			</div>