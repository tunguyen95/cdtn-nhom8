@extends('shop.home')
@section('content')
<!-- breadcrumbs -->
<div class="breadcrumb_dress" >
	<div class="container">
		<ul>
			<li><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Trang chủ</a> <i>/</i></li>
			<li>Liên hệ</li>
		</ul>
	</div>
</div>
<!-- //breadcrumbs --> 
<!-- mail -->
<div class="mail">
	<div class="container">
		<h3 style="font-family: 'Tangerine', serif;font-weight: bold;">Liên hệ</h3>
		<div class="agile_mail_grids">
			<div class="col-md-5 contact-left">
				<h4 style="font-family: 'Tangerine', serif;">Thời trang nam nữ đẹp</h4>
				<p>est eligendi optio cumque nihil impedit quo minus id quod maxime
					<span>26 56D Rescue,US</span></p>
				<ul>
					<li>Free Phone :+1 078 4589 2456</li>
					<li>Telephone :+1 078 4589 2456</li>
					<li>Fax :+1 078 4589 2456</li>
					<li><a href="mailto:info@example.com">info@example.com</a></li>
				</ul>
			</div>
			<div class="col-md-7 contact-left">
				<h4 style="font-family: 'Tangerine', serif;">Bạn muốn liên hệ ?</h4>
				<form action="#" method="post">
					<input type="text" name="Name" placeholder="Tên" required="">
					<input type="email" name="Email" placeholder="Email" required="">
					<input type="text" name="Telephone" placeholder="Số điện thoại" required="">
					<textarea name="message" placeholder="Message..." required=""></textarea>
					<input type="submit" value="Gửi" >
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>

		<div class="contact-bottom">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1973.0622187205636!2d108.2228656753973!3d16.076593056270394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x27d2bd48ecfbd0f1!2zVHJ1bmcgVMOibSBIw6BuaCBDaMOtbmggxJDDoCBO4bq1bmc!5e0!3m2!1svi!2s!4v1498279962346" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
</div>
<!-- //mail -->
@endsection