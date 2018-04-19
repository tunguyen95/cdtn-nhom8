@extends('shop.home')
@section('content')
<!-- breadcrumbs -->
<div class="breadcrumb_dress" style="margin-top: 15px;">
	<div class="container">
		<ul>
			<li><a href="{{ url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
			<li>Single Page</li>
		</ul>
	</div>
</div>
<!-- //breadcrumbs -->  
<!-- single -->
<div class="single">
	<div class="container">
		<div class="col-md-6 single-left">
			<div class="flexslider" >
				<ul class="slides">
					<li data-thumb="">
						<div class="thumb-image"> 
							<div class="imageAndText" style="position: relative;">
							 	<img src="{{ url('images/products', $product->image_url) }}" data-imagezoom="true" class="align-center img-responsive" alt=""> 
							    <div class="col" style="position: absolute; z-index: 1; top: 0; right: -0;">
								    <div class="col-sm-6">
							        	<div class="mobiles_grid_pos">
											<h6 style="text-align: center;">
												{{ $product->name }}
											</h6>
										</div>
							        </div>
							    </div>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<!-- flexslider -->
				<script defer src="{{url('pages/js/jquery.flexslider.js')}}"></script>
				<link rel="stylesheet" href="{{url('pages/css/flexslider.css')}}" type="text/css" media="screen" />
				<script>
				// Can also be used with $(document).ready()
				$(window).load(function() {
				  $('.flexslider').flexslider({
					animation: "slide",
					controlNav: "thumbnails"
				  });
				});
				</script>
			<!-- flexslider -->
			<!-- zooming-effect -->
				<script src="{{url('pages/js/imagezoom.js')}}"></script>
			<!-- //zooming-effect -->
		</div>
		<div class="col-md-6 single-right">
			<h3 style="font-family: 'Tangerine', serif;font-weight: bold;">
				{{ $product->name }}
			</h3>
			<h4 style="font-family: 'Tangerine', serif;font-weight: bold;">
				{{ number_format($product->price, 0,',', '.') }} Vnđ
			</h4>
			<br>
			<br>
			<h4 style="font-family: 'Tangerine', serif;font-weight: bold;">
				Loại sản phẩm: {{ $product->cate_name }} 
			</h4><br>
			<h4 style="font-family: 'Tangerine', serif;font-weight: bold;">
				Tag: {{ $product->tag }} 
			</h4><br>
			<h4 style="font-family: 'Tangerine', serif;font-weight: bold;">
				Khuyến mãi: {!! $product->promotion !!} 
			</h4>	
			<br>
			<h4 style="font-family: 'Tangerine', serif;font-weight: bold;">
				Xuất xứ: {!! $product->made_in !!} -- Thương hiệu {!! $product->trade !!}
			</h4><br>
			<div class="description">
				<h5 style="font-family: 'ChunkFiveRegular';"><i>Mô tả sản phẩm: {!! $product->description !!}</i></h5>
				<p></p>
			</div>
			<div class="color-quality">
				<div class="color-quality-left">
					<h5>Color : </h5>
					<ul>
						<li><a href="#"><span></span></a></li>
						<li><a href="#" class="brown"><span></span></a></li>
						<li><a href="#" class="purple"><span></span></a></li>
						<li><a href="#" class="gray"><span></span></a></li>
					</ul>
				</div>
				<div class="color-quality-right">
					<h5>Quality :</h5>
					 <div class="quantity"> 
						<div class="quantity-select">                           
							<div class="entry value-minus1">&nbsp;</div>
							<div class="entry value1"><span>1</span></div>
							<div class="entry value-plus1 active">&nbsp;</div>
						</div>
					</div>
					<!--quantity-->
							<script>
							$('.value-plus1').on('click', function(){
								var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
								divUpd.text(newVal);
							});

							$('.value-minus1').on('click', function(){
								var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
								if(newVal>=1) divUpd.text(newVal);
							});
							</script>
						<!--quantity-->

				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="simpleCart_shelfItem">
				
				<form action="#" method="post">
					<input type="hidden" name="cmd" value="_cart">
					<input type="hidden" name="add" value="1"> 
					<input type="hidden" name="w3ls_item" value="Smart Phone"> 
					<input type="hidden" name="amount" value="450.00">   
					<button type="submit" class="w3ls-cart">Thêm vào giỏ</button>
				</form>
			</div> 
		</div>
		<div class="clearfix"> </div>
	</div>
</div> 

@endsection