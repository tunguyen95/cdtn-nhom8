@extends('shop.home')
@section('content')
	<script type="text/javascript">
		$(document).ready(function() {
		   $('input[type="radio"]').click(function() {
		       if($(this).attr('id') == 'payment_method_bacs') {
		            $('#COD').show(); 
		            $('#ATM').hide();          
		       }
		       else if($(this).attr('id') == 'payment_method_cheque'){
		       		$('#ATM').show(); 
		       		$('#COD').hide();  
		       }
		   });
		});
	</script>
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress" style="margin-bottom: 55px;" >
		<div class="container">
			<ul>
				<li><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Trang chủ</a> <i>/</i></li>
				<li>Đặt hàng</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- GioHang -->
	<div class="container"  style="margin-bottom: 55px;">
		<div class="col-lg-6" >
			<form method="POST" class="form-horizontal" style="border: #E8E8E8 solid 1px;">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
			  	<fieldset >
			    	<legend style="text-align: center;height: 55px;line-height: 55px;background: #F8F8FF;">Đặt hàng</legend>
			    	<div class="form-group">
				        <label class="col-lg-3 control-label"><span style="font-weight: normal;">Họ tên</span> <span style="color: red;">*</span> </label>
				        <div class="col-lg-8">
				          <input type="text" name="weight" class="form-control" value="" placeholder="Họ tên" required="">
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="col-lg-3 control-label"><span style="font-weight: normal;">Ngày sinh</span> </label>
				        <div class="col-lg-8">
				          <input type="text" name="weight" class="form-control" value="" placeholder="Ngày sinh" >
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="col-lg-3 control-label"><span style="font-weight: normal;">Số điện thoại</span> <span style="color: red;">*</span> </label>
				        <div class="col-lg-8">
				          <input type="text" name="weight" class="form-control" value="" placeholder="Số điện thoại" required="">
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="col-lg-3 control-label"><span style="font-weight: normal;">Email</span> </label>
				        <div class="col-lg-8">
				          <input type="text" name="weight" class="form-control" value="" placeholder="Email" >
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="col-lg-3 control-label"><span style="font-weight: normal;">Địa chỉ</span> <span style="color: red;">*</span> </label>
				        <div class="col-lg-8">
				          <input type="text" name="weight" class="form-control" value="" placeholder="Số nhà , Thôn - Xã (Phường) - Quận (Huyện)" required="">
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="col-lg-3 control-label"><span style="font-weight: normal;">Thành phố</span> <span style="color: red;">*</span> </label>
				        <div class="col-lg-8">
				          <input type="text" name="weight" class="form-control" value="" placeholder="Thành phố" required="">
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="col-lg-3 control-label"><span style="font-weight: normal;">Ghi chú</span> </label>
				        <div class="col-lg-8">
				          <textarea rows="6"></textarea>
				        </div>
				    </div>
			    </fieldset> 
			</form> <!--/form-horizontal-->
		</div>
		<div class="col-lg-6" >
			<form method="POST" class="form-horizontal" style="border: #E8E8E8 solid 1px;">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
			  	<fieldset >
			    	<legend style="text-align: center;height: 55px;line-height: 55px;background: #F8F8FF;">Đơn hàng của bạn</legend>
			    	<div class="row">
			        	<div class="col-md-3">PIC</div>
			        	<div class="col-md-3">Tên sản phẩm</div>
			        </div>
			        <div class="row">
			        	<div class="col-md-3">Tổng tiền</div>
			        	<div class="col-md-3">Total VND</div>
			        </div>
				    <legend  style="text-align: center;height: 55px;line-height: 55px;background: #F8F8FF;font-size: 18px;"> Hình thức thanh toán </legend>
				    <div class="your-order-body">
				    	<div class="col-md-1"></div>
				    	<div class="col-md-11">
				    		<ul class="payment_methods methods">
								<li class="payment_method_bacs" style="list-style: none;">
									<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
									<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
									<div class="payment_box payment_method_bacs" id="COD" style="display: block;background: #EEEED1;font-size: 16px;margin-left: 15px;padding: 15px 7px 15px 7px;">
								
										Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
									</div>						
								</li>
								<li class="payment_method_cheque" style="list-style: none;"> 
									<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
									<label for="payment_method_cheque">Chuyển khoản </label>
									<div class="payment_box payment_method_cheque" id="ATM" style="display: none;">
										<div class="caption" style="display: block;background: #EEEED1;font-size: 16px;margin-left: 15px;padding: 15px 7px 15px 7px;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn Văn Duy
											<br>- Ngân hàng VCB, Chi nhánh T.T.Huế
										</div>
										<hr>
										<label for="payment_method_cheque">Thanh toán bằng ví ngân lượng </label>
										<hr style="margin-bottom: 1px;">
										<a target="_blank" href="#"><img src="https://www.nganluong.vn/css/newhome/img/button/pay-lg.png"border="0" /></a> 
									</div>						
								</li>
							</ul>
							<hr>
							<div class="row" style="margin-bottom: 25px;"></div> 
				    	</div>
					</div>
					<div class="form-actions">
						 <div class="text-center" ><button type="submit" class="btn btn-primary">Đặt hàng</button></div>
					</div>
					<div class="row" style="margin-bottom: 25px;"></div>
			    </fieldset>   
			</form> <!--/form-horizontal-->
		</div>
	</div>
	<!-- //GioHang -->
@endsection