@extends('shop.home')
@section('content')
<!-- breadcrumbs -->
<div class="breadcrumb_dress">
	<div class="container">
		<ul>
			<li><a href="{{ url('')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> TRang chủ</a> <i>/</i></li>
			<li>Sản phẩm</li>
		</ul>
	</div>
</div>
<!-- //breadcrumbs --> 
<!-- mobiles -->
<div class="mobiles">
	<div class="container">
		<div class="w3ls_mobiles_grids">
			<div class="col-md-4 w3ls_mobiles_grid_left">
				<div class="w3ls_mobiles_grid_left_grid">
					<div class="w3ls_mobiles_grid_left_grid_sub" style="margin-top: 109px;">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						  <div >
							<div class="panel-heading" role="tab" id="headingOne">
							  <h4 class="panel-title asd">
								<a style="font-size: 16px;" class="pa_italic" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i style="font-size: 16px;" class="glyphicon glyphicon-minus" aria-hidden="true"></i>Danh mục
								</a>
							  </h4>
							</div>
							<div class="panel-body panel_text">
							<ul>
								@php
									$categoris = App\Models\CategoryModel::getCategories_lv1();
								@endphp
								@foreach ($categoris as $key => $category)
									<li>
										@php
											$getCategories_lv = App\Models\CategoryModel::getCategories_lvCon($category->id);
										@endphp
										<a href="{{ url('categories', $category->slug) }}"> {{ $category->name }}
										@foreach ($getCategories_lv as $key => $category_lv)
										<ul >
											<li><a href="{{ url('categories', $category_lv->slug) }}">
												{{ $category_lv->name }}
											</a>
										</ul>
										@endforeach
									</li>
								@endforeach
							
							</ul>
						  </div>
						  </div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8 w3ls_mobiles_grid_right">
				<div class="w3ls_mobiles_grid_right_grid2">
					<div class="w3ls_mobiles_grid_right_grid2_left">
						<h2>{{ $name_category }}</h2>
					</div>
					<div class="w3ls_mobiles_grid_right_grid2_right">
						<select name="select_item" class="select_item" >
							<option  selected="selected">Mặc định</option>
							<option id="vale" value="LowToHight">Theo giá: Thấp - Cao </option>
							<option value="HightToLow">Theo giá: Cao - thấp</option>
							<option value="HightView">Được xem nhiều</option>
							<option value="New">Mới nhất</option>
						</select>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					</div>
					<div class="clearfix"> </div>
					<div id="response"></div>
				</div>
				<div class="col-md-12">
					{{ $products }}
					@foreach($products as $key => $product)
					<div class="col-md-6">
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
											<a href=""><i class="fa fa-info-circle" aria-hidden="true"></i></a>
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
				{{ $products->links() }}
			</div>
			<div class="clearfix"> </div>

		</div>
	</div>
</div>   
@endsection