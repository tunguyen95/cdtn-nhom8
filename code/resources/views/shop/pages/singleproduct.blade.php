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
					<?php
						$price =round(100- $product_detail->promotion_price * 100 / $product_detail->unit_price);
					 ?>
					@if($product_detail->promotion_price !=0 && $product_detail->promotion_price <= $product_detail->unit_price )
						<li data-thumb="{{ asset('resources/upload/'.$product->image)}}">
							<div class="thumb-image"> 
								<div class="imageAndText" style="position: relative;">
								 	<img src="{{ asset('resources/upload/'.$product->image)}}" data-imagezoom="true" class="align-center img-responsive" alt=""> 
								    <div class="col" style="position: absolute; z-index: 1; top: 0; right: -0;">
									    <div class="col-sm-6">
								        	<div class="mobiles_grid_pos">
												<h6 style="text-align: center;">- {{ $price }} %</h6>
											</div>
								        </div>
								    </div>
								</div>
							</div>
						</li>
					@else 
						<li data-thumb="{{ asset('resources/upload/'.$product->image)}}">
							<div class="thumb-image"> 
								<img src="{{ asset('resources/upload/'.$product->image)}}" data-imagezoom="true" class="img-responsive" alt=""> 
							</div>
						</li>
					@endif
					
					@foreach($product_image as $image_item)
					@if($product_detail->promotion_price !=0 && $product_detail->promotion_price <= $product_detail->unit_price )
					<li data-thumb="{{ asset('resources/upload/detail/'.$image_item->image)}} ">
						 <div class="thumb-image"> 
							 <div class="imageAndText" style="position: relative;">
							 	<img src="{{ asset('resources/upload/detail/'.$image_item->image)}}" data-imagezoom="true" class="align-center img-responsive" alt=""> 
							    <div class="col" style="position: absolute; z-index: 1; top: 0; right: -0;">
							        <div class="col-sm-6">
							        	<div class="mobiles_grid_pos">
											<h6 style="text-align: center;">- {{ $price }} %</h6>
										</div>
							        </div>
							    </div>
							</div>
						 </div>
					</li>
					@else 
					<li data-thumb="{{ asset('resources/upload/detail/'.$image_item->image)}} ">
						 <div class="thumb-image"> 
							 <img src="{{ asset('resources/upload/detail/'.$image_item->image)}}" data-imagezoom="true" class="align-center img-responsive" alt=""> 
						 </div>
					</li>
					@endif
					@endforeach
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
			<h3 style="font-family: 'Tangerine', serif;font-weight: bold;">{{$product->name}}</h3>
			<div class="rating1">
				<span class="starRating">
					<input id="rating5" type="radio" name="rating" value="5">
					<label for="rating5">5</label>
					<input id="rating4" type="radio" name="rating" value="4">
					<label for="rating4">4</label>
					<input id="rating3" type="radio" name="rating" value="3" checked>
					<label for="rating3">3</label>
					<input id="rating2" type="radio" name="rating" value="2">
					<label for="rating2">2</label>
					<input id="rating1" type="radio" name="rating" value="1">
					<label for="rating1">1</label>
				</span>
			</div>
			<div class="description">
				<h5 style="font-family: 'ChunkFiveRegular';"><i>Mô tả sản phẩm</i></h5>
				<p>{{$product_detail->description }}</p>
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
			<!-- <div class="occasional">
				<h5>RAM :</h5>
				<div class="colr ert">
					<div class="check">
						<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>3 GB</label>
					</div>
				</div>
				<div class="colr">
					<div class="check">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>2 GB</label>
					</div>
				</div>
				<div class="colr">
					<div class="check">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>1 GB</label>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div> -->
			<div class="simpleCart_shelfItem">
				@if($product_detail->promotion_price !=0 && $product_detail->promotion_price <= $product_detail->unit_price )
				<p><span>{{ number_format($product_detail->unit_price,0,',','.') }}</span> <i class="item_price">{{ number_format($product_detail->promotion_price,0,',','.') }} VND</i></p>
				@else 
				<p><i class="item_price">{{ number_format($product_detail->unit_price,0,',','.') }} VND</i></p>
				@endif
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
<div class="additional_info">
	<div class="container">
		<div class="sap_tabs">	
			<div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
				<ul>
					<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Product Information</span></li>
					<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Reviews</span></li>
				</ul>		
				<div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0">
					<h3>{{$product->name}}</h3>
					<p>{{$product_detail->description }}</p>
					<p id="txtIntro">{{$product_detail->intro }}</p>
                  	<script type="text/javascript"> ckeditor("txtIntro") </script>
					<p id="txtContent">{{$product_detail->content }}</p>
					<script type="text/javascript"> ckeditor("txtContent") </script>
				</div>	

				<div class="tab-2 resp-tab-content additional_info_grid" aria-labelledby="tab_item-1">
					<h4>(2) Reviews</h4>
					<div class="additional_info_sub_grids">
						<div class="col-xs-2 additional_info_sub_grid_left">
							<img src="{{url('pages/images/t1.png')}}" alt=" " class="img-responsive" />
						</div>
						<div class="col-xs-10 additional_info_sub_grid_right">
							<div class="additional_info_sub_grid_rightl">
								<a href="single.html">Laura</a>
								<h5>Oct 06, 2016.</h5>
								<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
									velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat 
									quo voluptas nulla pariatur.</p>
							</div>
							<div class="additional_info_sub_grid_rightr">
								<div class="rating">
									<div class="rating-left">
										<img src="{{url('pages/images/star-.png')}}" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="{{url('pages/images/star-.png')}}" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="{{url('pages/images/star-.png')}}" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="{{url('pages/images/star.png')}}" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="{{url('pages/images/star.png')}}" alt=" " class="img-responsive">
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="additional_info_sub_grids">
						<div class="col-xs-2 additional_info_sub_grid_left">
							<img src="images/t2.png" alt=" " class="img-responsive" />
						</div>
						<div class="col-xs-10 additional_info_sub_grid_right">
							<div class="additional_info_sub_grid_rightl">
								<a href="single.html">Michael</a>
								<h5>Oct 04, 2016.</h5>
								<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
									velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat 
									quo voluptas nulla pariatur.</p>
							</div>
							<div class="additional_info_sub_grid_rightr">
								<div class="rating">
									<div class="rating-left">
										<img src="{{url('pages/images/star-.png')}}" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="{{url('pages/images/star-.png')}}" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="{{url('pages/images/star.png')}}" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="{{url('pages/images/star.png')}}" alt=" " class="img-responsive">
									</div>
									<div class="rating-left">
										<img src="{{url('pages/images/star.png')}}" alt=" " class="img-responsive">
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="review_grids">
						<h5>Add A Review</h5>
						<form action="#" method="post">
							<input type="text" name="Name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
							<input type="email" name="Email" placeholder="Email" required="">
							<input type="text" name="Telephone" value="Telephone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
							<textarea name="Review" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Add Your Review';}" required="">Add Your Review</textarea>
							<input type="submit" value="Submit" >
						</form>
					</div>
				</div> 			        					            	      
			</div>	
		</div>
		<script src="{{url('pages/js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('#horizontalTab1').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion           
					width: 'auto', //auto or any width like 600px
					fit: true   // 100% fit in a container
				});
			});
		</script>
	</div>
