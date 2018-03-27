@extends("backend.layouts.default")
@section("content")
	<div class="content-wrapper">
		<section class="content-header">
		    <h1>
		     Loại sản phẩm
		      <small>Thêm mới</small>
		    </h1>
		    <ol class="breadcrumb">
		      <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
		      <li class="active">Loại sản phẩm</li>
		    </ol>
		</section>
	  	<section class="content">
		    <div class="row">
	         	<div class="col-md-12">
		         	<div class="box box-info">
			            <div class="box-header with-border">
			              <h3 class="text-center">Thêm mới người dùng</h3>
			            </div>
			            <form class="form-horizontal" method="POST" action="{{ route('categories.store') }}"
			            enctype="multipart/form-data">
			            	@csrf
			              	<div class="box-body">
				      			<div class="form-group">
				      			  	<label for="name" class="col-sm-2 control-label">Tên loại sản phẩm</label>
				      			  	<div class="col-sm-10">
				      			    	<input type="text" name="name" class="form-control" id="name" placeholder="Tên loại sản phẩm">
				      			 	</div>
				      			</div>
				      			<div class="form-group">
				      			  	<label for="parent_cate" class="col-sm-2 control-label">Loại sản phẩm cha</label>
				      			  	<div class="col-sm-10">
					      			  	<select class="form-control" id="parent_cate" name="parent_id">
	      			  	                    <option value="0">Loại sản phẩm cha</option>
	      			  	                    {{ showCategories($categories, 0, "--") }}
	      			  	                </select>
	      			  	            </div>
				      			</div>
				      			<div class="form-group">
				      			  	<label for="address" class="col-sm-2 control-label">Thẻ tag</label>
				      			  	<div class="col-sm-10">
				      			    	<input type="text" name="tag" class="form-control" id="address" placeholder="tag1, tag2">
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