@extends("backend.layouts.default")
@section("content")
	<div class="content-wrapper">
		<section class="content-header">
		    <h1>
		      Người dùng
		      <small>Danh sách</small>
		    </h1>
		    <ol class="breadcrumb">
		      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		      <li class="active">Người dùng</li>
		    </ol>
		</section>
	  	<section class="content">
		    <div class="row">
	         	<div class="col-md-12">
	         		<div class="box">
		            <!-- /.box-header -->
		            <div class="box-body">
		            	<div class="box-header with-border pull-right">
			              	<a href="{{ route('users.create') }}" class="btn btn-info">
			              		Thêm mới người dùng
			              	</a>
			            </div>
		              	<table class="table table-bordered">
			                <thead>
			                	<tr>
				                    <th style="width: 15px">ID</th>
				                    <th>Tên người dùng</th>
				                    <th>Ảnh đại diện</th>
				                    <th>Email</th>
				                    <th>Địa chỉ</th>
				                    <th style="width: 100px">Số điện thoại</th>
				                    <th style="width: 100px">Thao tác</th>
			               		</tr>
			                </thead>
			                <tbody>
			                	@if (isset($users))
				                	@foreach ($users as $key => $user)
					                	<tr>
						                    <td>{!! $user->id !!}</td>
						                    <td>{!! $user->name !!}</td>
						                    <td>
						                    	<img src="{{ url('images/avatar') }}/{!! $user->avatar !!}" alt="" style="width: 100px; height: 100px;">
						                    </td>
						                    <td>{!! $user->email !!}</td>
						                    <td>{!! $user->address !!}</td>
						                    <td>{!! $user->phone !!}</td>
						                    <td>
						                    	<form action="{{ route('users.destroy', $user->id) }}" method="POST">
						                    		<a href="{{ route('users.edit', $user->id ) }}" class="btn-info btn"><i class="fa fa-edit"></i></a>
						                    		@method("DELETE")
						                    		@csrf
						                    	    <button  class="btn-danger btn" type="submit" onclick="return confirm('Bạn muốn xóa người dùng?')" ><i class="fa fa-trash"></i></button></a>
						                    	</form>
						                    	
						                    </td>
					               		</tr>
				                	@endforeach
				               	@endif
			              	</tbody>
		          		</table>
		            </div>
		            <!-- /.box-body -->
		            {{ $users->links() }}
	          	</div>
	         	</div>
	          	<!-- /.box -->
		    </div>
	    </section>
	</div>
@endsection()