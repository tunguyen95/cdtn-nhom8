@extends("backend.layouts.default")
@section("content")
	<div class="content-wrapper">
		<section class="content-header">
		    <h1>
		      Bài tin
		      <small>Danh sách</small>
		    </h1>
		    <ol class="breadcrumb">
		      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		      <li class="active">Tin tức</li>
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
	         		<div class="box">
		            <!-- /.box-header -->
		            <div class="box-body">
		            	<div class="box-header with-border pull-right">
			              	<a href="{{ route('categories.create') }}" class="btn btn-info">
			              		Thêm mới bài tin
			              	</a>
			            </div>
		              	<table class="table table-bordered">
			                <thead>
			                	<tr>
				                    <th style="width: 15px">ID</th>
				                    <th style="width: 150px">Tiêu đề</th>
				                    <th style="width: 100px">Ảnh</th>
				                    <th style="width: 150px">Trích dẫn</th>
				                    <th style="width: 140px">Người đăng</th>
				                    <th style="width: 100px">Thẻ gắn</th>
				                    <th style="width: 100px">Thao tác</th>
			               		</tr>
			                </thead>
			                <tbody>
			                	@if (isset($articles))
				                	@foreach ($articles as $key => $article)
					                	<tr>
						                    <td style="width: 15px">{{ $article->id }}</td>
						                    <td style="width: 150px">{{ $article->title }}</td>
						                    <td style="width: 100px"><img src="{{ url('images/articles') }}/{!! $article->image_url !!}" alt="" style="width: 100px; height: 100px;"></td>
						                    <td style="width: 150px">{!! $article->description !!}</td>
						                    <td style="width: 100px">{!! $article->users->name !!}</td>
						                    <td style="width: 100px">{!! $article->tag !!}</td>
						                    <td>
						                    	<form action="{{ route('articles.destroy', $article->id) }}" method="POST">
						                    		<a href="{{ route('articles.edit', $article->id ) }}" class="btn-info btn"><i class="fa fa-edit"></i></a>
						                    		<a href="{{ route('articles.show', $article->id ) }}" class="btn-info btn"><i class="fa fa-clipboard"></i></a>
						                    		@method("DELETE")
						                    		@csrf
						                    	    <button  class="btn-danger btn" type="submit" onclick="confirm('Bạn muốn xóa bài tin này?')" ><i class="fa fa-trash"></i></button></a>
						                    	</form>
						                    	
						                    </td>
					               		</tr>
				                	@endforeach
				               	@endif
			              	</tbody>
		          		</table>
		            </div>
		            <!-- /.box-body -->
		            {{ $articles->links() }}
	          	</div>
	         	</div>
	          	<!-- /.box -->
		    </div>
	    </section>
	</div>
@endsection()