<div class="newsletter">
	<div class="container">
		<div class="col-md-6 w3agile_newsletter_left">
			<h3>Trang bán hàng</h3>
			<p>Sản phẩm uy tin nhất Việt Nam.</p>
		</div>
		<div class="col-md-6 w3agile_newsletter_right">
			<form action="#" method="post">
				<input type="email" name="Email" placeholder="Email" required="">
				<input type="submit" value="" />
			</form>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<div class="footer">
	<div class="container">
		<div class="w3_footer_grids">
			<div class="col-md-3 w3_footer_grid">
				<h3>Liên hệ</h3>
				<p> Xin chào. Hãy liên hệ với chúng tôi</p>
				<ul class="address">
					<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Cổng chính<span>Trường đại học Sư phạm Hà Nội</span></li>
					<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">shopKid@gmail.com</a></li>
					<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+016888888</li>
				</ul>
			</div>
			<div class="col-md-3 w3_footer_grid">
				<h3>Thông tin</h3>
				<ul class="info"> 
					<li><a href="about.html">Về chúng tôi</a></li>
					<li><a href="mail.html">Liên hệ</a></li>
					<li><a href="codes.html">Mã giảm giá</a></li>
					<li><a href="faq.html">FAQ's</a></li>
					<li><a href="products.html">Sản phẩm</a></li>
				</ul>
			</div>
			<div class="col-md-3 w3_footer_grid">
				<h3>Loại sản phẩm</h3>
				<ul class="info"> 
				@php
					$categoreis = App\Models\CategoryModel::getCategories_lv1();
				@endphp
				@foreach ($categoreis as $key => $category)
					<li><a href="{{ url('categories', $category->slug) }}">{{ $category->name }}</a></li>
				@endforeach
				</ul>
			</div>
			<div class="col-md-3 w3_footer_grid">
				<h3>Cá nhân</h3>
				<ul class="info"> 
					<li><a href="index.html">Trang chủ</a></li>
					<li><a href="products.html">Ngày giảm giá</a></li>
				</ul>
				<h4>Theo dõi</h4>
				<div class="agileits_social_button">
					<ul>
						<li><a href="#" class="facebook"> </a></li>
						<li><a href="#" class="twitter"> </a></li>
						<li><a href="#" class="google"> </a></li>
						<li><a href="#" class="pinterest"> </a></li>
					</ul>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="footer-copy">
		<div class="footer-copy1">
			<div class="footer-copy-pos">
				<a href="#home1" class="scroll"><img src="{{url('/shop/images/arrow.png')}}" alt=" " class="img-responsive" /></a>
			</div>
		</div>
		<div class="container">
			<p>&copy; RNT STORE. Fashion in Da Nang City | Design by <a href="#">RNT TEAM</a></p>
		</div>
	</div>
</div>