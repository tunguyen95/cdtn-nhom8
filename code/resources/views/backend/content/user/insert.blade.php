@extends("backend.layouts.default")
@section("content")
	<div class="content-wrapper">
		<section class="content-header">
		    <h1>
		      Người dùng
		      <small>Thêm mới</small>
		    </h1>
		    <ol class="breadcrumb">
		      <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
		      <li class="active">Người dùng</li>
		    </ol>
		</section>
		<?php 
			if (count($errors) >= 1) {
				$errors = $errors->toArray();
			}
		?>
	  	<section class="content">
		    <div class="row">
	         	<div class="col-md-12">
		         	<div class="box box-info">
			            <div class="box-header with-border">
			              <h3 class="text-center">Thêm mới người dùng</h3>
			            </div>
			            <form class="form-horizontal" method="POST" action="{{ route('users.store') }}"
			            enctype="multipart/form-data">
			            	@csrf
			              	<div class="box-body">
				      			<div class="form-group">
				      			  	<label for="name" class="col-sm-2 control-label">Tên</label>
				      			  	<div class="col-sm-10">
				      			    	<input type="text" name="name" class="form-control" id="name" placeholder="Tên người dùng">
				      			    	@if (array_has($errors, "name")) 
				      			    	<div class="alert-danger" style="margin-top: 10px; padding-left: 10px;">
								      		{{ $errors["name"][0] }}
								      	</div>
				      					@endif
				      			 	</div>
				      			</div>
				      			<div class="form-group">
				      			  	<label for="email" class="col-sm-2 control-label">Email</label>
				      			  	<div class="col-sm-10">
				      			    	<input type="text" name="email" class="form-control" id="email" placeholder="Địa chỉ email">
				      			    	@if (array_has($errors, "email")) 
				      			    	<div class="alert-danger" style="margin-top: 10px; padding-left: 10px;">
								      		{{ $errors["email"][0] }}
								      	</div>
				      					@endif
				      			 	</div>
				      			</div>
				      			<div class="form-group">
				      			  	<label for="phone" class="col-sm-2 control-label">Điện thoại</label>
				      			  	<div class="col-sm-10">
				      			    	<input type="text" name="phone" class="form-control" id="phone" placeholder="Số diện thoại">
				      			    	@if (array_has($errors, "phone")) 
				      			    	<div class="alert-danger" style="margin-top: 10px; padding-left: 10px;">
								      		{{ $errors["phone"][0] }}
								      	</div>
				      					@endif
				      			 	</div>
				      			</div>
				      			<div class="form-group">
				      			  	<label for="address" class="col-sm-2 control-label">Địa chỉ</label>
				      			  	<div class="col-sm-10">
				      			    	<input type="text" name="address" class="form-control" id="address" placeholder="Địa chỉ">
				      			    	@if (array_has($errors, "address")) 
				      			    	<div class="alert-danger" style="margin-top: 10px; padding-left: 10px;">
								      		{{ $errors["address"][0] }}
								      	</div>
				      					@endif
				      			 	</div>
				      			</div>
				      			<div class="form-group">
				                  	<label class="col-sm-2 control-label" for="exampleInputFile">Ảnh đại diện</label>
				                  	<div class="col-sm-10">
				                  		<input class="form-control" type="file" id="exampleInputFile" name="avatar">
				                  		@if (array_has($errors, "avatar")) 
				      			    	<div class="alert-danger" style="margin-top: 10px; padding-left: 10px;">
								      		{{ $errors["avatar"][0] }}
								      	</div>
				      					@endif
				                  	</div>
				                </div>

			              	</div>
				            <div class="box-footer text-center">
				                <button type="submit" class="btn btn-primary">Cập nhật</button>
				            </div>
			            </form>
			        </div>
	        	</div>
		    </div>
	    </section>
	</div>
@endsection()