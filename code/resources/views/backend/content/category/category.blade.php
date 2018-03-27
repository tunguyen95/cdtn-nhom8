@extends("backend.layouts.default")
@section("content")
	<div class="content-wrapper">
		<section class="content-header">
		    <h1>
		      Loại sản phẩm
		      <small>Danh sách</small>
		    </h1>
		    <ol class="breadcrumb">
		      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		      <li class="active">Loại sản phẩm</li>
		    </ol>
		</section>
	  	<section class="content">
		    <div class="row">
	         	<div class="col-md-12">
	         		<div class="box">
		            <!-- /.box-header -->
		            <div class="box-body">
		            	<div class="box-header with-border pull-right">
			              	<a href="{{ route('categories.create') }}" class="btn btn-info">
			              		Thêm mới người dùng
			              	</a>
			            </div>
		              	<table class="table table-bordered">
			                <thead>
			                	<tr>
				                    <th style="width: 15px">ID</th>
				                    <th>Tên loại sản phẩm</th>
				                    <th>Loại sản phẩm cha</th>
				                    <th>Đường dẫn</th>
				                    <th style="width: 100px">Tag</th>
				                    <th style="width: 100px">Thao tác</th>
			               		</tr>
			                </thead>
			                <tbody>
			                	@if (isset($categories))
				                	@foreach ($categories as $key => $category)
					                	<tr>
						                    <td>{!! $category->id !!}</td>
						                    <td>{!! $category->name !!}</td>
						                    <td>{!! $category->name_parent !!}</td>
						                    <td>{!! $category->url_link !!}</td>
						                    <td>{!! $category->tag !!}</td>
						                    <td>
						                    	<form action="{{ route('categories.destroy', $category->id) }}" method="POST">
						                    		<a href="{{ route('categories.edit', $category->id ) }}" class="btn-info btn"><i class="fa fa-edit"></i></a>
						                    		@method("DELETE")
						                    		@csrf
						                    	    <button  class="btn-danger btn" type="submit" onclick="confirm('Bạn muốn xóa người dùng?')" ><i class="fa fa-trash"></i></button></a>
						                    	</form>
						                    	
						                    </td>
					               		</tr>
				                	@endforeach
				               	@endif
			              	</tbody>
		          		</table>
		            </div>
		            <!-- /.box-body -->
		            {{ $categories->links() }}
	          	</div>
	         	</div>
	          	<!-- /.box -->
		    </div>
	    </section>
	</div>
@endsection()