@extends("backend.layouts.default")
@section("content")
	<div class="content-wrapper">
		<section class="content-header">
		    <h1>
		     Sản phẩm
		      <small>Chi tiết sản phẩm</small>
		    </h1>
		    <ol class="breadcrumb">
		      <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
		      <li class="active">Sản phâme</li>
		    </ol>
		</section>
	  	<section class="content">
		    <div class="row">
	         	<div class="col-md-12">
		         	<div class="box box-info">
			            <div class="box-header with-border">
			              <h3 class="text-center">Chi tiết một sản phẩm</h3>
			            </div>
			         	<div class="box-body">
			              	<table class="table table-bordered">
				                <thead>
				                	<tr>
					                    <th style="width: 150px"></th>
					                    <th>Chi tiết</th>
				               		</tr>
				                </thead>
				                <tbody>
				                	<tr>
					                    <td>Mã sản phẩm</td>
					                    <td>{{ $product->name }}</td>
				               		</tr>
				               		<tr>
					                    <td>Tên sản phẩm</td>
					                    <td>{{ $product->name }}</td>
				               		</tr>
				               		<tr>
					                    <td>Loại sản phẩm</td>
					                    <td>{{ $product->name_cate }}</td>
				               		</tr>
				               		<tr>
					                    <td>Giá sản phẩm</td>
					                    <td>{!! $product->price !!}</td>
				               		</tr>
				               		<tr>
					                    <td>Sản xuất</td>
					                    <td>{!! $product->made_in !!}</td>
				               		</tr>
				               		<tr>
					                    <td>Mô tả</td>
					                    <td>{!! $product->description !!}</td>
				               		</tr>
				               		<tr>
					                    <td>Khuyến mãi</td>
					                    <td>{!! $product->promotion !!}</td>
				               		</tr>
				               		<tr>
					                    <td>Ảnh sản phẩm</td>
					                    <td><img src="{{ url('images/products') }}/{!! $product->image_url !!}" alt="" style="width: 300px; height: 300px;"></td>
				               		</tr>
				               		<tr>
					                    <td>Thẻ gắn</td>
					                    <td>{{ $product->tag }}</td>
				               		</tr>
				               		<tr>
					                    <td>Trạng thái</td>
					                    <td>@if ($product->status == 0) {{ "Còn hàng" }} @endif
											@if ($product->status == 1) {{ "Hết hàng" }} @endif
					                    </td>
				               		</tr>
				              	</tbody>
			          		</table>
		            	</div>
			        </div>
	        	</div>
		    </div>
	    </section>
	</div>
@endsection()