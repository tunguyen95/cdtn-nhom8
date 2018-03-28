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
		<section class="content-header">
		    <h1>
		     Bài tin
		      <small>Chi tiết bài viết</small>
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
			              <h3 class="text-center">Chi tiết bài viết</h3>
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
					                    <td>Tiêu đề</td>
					                    <td>{{ $article->title }}</td>
				               		</tr>
				               		<tr>
					                    <td>Mô tả</td>
					                    <td>{!! $article->description !!}</td>
				               		</tr>
				               		<tr>
					                    <td>Nội dung</td>
					                    <td>{!! $article->content !!}</td>
				               		</tr>
				               		<tr>
					                    <td>Ảnh</td>
					                    <td><img src="{{ url('images/articles') }}/{!! $article->image_url !!}" alt="" style="width: 300px; height: 300px;"></td>
				               		</tr>
				               		<tr>
					                    <td>Người đăng</td>
					                    <td>{{ $article->users->name }}</td>
				               		</tr>
				               		<tr>
					                    <td>Thẻ gắn</td>
					                    <td>{{ $article->tag }}</td>
				               		</tr>
				               		<tr>
					                    <td>Trạng thái</td>
					                    <td>@if ($article->status == 0) {{ "Chờ đăng bài" }} @endif
											@if ($article->status == 1) {{ "Đã đăng bài" }} @endif
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