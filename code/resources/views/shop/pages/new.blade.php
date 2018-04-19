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
								  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span><i style="font-size: 16px;" class="glyphicon glyphicon-minus" aria-hidden="true"></i>Danh mục sản phẩm
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
						<h2>Tin tức</h2>
					</div>
					<div class="clearfix"> </div>
					<div id="response"></div>
				</div>
				<div class="col-md-12">

				@foreach($news as $key => $new)
					<a href="{{ url('article', $new->slug) }}">
						<div class="col-sm-6 col-md-6">
						    <div class="thumbnail">
						      	<img style="height: 250px;" src="{{ url('images/articles', $new->image_url) }}" alt="...">
						      	<div class="caption">
						       		<h3>{{ $new->title }}</h3>
						        	<p>{!! $new->description !!}</p>
						      	</div>
						    </div>
						</div>
					</a>
				@endforeach
				</div>
			</div>
			<div class="clearfix"> </div>

		</div>
	</div>
</div>   
@endsection