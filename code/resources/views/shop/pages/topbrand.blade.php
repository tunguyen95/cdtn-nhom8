<div class="top-brands">
	<div class="container">
		<h3 style="font-family: 'Tangerine', serif;font-weight: bold;">Danh mục sản phẩm</h3>
		<div class="sliderfig">
			<ul id="flexiselDemo1">			
				<li>
					<img src="{{url('/pages/images/tb1.jpg')}}" alt=" " class="img-responsive" />
				</li>
				<li>
					<img src="{{url('/pages/images/tb2.jpg')}}" alt=" " class="img-responsive" />
				</li>
				<li>
					<img src="{{url('/pages/images/tb3.jpg')}}" alt=" " class="img-responsive" />
				</li>
				<li>
					<img src="{{url('/pages/images/tb4.jpg')}}" alt=" " class="img-responsive" />
				</li>
				<li>
					<img src="{{url('/pages/images/tb5.jpg')}}" alt=" " class="img-responsive" />
				</li>
			</ul>
		</div>
		<script type="text/javascript">
				$(window).load(function() {
					$("#flexiselDemo1").flexisel({
						visibleItems: 4,
						animationSpeed: 1000,
						autoPlay: true,
						autoPlaySpeed: 3000,    		
						pauseOnHover: true,
						enableResponsiveBreakpoints: true,
						responsiveBreakpoints: { 
							portrait: { 
								changePoint:480,
								visibleItems: 1
							}, 
							landscape: { 
								changePoint:640,
								visibleItems:2
							},
							tablet: { 
								changePoint:768,
								visibleItems: 3
							}
						}
					});
					
				});
		</script>
		<script type="text/javascript" src="{{url('/pages/js/jquery.flexisel.js')}}"></script>
	</div>
</div>