</div>
<!-- Related Products -->
<div class="w3l_related_products">
	<div class="container">
		<h3 style="font-family: 'Tangerine', serif;font-weight: bold;">Cùng danh mục</h3>
		<ul id="flexiselDemo2">	
			@foreach($product_cats as $product_cats_item)
			<?php
				$img = DB::table('product_images')->where('product_id',$product_cats_item->id)->get(); 
				$product_detail =DB::table('product_details')->select('id','description','unit_price','promotion_price','product_id')->where('product_id',$product_cats_item->id)->first();
			 ?>		
			<li>
				<div class="w3l_related_products_grid">
					<div class="agile_ecommerce_tab_left mobiles_grid">
						<div class="hs-wrapper hs-wrapper3">
							<img style="width: 100%;height: 100%;margin:0 auto;display: block;" src="{!! asset('resources/upload/'.$product_cats_item->image) !!}" alt=" " class="img-responsive" />
							@foreach($img as $img_item)
							<img style="width: 100%;height: 100%;margin:0 auto;display: block;" src="{!! asset('resources/upload/detail/'.$img_item->image) !!}" alt=" " class="img-responsive" />
							@endforeach
							<div class="w3_hs_bottom">
								<div class="flex_ecommerce">
									<a href="#" data-toggle="modal" data-target="#myModal6"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
								</div>
							</div>
						</div>
						<h5 style="font-size: 14px;"><a href="#">{{ $product_cats_item->name }}</a></h5>
						<div class="simpleCart_shelfItem"> 
							@if($product_detail->promotion_price !=0 && $product_detail->promotion_price <= $product_detail->unit_price)
								<p class="flexisel_ecommerce_cart"><span>{{ number_format($product_detail->unit_price,0,',','.' )}}</span> <i class="item_price">{{ number_format($product_detail->promotion_price,0,',','.' )}}</i> VND</p>
							@else 
								<p class="flexisel_ecommerce_cart"><i class="item_price">{{ number_format($product_detail->unit_price,0,',','.' )}}</i> VND</p>
							@endif
							<form action="#" method="post">
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="add" value="1"> 
								<input type="hidden" name="w3ls_item" value="Kid's Toy"> 
								<input type="hidden" name="amount" value="100.00">   
								<div class="col-md-1"></div> 
								<div class="col-md-3" >
									<button type="submit" class="w3ls-cart" ><span class="label label-warning"><i class="fa fa-shopping-cart " aria-hidden="true"></i></span></button>
								</div>
								<div class="col-md-1"></div>
								<div class="col-md-6">
									<a class="beta-btn primary" href="{{url('chi-tiet-san-pham',[$product_cats_item->id,$product_cats_item->alias])}}" style="display: block; border: blue solid 1px;height: 35px;line-height: 35px;border-radius: 5px;"><span><i class="fa fa-chevron-right"></i>Chi tiết</span></a>
								</div>
							</form> 
						</div>
					</div>
				</div>
			</li>
			@endforeach
		</ul>
		
			<script type="text/javascript">
				$(window).load(function() {
					$("#flexiselDemo2").flexisel({
						visibleItems:4,
						animationSpeed: 1000,
						autoPlay: true,
						autoPlaySpeed: 3000,    		
						pauseOnHover: true,
						enableResponsiveBreakpoints: true,
						responsiveBreakpoints: { 
							portrait: { 
								changePoint:480,
								visibleItems: 1
							}, 
							landscape: { 
								changePoint:640,
								visibleItems:2
							},
							tablet: { 
								changePoint:768,
								visibleItems: 3
							}
						}
					});
					
				});
			</script>
			<script type="text/javascript" src="{{url('pages/js/jquery.flexisel.js')}}"></script>
	</div>
