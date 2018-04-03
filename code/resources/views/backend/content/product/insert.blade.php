@extends("backend.layouts.default")
@section("myJs")
	<script src="{{ url('') }}/bower_components/ckeditor/ckeditor.js"></script>
	<script>
	  $(function () {
	    CKEDITOR.replace('description');
	    CKEDITOR.replace('promotion');

	  })
	</script>
@endsection
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
				print_r($errors);
			}
		?>
	  	<section class="content">
		    <div class="row">
	         	<div class="col-md-12">
		         	<div class="box box-info">
			            <div class="box-header with-border">
			              <h3 class="text-center">Thêm mới sản phẩm</h3>
			            </div>
			            <form class="form-horizontal" method="POST" action="{{ route('products.store') }}"
			            enctype="multipart/form-data">
			            	@csrf
			              	<div class="box-body">
				      			<div class="form-group">
				      			  	<label for="name" class="col-sm-2 control-label">Tên sản phẩm</label>
				      			  	<div class="col-sm-10">
				      			    	<input type="text" name="name" class="form-control" id="name" placeholder="Tên sản phẩm">
				      			    	@if (array_has($errors, "name")) 
				      			    	<div class="alert-danger" style="margin-top: 10px; padding-left: 10px;">
								      		{{ $errors["name"][0] }}
								      	</div>
				      					@endif
				      			 	</div>
				      			</div>
				      			<div class="form-group">
				      			  	<label for="code_product" class="col-sm-2 control-label">Mã sản phẩm</label>
				      			  	<div class="col-sm-10">
				      			    	<input type="text" name="code_product" class="form-control" id="code_product" placeholder="Mã sản phẩm">
				      			    	@if (array_has($errors, "code_product")) 
				      			    	<div class="alert-danger" style="margin-top: 10px; padding-left: 10px;">
								      		{{ $errors["code_product"][0] }}
								      	</div>
				      					@endif
				      			 	</div>
				      			</div>
				      			<div class="form-group">
				      			  	<label for="cate_id" class="col-sm-2 control-label">Loại sản phẩm</label>
				      			  	<div class="col-sm-10">
					      			  	<select class="form-control" id="cate_id" name="cate_id">
	      			  	                    {{ showCategories($categories, 0, "--") }}
	                          			    	@if (array_has($errors, "parent_id")) 
	                          			    	<div class="alert-danger" style="margin-top: 10px; padding-left: 10px;">
	                    				      		{{ $errors["parent_id"][0] }}
	                    				      	</div>
	                          					@endif
	      			  	                </select>
	      			  	            </div>
				      			</div>
				      			<div class="form-group">
				      			  	<label for="price" class="col-sm-2 control-label">Giá sản phẩm</label>
				      			  	<div class="col-sm-10">
				      			    	<input type="text" name="price" class="form-control" id="price" placeholder="Giá sản phẩm">
				      			    	@if (array_has($errors, "price")) 
				      			    	<div class="alert-danger" style="margin-top: 10px; padding-left: 10px;">
								      		{{ $errors["price"][0] }}
								      	</div>
				      					@endif
				      			 	</div>
				      			</div>
				      			<div class="form-group">
				      			  	<label for="made_in" class="col-sm-2 control-label">Xuất xứ</label>
				      			  	<div class="col-sm-10">
				      			    	<input type="text" name="made_in" class="form-control" id="made_in" placeholder="Xuất xứ sản phẩm">
				      			 	</div>
				      			</div>
				      			<div class="form-group">
				      			  	<label for="tag" class="col-sm-2 control-label">Thẻ</label>
				      			  	<div class="col-sm-10">
				      			    	<input type="text" name="tag" class="form-control" id="tag" placeholder="Thẻ gắn">
				      			 	</div>
				      			</div>
				      			<div class="form-group">
				      			  	<label for="description" class="col-sm-2 control-label">Mô tả sản phẩm</label>
				      			  	<div class="col-sm-10">
				      			    	<textarea id="description" name="description" rows="10" style="width: 100%; height: 100%;">
				      			    	</textarea>
				      			    	@if (array_has($errors, "description")) 
					      			    	<div class="alert-danger" style="margin-top: 10px; padding-left: 10px;">
									      		{{ $errors["description"][0] }}
									      	</div>
				      					@endif
				      			 	</div>
				      			</div>
				      			<div class="form-group">
				      			  	<label for="promotion" class="col-sm-2 control-label">Mô tả khuyến mãi</label>
				      			  	<div class="col-sm-10">
				      			    	<textarea id="promotion" name="promotion" rows="10" style="width: 100%; height: 100%;">
				      			    	</textarea>
				      			    	@if (array_has($errors, "promotion")) 
					      			    	<div class="alert-danger" style="margin-top: 10px; padding-left: 10px;">
									      		{{ $errors["promotion"][0] }}
									      	</div>
				      					@endif
				      			 	</div>
				      			</div>
				      			<div class="form-group">
				                  	<label class="col-sm-2 control-label" for="exampleInputFile">Ảnh đại diện</label>
				                  	<div class="col-sm-10">
				                  		<input class="form-control" type="file" id="exampleInputFile" name="image_url">
				                  		@if (array_has($errors, "avatar")) 
				      			    	<div class="alert-danger" style="margin-top: 10px; padding-left: 10px;">
								      		{{ $errors["avatar"][0] }}
								      	</div>
				      					@endif
				                  	</div>
				                </div>

				                <div class="form-group">
				      				<label for="address" class="col-sm-2 control-label">Trạng thái sản phẩm</label>
	      			                <div class="radio col-md-10">
	      			                    <label>
	      			                      <input type="radio" name="status" value="0" checked> Còn hàng
	      			                    </label>
	      			                    <label style="margin-left: 25px; ">
	      			                      <input type="radio" name="status" value="1" > Hết hàng
	      			                    </label>
	      			                    @if (array_has($errors, "status")) 
					      			    	<div class="alert-danger" style="margin-top: 10px; padding-left: 10px;">
									      		{{ $errors["status"][0] }}
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