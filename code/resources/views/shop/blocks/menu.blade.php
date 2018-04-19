<div class="navigation" >
	<nav class="navbar navbar-default">
	<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header nav_2">
			<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div> 
		<div class="collapse navbar-collapse" id="bs-megadropdown-tabs" >
			<ul class="nav navbar-nav"  >
				<li class="home" style="margin-left: -5px;">
					<a href="{{url('/')}}" class="act">Trang chủ</a></li>	
					@php
						$categoris = App\Models\CategoryModel::getCategories_lv1();
					@endphp
					@foreach ($categoris as $key => $category)
						<li class="w3pages" >
							@php
								$getCategories_lv = App\Models\CategoryModel::getCategories_lvCon($category->id);
							@endphp
							<a href="{{ url('categories', $category->slug) }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> {{ $category->name }}
							<span class="caret"></span></a>
							@foreach ($getCategories_lv as $key => $category_lv)
							<ul class="dropdown-menu">
								<li><a href="{{ url('categories', $category_lv->slug) }}">
									{{ $category_lv->name }}
								</a>
							</ul>
							@endforeach
						</li>
					@endforeach
				<li><a href="{{ url('news') }}">Tin tức</a></li>
				<li><a href="">Liên hệ</a></li>
			</ul>
		</div>
	</nav>
</div>