</div>
<!-- //Related Products -->
<div class="modal video-modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModal6">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
			</div>
			<section>
				<div class="modal-body">
					<div class="col-md-5 modal_body_left">
						<img src="images/34.jpg" alt=" " class="img-responsive" />
					</div>
					<div class="col-md-7 modal_body_right">
						<h4>Musical Kids Toy</h4>
						<p>Ut enim ad minim veniam, quis nostrud 
							exercitation ullamco laboris nisi ut aliquip ex ea 
							commodo consequat.Duis aute irure dolor in 
							reprehenderit in voluptate velit esse cillum dolore 
							eu fugiat nulla pariatur. Excepteur sint occaecat 
							cupidatat non proident, sunt in culpa qui officia 
							deserunt mollit anim id est laborum.</p>
						<div class="rating">
							<div class="rating-left">
								<img src="{{url('pages/images/star-.png')}}" alt=" " class="img-responsive" />
							</div>
							<div class="rating-left">
								<img src="{{url('pages/images/star-.png')}}" alt=" " class="img-responsive" />
							</div>
							<div class="rating-left">
								<img src="{{url('pages/images/star-.png')}}" alt=" " class="img-responsive" />
							</div>
							<div class="rating-left">
								<img src="{{url('pages/images/star.png')}}" alt=" " class="img-responsive" />
							</div>
							<div class="rating-left">
								<img src="{{url('pages/images/star.png')}}" alt=" " class="img-responsive" />
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="modal_body_right_cart simpleCart_shelfItem">
							<p><span>$150</span> <i class="item_price">$100</i></p> 
							<form action="#" method="post">
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="add" value="1"> 
								<input type="hidden" name="w3ls_item" value="Kids Toy"> 
								<input type="hidden" name="amount" value="100.00">   
								<button type="submit" class="w3ls-cart">Add to cart</button>
							</form>
						</div>
						<h5>Color</h5>
						<div class="color-quality">
							<ul>
								<li><a href="#"><span></span></a></li>
								<li><a href="#" class="brown"><span></span></a></li>
								<li><a href="#" class="purple"><span></span></a></li>
								<li><a href="#" class="gray"><span></span></a></li>
							</ul>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</section>
		</div>
	</div>
