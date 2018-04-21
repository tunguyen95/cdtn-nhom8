@extends("backend.layouts.default")
@section("myJs")
	<script src="{{ url('') }}/bower_components/ckeditor/ckeditor.js"></script>
	<script>
	  $(function () {
	    CKEDITOR.replace('content');
	    CKEDITOR.replace('description');

	  })
	</script>
@endsection
@section("content")
	<div class="content-wrapper">
		<?php 
			if (count($errors) >= 1) 
			{
					$er = array();
				foreach ($errors->all() as  $value)
				{
					$er[] = $value;
					echo $value;
				}
			}
		?>
		<section class="content-header">
		    <h1>
		     Bài tin
		      <small>Cập nhật</small>
		    </h1>
		    <ol class="breadcrumb">
		      <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
		      <li class="active">Bài tin</li>
		    </ol>
		</section>
	  	<section class="content">
		    <div class="row">
	         	<div class="col-md-12">
		         	<div class="box box-info">
			            <div class="box-header with-border">
			              <h3 class="text-center">Cập nhật bài tin</h3>
			            </div>
			            <form class="form-horizontal" method="POST" action="{{ route('articles.update', $article->id) }}"
			            enctype="multipart/form-data">
			            	@csrf
			            	@method ("PUT")
			              	<div class="box-body">
				      			<div class="form-group">
				      			  	<label for="title" class="col-sm-2 control-label">Tiêu đề</label>
				      			  	<div class="col-sm-10">
				      			    	<input type="text" name="title" class="form-control" id="title" placeholder="Tên loại sản phẩm" value="{{ $article->title }}">
				      			 	</div>
				      			</div>
				      			<div class="form-group">
				      			  	<label for="address" class="col-sm-2 control-label">Trích dẫn</label>
				      			  	<div class="col-sm-10">
				      			    	<textarea id="description" name="description" rows="10" style="width: 100%; height: 100%;">
				      			    		{{ $article->description }}
				      			    	</textarea>
				      			 	</div>
				      			</div>

				      			<div class="form-group">
				      			  	<label for="address" class="col-sm-2 control-label">Nội dung</label>
				      			  	<div class="col-sm-10">
				      			    	<textarea id="content" name="content" rows="10" style="width: 100%; height: 100%;">
				      			    		{{ $article->content }}
				      			    	</textarea>
				      			 	</div>
				      			</div>

				      			<div class="form-group">
				                  	<label class="col-sm-2 control-label" for="exampleInputFile">Ảnh đại diện</label>
				                  	<div class="col-sm-10">
				                  		<input class="form-control" type="file" id="exampleInputFile" name="image">
				                  	</div>
				                </div>

				      			<div class="form-group">
				      			  	<label for="address" class="col-sm-2 control-label">Thẻ tag</label>
				      			  	<div class="col-sm-10">
				      			    	<input type="text" name="tag" class="form-control" id="address" placeholder="tag1, tag2" value="{{ $article->tag }}">
				      			 	</div>
				      			</div>

				      			<div class="form-group">
				      				<label for="address" class="col-sm-2 control-label">Đăng bài viết</label>
	      			                <div class="radio col-md-9">
	      			                    <label>
	      			                      <input type="radio" name="status" value="1" @if( $article->status == "1" ) {{ "checked" }} @endif> Đăng
	      			                    </label>
	      			                    <label style="margin-left: 25px; ">
	      			                      <input  @if( $article->status == "0" ) {{ "checked" }} @endif type="radio" name="status" value="0" checked=""> Chờ đăng
	      			                    </label>
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