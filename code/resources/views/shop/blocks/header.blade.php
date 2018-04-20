<!-- header -->
<div class="header" id="home1">
	<div class="container">
			@if (Auth::guard('customer')->check())
			<div class="col-md-1">
				<div class="dropdown" id="dangnhap">
				    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> Xin chào,
				    {{ Auth::guard('customer')->user()->name }}<span style="color: #CC9900"> </span>
				    <span class="caret"></span></button>
				    <ul class="dropdown-menu">
				      <li><a href=""><span><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profile </span></a></li>
				      <li>
			                <a href="{{ url('customer/logout') }}"><span><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</span></a>
				      </li>
				    </ul>
				</div>
			</div>
			@else 
			<div class="w3l_login">
				<a href="#" data-toggle="modal" data-target="#myModal88"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
			</div>
			@endif
			<div class="w3l_logo">
				<h1 style="font-family: 'El Messiri', sans-serif;"><a href="{{url('/')}}">Shop kid CNB<span style="font-family: 'Lobster', cursive;">Sự lựa chọn tuyệt vời của bạn  </span></a></h1>
			</div>
			<div class="search">
				<input class="search_box" type="checkbox" id="search_box">
				<label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
				<div class="search_form">
					<form action="#" method="post">
						<input type="hidden" name="_token" value="{!! csrf_token() !!}">
						<input type="text" name="Search" placeholder="Tìm kiếm...">
						<input type="submit" value="Send">
					</form>
				</div>
			</div>
			<div class="cart cart box_1"> 
				<form action="#" method="post" class="last" > 
					<input type="hidden" name="_token" value="{!! csrf_token() !!}">
					<input type="hidden" name="cmd" value="_cart" />
					<input type="hidden" name="display" value="1" />
					<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
				</form>   
			</div> 
	</div>

	<div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"
	aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;</button>
				<h4 class="modal-title" id="myModalLabel">Don't Wait, Login now!</h4>
			</div>
			<div class="modal-body modal-body-sub">
				<div class="row">
					<div class="col-md-8 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
						<div class="sap_tabs">	
							<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
								<ul>
									<li class="resp-tab-item" aria-controls="tab_item-0"><span>Đăng nhập</span></li>
									<li class="resp-tab-item" aria-controls="tab_item-1"><span>Đăng ký</span></li>
								</ul>		
								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
									<div class="facts">
										<div class="register">
											<form action="{{ url('customer/login') }}" method="post">	
												<input type="hidden" name="_token" value="{!! csrf_token() !!}">		
												<input name="account" placeholder="Tên đăng nhập" type="text">						
												<input name="password" placeholder="Mật khẩu" type="password">										
												<div class="sign-up">
													<input type="submit" value="Sign in"/>
												</div>
											</form>
										</div>
									</div> 
								</div>	 
								<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
									<div class="facts">
										<div class="register">
											<form action="{{ url('createUser') }}" method="post">
												@method('POST')
												@csrf
												<input style="margin-bottom: 15px;" placeholder="Tên người dùng" name="name" type="text">
												<input placeholder="Tài khoản" name="account" type="text">
												<input placeholder="Email" name="email" type="email">	
												<input placeholder="Mật khẩu" name="password" type="password">	
												<input placeholder="Xác nhận mật khẩu" name="confirmPassword" type="password">
												<div class="sign-up">
													<button class="btn btn-info" type="submit">Đăng kí tài khoản</button>
												</div>
											</form>
										</div>
									</div>
								</div> 			        					            	      
							</div>	
						</div>
						<script src="{{url('/shop/js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
						<script type="text/javascript">
							$(document).ready(function () {
								$('#horizontalTab').easyResponsiveTabs({
									type: 'default', //Types: default, vertical, accordion           
									width: 'auto', //auto or any width like 600px
									fit: true   // 100% fit in a container
								});
							});
						</script>
						<div id="OR" class="hidden-xs">OR</div>
					</div>
					<div class="col-md-4 modal_body_right modal_body_right1">
						<div class="row text-center sign-with">
							<div class="col-md-12">
								<h3 class="other-nw">Sign in with</h3>
							</div>
							<div class="col-md-12">
								<ul class="social">
									<li class="social_facebook"><a href="#" class="entypo-facebook"></a></li>
									<li class="social_dribbble"><a href="#" class="entypo-dribbble"></a></li>
									<li class="social_twitter"><a href="#" class="entypo-twitter"></a></li>
									<li class="social_behance"><a href="#" class="entypo-behance"></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 
</div>