</div>
<div class="modal video-modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModal5">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>						
			</div>
			<section>
				<div class="modal-body">
					<div class="col-md-5 modal_body_left">
						<img src="images/36.jpg" alt=" " class="img-responsive">
					</div>
					<div class="col-md-7 modal_body_right">
						<h4>Dry Vacuum Cleaner</h4>
						<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea 
							commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat 
							cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<div class="rating">
							<div class="rating-left">
								<img src="{{url('pages/images/star-.png')}}" alt=" " class="img-responsive">
							</div>
							<div class="rating-left">
								<img src="{{url('pages/images/star-.png')}}" alt=" " class="img-responsive">
							</div>
							<div class="rating-left">
								<img src="{{url('pages/images/star-.png')}}" alt=" " class="img-responsive">
							</div>
							<div class="rating-left">
								<img src="{{url('pages/images/star.png')}}" alt=" " class="img-responsive">
							</div>
							<div class="rating-left">
								<img src="{{url('pages/images/star.png')}}" alt=" " class="img-responsive">
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="modal_body_right_cart simpleCart_shelfItem">
							<p><span>$960</span> <i class="item_price">$920</i></p>
							<form action="#" method="post">
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="add" value="1"> 
								<input type="hidden" name="w3ls_item" value="Vacuum Cleaner"> 
								<input type="hidden" name="amount" value="920.00">   
								<button type="submit" class="w3ls-cart">Add to cart</button>
							</form>
						</div>
						<h5>Color</h5>
						<div class="color-quality">
							<ul>
								<li><a href="#"><span></span></a></li>
								<li><a href="#" class="brown"><span></span></a></li>
								<li><a href="#" class="purple"><span></span></a></li>
								<li><a href="#" class="gray"><span></span></a></li>
							</ul>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</section>
		</div>
	</div>
