<div class="new-products">
	<div class="container">
		@php
			$products = App\Models\ProductModel::newProduct();
		@endphp
		<h3 style="font-family: 'Tangerine', serif;font-weight: bold;">Sản phẩm mới</h3>
		<div class="agileinfo_new_products_grids">
			@foreach ($products as $key => $product )
				<div class="col-md-3">
					<div class="agile_ecommerce_tab_left">
						<div id="{{ $product->id }}" class="hs-wrapper1" style="position: relative; margin: 0 auto;overflow: hidden;">
							<img id="{{ $product->id }}" style="width: 100%;height: 100%;margin: 0 auto;display: block;"
							src="{{ url('images/products', $product->image_url) }}" alt="" class="img-responsive" />
								<div class="w3_hs_bottom w3_hs_bottom_sub">
									<ul>
										<li>
											<a href="#" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
										</li>
										<li>
											<a href="{{ url('product', $product->id) }}"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
										</li>
										<li>
											<a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
										</li>
									</ul>
								</div>
								<div class="modal video-modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
											</div>
											<section>
												<div class="modal-body">
													<div class="col-md-4 modal_body_left">
														<img " src="" alt="" class="img-responsive" />
													</div>
													<div class="col-md-8 modal_body_right">
														<h4></h4>
														<p></p>
														<div class="rating">
															<div class="rating-left">
																<img src="" alt=" " class="img-responsive" />
															</div>
															<div class="clearfix"> </div>
														</div>
														<div class="modal_body_right_cart simpleCart_shelfItem">
																<p><span ></span> <i class="item_price">{{ $product->price }} VND</i></p>
															<form action="#" method="post">
																<input type="hidden" name="_token" value="{!! csrf_token() !!}">
																<input type="hidden" name="cmd" value="_cart">
																<input type="hidden" name="add" value="1"> 
																<input type="hidden" name="w3ls_item" value=""> 
																<input type="hidden" name="amount" >    
																<button type="submit" class="w3ls-cart">Thêm vào giỏ</button>
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
								<div class="clearfix"> </div>
						</div>
						<hr>
						<h2 style="text-align: center;font-size: 18px; font-family: 'Tangerine', serif;font-weight: bold;"><a href="single.html"></a></h2>
						<div class="simpleCart_shelfItem" style="margin-top: -10px;">
								<p><span ></span> <i class="item_price"> {{ number_format($product->price, 0,',', '.') }} VND</i></p>
							<form action="#" method="post">
								<input type="hidden" name="_token" value="{!! csrf_token() !!}">
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="add" value="1"> 
								<input type="hidden" name="w3ls_item" value=""> 
								<input type="hidden" name="amount" >  
								<div class="col-md-1"></div> 
								<div class="col-md-3" >
									<button type="submit" class="w3ls-cart" ><span class="label label-warning"><i class="fa fa-shopping-cart " aria-hidden="true"></i></span></button>
								</div>
								<div class="col-md-1"></div> 
								<div class="col-md-6">
									<a class="beta-btn primary" href="" style="display: block; border: blue solid 1px;height: 35px;line-height: 35px;border-radius: 5px;"><span ><i class="fa fa-chevron-right" ></i>Chi tiết</span></a>
								</div>
								<div class="row" style="margin-bottom: 5px;"></div>
								<hr>
							</form>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			@endforeach
		</div>
	</div>
	<div class="col-md-9"></div>
	<div class="col-md-3">
	</div>
</div>