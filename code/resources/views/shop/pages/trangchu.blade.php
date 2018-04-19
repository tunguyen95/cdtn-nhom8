@extends('shop.home')
@section('content')

	<!-- new product -->
	@include('shop.pages.newproduct')
	<!-- //new product -->
	
	<!-- list_cate -->
	@include('shop.pages.topbrand')
	<!-- list_cate -->

	<!-- new product -->
	@include('shop.pages.mostview')
	<!-- //new product -->
@endsection