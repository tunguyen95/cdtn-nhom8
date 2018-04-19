@extends('shop.home')
@section('content') 
	<div class="container">
		<div class="grid_3 grid_4">
			<h3 class="w3ls-hdg"></h3>
			<div class="tab-content">
				<div class="tab-pane active" id="horizontal-form">
					<form class="form-horizontal" style="font-size: 15px;" method="POST">
						<input type="hidden" name="_token" value="{!! csrf_token() !!}">
					 	<fieldset>
					 		<legend style="font-size: 18px;padding-left: 32%;font-weight: bold;">Thông tin tài khoản</legend>
					 		<hr style="width: 45%;margin-left: 18%;">
					 		<div class="form-group">
					 			<div class="col-sm-2"></div>
					 			<div class="col-sm-6">
					 				@include('admin.blocks.errors')
					 				@include('admin.blocks.alerts')
					 			</div>
					 		</div>
							<div class="form-group">
								<label for="disabledinput" class="col-sm-2 control-label">Tên đăng nhập</label>
								<div class="col-sm-6">
								<input disabled="" type="text" class="form-control1" id="disabledinput" placeholder="Tên đăng nhập" name="txtUser" value="{{ old('txtUser',isset($user) ? $user['name'] :null)}}">
								</div>
							</div>
							<div class="form-group">
								<label for="mediuminput" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-6">
								<input disabled="" type="text" class="form-control1" id="mediuminput" placeholder="Email" name="txtEmail" value="{{ old('txtEmail',isset($user) ? $user['email'] :null)}}">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="col-sm-2 control-label">Mật khẩu</label>
								<div class="col-sm-6">
								<input type="password" class="form-control1" id="inputPassword" placeholder="Mật khẩu" name="txtPass">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="col-sm-2 control-label">Xác nhận mật khẩu</label>
								<div class="col-sm-6">
								<input type="password" class="form-control1" id="inputPassword" placeholder="Xác nhận mật khẩu" name="txtRePass">
								</div>
							</div>
					 	</fieldset>
					 	<fieldset>
					 		<legend style="font-size: 18px;padding-left: 32%;font-weight: bold;">Thông tin chi tiết</legend>
					 		<hr style="width: 45%;margin-left: 18%;">
							<div class="form-group">
								<label for="disabledinput" class="col-sm-2 control-label">Họ tên</label>
								<div class="col-sm-6">
								<input  type="text" class="form-control1" id="disabledinput" placeholder="Họ tên" name="txtName" value="{{ old ('txtName',isset($user_details) ? $user_details['name'] : null)}}">
								</div>
							</div>
							<div class="form-group">
								<label for="mediuminput" class="col-sm-2 control-label">Ngày sinh</label>
								<div class="col-sm-6">
								<input type="text" class="form-control1" id="mediuminput" placeholder="Ngày sinh" name="txtBirthday" value="{{ old ('txtBirthday',isset($user_details) ? $user_details['birthday'] : null)}}">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="col-sm-2 control-label">Điện thoại</label>
								<div class="col-sm-6">
								<input type="text" class="form-control1" id="inputPassword" placeholder="Điện thoại" name="txtTel" value="{{ old ('txtTel',isset($user_details) ? $user_details['tel'] : null)}}">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-6">
								<input type="text" class="form-control1" id="inputPassword" placeholder="Email" name="txtEmails" value="{{ old ('txtEmails',isset($user_details) ? $user_details['email'] : null)}}">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="col-sm-2 control-label">Địa chỉ</label>
								<div class="col-sm-6">
								<input type="text" class="form-control1" id="inputPassword" placeholder="Địa chỉ" name="txtAddress" value="{{ old ('txtAddress',isset($user_details) ? $user_details['address'] : null)}}">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword" class="col-sm-2 control-label">Thành phố</label>
								<div class="col-sm-6">
								<input type="text" class="form-control1" id="inputPassword" placeholder="Thành phố" name="txtCity" value="{{ old ('txtCity',isset($user_details) ? $user_details['city'] : null)}}">
								</div>
							</div>
					 	</fieldset>
					 	<div class="form-actions" style="margin-left: 30%;">
							<button type ="submit" class="btn btn-primary">Lưu thông tin</button>
							<button type ="reset" class="btn">Hủy</button>
						</div>
					</form>
				</div>
			</div>
		</div>  
	</div>
@endsection