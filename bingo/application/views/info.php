<div id="profile" class="col-md-8">
				<h3 class="profile-title text-center">Thông tin tài khoản</h3>
<form id="update_profile" class="only-view" action="" method="post" enctype="multipart/form-data">	
	<div class="section profile-detail row">
		<div class="form-group col-md-12">
			<div class="form-left"><i class="fa fa-user" aria-hidden="true"></i>UID</div>
			<div class="form-left result">
				<?=$user_profile['uid']?>			</div>
		</div>

		<div class="form-group col-md-12">
			<div class="form-left"><i class="fa fa-user" aria-hidden="true"></i>ID</div>
			<div class="form-left result">
				<?=$user_profile['id']?>			</div>
		</div>
		<div class="form-group col-md-12">
			<div class="form-left"><i class="fa fa-user" aria-hidden="true"></i>Tên</div>
			<div class="form-left result">
				<?=$user_profile['hovaten']?>			</div>
		</div>
		<div class="form-group col-md-12">
			<div class="form-left"><i class="fa fa-envelope" aria-hidden="true"></i>Email</div>
			<div class="form-left result">
				<?=$user_profile['email']?>			</div>
		</div>

	</div>

</form>			</div>