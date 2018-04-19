<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Cửa hàng thời trang đẹp tại đà nẵng</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Electronic Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- Custom Theme files -->
<link href="{{url('shop/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{url('shop/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{url('shop/css/fasthover.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{url('shop/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="{{url('shop/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="{{url('shop/js/jquery.min.js')}}"></script>
<link rel="stylesheet" href="{{url('shop/css/jquery.countdown.css')}}" /> <!-- countdown --> 
<!-- //js --> 

<!-- headerCSS -->
<link href="{{url('shop/css/header.css')}}" rel="stylesheet" type="text/css" />
<!-- //headerCSS -->

<!-- web fonts --> 
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- //web fonts -->  
<!-- start-smooth-scrolling -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- //end-smooth-scrolling --> 
</head> 
<body>
	<!-- for bootstrap working -->
	<script type="text/javascript" src="{{url('shop/js/bootstrap-3.1.1.min.js')}}"></script>
	<!-- //for bootstrap working -->

	<!-- header -->
	@include('shop.blocks.header')
	<!-- //header -->
	<!-- menu -->
	@include('shop.blocks.menu')
	<!-- //menu -->
	<!-- banner -->
	@include('shop.pages.banner')
	<!-- //banner --> 
	<!-- model -->
	@include('shop.blocks.model')
	<!-- //model -->
	
	@yield('content')
	
	<!-- footer -->
	@include('shop.blocks.footer')
	<!-- //footer --> 
	<!-- cart-js -->
	<script src="{{url('shop/js/minicart.js')}}"></script>
	<script>
        w3ls.render();

        w3ls.cart.on('w3sb_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) { 
        		}
        	}
        });
    </script>  
	<!-- //cart-js -->   
	<!-- myscript -->
	<script src="{{url('admin/js/myscript.js')}}"></script> 
	<!-- //myscript -->
</body>
</html>