</div>
<div class="modal video-modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModal4">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
			</div>
			<section>
				<div class="modal-body">
					<div class="col-md-5 modal_body_left">
						<img src="images/p3.jpg" alt=" " class="img-responsive" />
					</div>
					<div class="col-md-7 modal_body_right">
						<h4>Music MP3 Player </h4>
						<p>Ut enim ad minim veniam, quis nostrud 
							exercitation ullamco laboris nisi ut aliquip ex ea 
							commodo consequat.Duis aute irure dolor in 
							reprehenderit in voluptate velit esse cillum dolore 
							eu fugiat nulla pariatur. Excepteur sint occaecat 
							cupidatat non proident, sunt in culpa qui officia 
							deserunt mollit anim id est laborum.</p>
						<div class="rating">
							<div class="rating-left">
								<img src="{{url('pages/images/star-.png')}}" alt=" " class="img-responsive" />
							</div>
							<div class="rating-left">
								<img src="{{url('pages/images/star-.png')}}" alt=" " class="img-responsive" />
							</div>
							<div class="rating-left">
								<img src="{{url('pages/images/star-.png')}}" alt=" " class="img-responsive" />
							</div>
							<div class="rating-left">
								<img src="{{url('pages/images/star-.png')}}" alt=" " class="img-responsive" />
							</div>
							<div class="rating-left">
								<img src="{{url('pages/images/star.png')}}" alt=" " class="img-responsive" />
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="modal_body_right_cart simpleCart_shelfItem">
							<p><span>$60</span> <i class="item_price">$58</i></p>
							<form action="#" method="post">
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="add" value="1" /> 
								<input type="hidden" name="w3ls_item" value="MP3 Player" /> 
								<input type="hidden" name="amount" value=" $58.00"/>   
								<button type="submit" class="w3ls-cart">Add to cart</button>
							</form>
						</div>
						<h5>Color</h5>
						<div class="color-quality">
							<ul>
								<li><a href="#"><span></span></a></li>
								<li><a href="#" class="brown"><span></span></a></li>
								<li><a href="#" class="purple"><span></span></a></li>
								<li><a href="#" class="gray"><span></span></a></li>
							</ul>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</section>
		</div>
	</div>
</div>
<div class="modal video-modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModal3">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>						
			</div>
			<section>
				<div class="modal-body">
					<div class="col-md-5 modal_body_left">
						<img src="images/38.jpg" alt=" " class="img-responsive">
					</div>
					<div class="col-md-7 modal_body_right">
						<h4>Kitchen &amp; Dining Accessories</h4>
						<p>Ut enim ad minim veniam, quis nostrud 
							exercitation ullamco laboris nisi ut aliquip ex ea 
							commodo consequat.Duis aute irure dolor in 
							reprehenderit in voluptate velit esse cillum dolore 
							eu fugiat nulla pariatur. Excepteur sint occaecat 
							cupidatat non proident, sunt in culpa qui officia 
							deserunt mollit anim id est laborum.</p>
						<div class="rating">
							<div class="rating-left">
								<img src="{{url('pages/images/star-.png')}}" alt=" " class="img-responsive">
							</div>
							<div class="rating-left">
								<img src="{{url('pages/images/star-.png')}}" alt=" " class="img-responsive">
							</div>
							<div class="rating-left">
								<img src="{{url('pages/images/star-.png')}}" alt=" " class="img-responsive">
							</div>
							<div class="rating-left">
								<img src="{{url('pages/images/star-.png')}}" alt=" " class="img-responsive">
							</div>
							<div class="rating-left">
								<img src="{{url('pages/images/star.png')}}" alt=" " class="img-responsive">
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="modal_body_right_cart simpleCart_shelfItem">
							<p><span>$650</span> <i class="item_price">$645</i></p>
							<form action="#" method="post">
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="add" value="1"> 
								<input type="hidden" name="w3ls_item" value="Microwave Oven"> 
								<input type="hidden" name="amount" value="645.00">   
								<button type="submit" class="w3ls-cart">Add to cart</button>
							</form>
						</div>
						<h5>Color</h5>
						<div class="color-quality">
							<ul>
								<li><a href="#"><span></span></a></li>
								<li><a href="#" class="brown"><span></span></a></li>
								<li><a href="#" class="purple"><span></span></a></li>
								<li><a href="#" class="gray"><span></span></a></li>
							</ul>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</section>
		</div>
	</div>
</div>  
<!-- //single -->
@endsection