@extends("backend.layouts.default")
@section("content")
	<div class="content-wrapper">
		<section class="content-header">
		    <h1>
		     Loại sản phẩm
		      <small>Cập nhật</small>
		    </h1>
		    <ol class="breadcrumb">
		      <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
		      <li class="active">Cập nhật</li>
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
			              <h3 class="text-center">Cập nhật loại sản phẩm</h3>
			            </div>
			            <form class="form-horizontal" method="POST" action="{{ route('categories.update', $category->id) }}"
			            enctype="multipart/form-data">
			            	@csrf
			            	@method("PUT")
			              	<div class="box-body">
				      			<div class="form-group">
				      			  	<label for="name" class="col-sm-2 control-label">Tên loại sản phẩm</label>
				      			  	<div class="col-sm-10">
				      			    	<input type="text" name="name" class="form-control" id="name" placeholder="Tên loại sản phẩm" value="{{ $category->name }}">
				      			    	@if (array_has($errors, "name")) 
				      			    	<div class="alert-danger" style="margin-top: 10px; padding-left: 10px;">
								      		{{ $errors["name"][0] }}
								      	</div>
				      					@endif
				      			 	</div>
				      			</div>
				      			<div class="form-group">
				      			  	<label for="parent_cate" class="col-sm-2 control-label">Loại sản phẩm cha</label>
				      			  	<div class="col-sm-10">
					      			  	<select class="form-control" id="parent_cate" name="parent_id">
	      			  	                    <option value="0">Loại sản phẩm cha</option>
	      			  	                     {{ showCategoriesUpdate($categories, 0, "--", $category->parent_id, $category->id) }}
	      			  	                  </select>
	      			  	                  @if (array_has($errors, "parent_id")) 
				      			    	<div class="alert-danger" style="margin-top: 10px; padding-left: 10px;">
								      		{{ $errors["parent_id"][0] }}
								      	</div>
				      					@endif
	      			  	            </div>
				      			</div>
				      			<div class="form-group">
				      			  	<label for="address" class="col-sm-2 control-label">Thẻ tag</label>
				      			  	<div class="col-sm-10">
				      			    	<input type="text" name="tag" value="{{ $category->tag }}" class="form-control" id="address" placeholder="tag1, tag2">
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