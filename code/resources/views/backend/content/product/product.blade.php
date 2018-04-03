@extends("backend.layouts.default")
@section("content")
	<div class="content-wrapper">
		<section class="content-header">
		    <h1>
		      Sản phẩm
		      <small>Danh sách</small>
		    </h1>
		    <ol class="breadcrumb">
		      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		      <li class="active">Sản phẩm</li>
		    </ol>
		</section>
	  	<section class="content">
		    <div class="row">
	         	<div class="col-md-12">
	         		<div class="box">
		            <!-- /.box-header -->
		            <div class="box-body">
		            	<div class="box-header with-border pull-right">
			              	<a href="{{ route('products.create') }}" class="btn btn-info">
			              		Thêm mới sản phẩm
			              	</a>
			            </div>
		              	<table class="table table-bordered">
			                <thead>
			                	<tr>
				                    <th style="width: 15px">MSP</th>
				                    <th>Tên sản phẩm</th>
				                    <th>Ảnh đại diện</th>
				                    <th>Loại sản phẩm</th>
				                    <th style="width: 100px">Giá</th>
				                    <th style="width: 100px">Nơi sản xuất</th>
				                    <th style="width: 100px">Thẻ gắn</th>
				                    <th style="width: 100px">Trạng thái</th>
				                    <th style="width: 100px">Thao tác</th>
			               		</tr>
			                </thead>
			                <tbody>
			                	@if (isset($products))
				                	@foreach ($products as $key => $product)
					                	<tr>
						                    <td>{!! $product->code_product !!}</td>
						                    <td>{!! $product->name !!}</td>
						                    <td>
						                    	<img src="{{ url('images/products') }}/{!! $product->image_url !!}" alt="" style="width: 100px; height: 100px;">
						                    </td>
						                    <td>{!! $product->cate_name !!}</td>
						                    <td>{!! $product->price !!}</td>
						                    <td>{!! $product->made_in !!}</td>
						                    <td>{!! $product->tag !!}</td>
						                    <td>@if ($product->status == 0) {{ "Còn hàng" }} @endif
	                    						@if ($product->status == 1) {{ "Hết hàng" }} @endif
	                                        </td>
						                    <td>
						                    	<form action="{{ route('products.destroy', $product->id) }}" method="POST">
						                    		<a href="{{ route('products.edit', $product->id ) }}" class="btn-info btn"><i class="fa fa-edit"></i></a>
						                    		<a href="{{ route('products.show', $product->id ) }}" class="btn-info btn"><i class="fa fa-clipboard"></i></a>
						                    		@method("DELETE")
						                    		@csrf
						                    	    <button  class="btn-danger btn" type="submit" onclick="confirm('Bạn muốn xóa sản phẩm này?')" ><i class="fa fa-trash"></i></button></a>
						                    	</form>
						                    	
						                    </td>
					               		</tr>
				                	@endforeach
				               	@endif
			              	</tbody>
		          		</table>
		            </div>
		            <!-- /.box-body -->
		            {{ $products->links() }}
	          	</div>
	         	</div>
	          	<!-- /.box -->
		    </div>
	    </section>
	</div>
@endsection()