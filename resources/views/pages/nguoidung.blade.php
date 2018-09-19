@extends('layout.index')

@section('content')
<!-- Page Content -->
<div class="container">

	<!-- slider -->
	<div class="row carousel-holder">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
			  	<div class="panel-heading">Thông tin tài khoản</div>
			  	<div class="panel-body">
			  		@if(Auth::user())
			  		
			  		{!! errAlert($errors->all()) !!}
					{!! message(session('msg')) !!}

			    	<form method="post" action="nguoidung">
			    		<input type="hidden" value="{{csrf_token()}}" name="_token">
			    		<div>
			    			<label>Họ tên</label>
						  	<input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1" value="{{Auth::user()->name}}">
						</div>
						<br>
						<div>
			    			<label>Email</label>
						  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1"
						  	disabled
						  	value="{{Auth::user()->email}}" 
						  	>
						</div>
						<br>	
						<div>
							<input type="checkbox" name="changePassword" id="changePassword">
			    			<label>Đổi mật khẩu</label>
						  	<input type="password" class="form-control password" name="password" aria-describedby="basic-addon1" disabled="">
						</div>
						<br>
						<div>
			    			<label>Nhập lại mật khẩu</label>
						  	<input type="password" class="form-control password" name="repassword" aria-describedby="basic-addon1" hidden="" disabled="">
						</div>
						<br>
						<button type="submit" class="btn btn-default btn-success">Sửa
						</button>

			    	</form>
			    	@endif
			  	</div>
			</div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <!-- end slide -->
</div>
<!-- end Page Content -->

@endsection

@section('script')
	<script>
		$(document).ready(function(){
			$('#changePassword').change(function(){
				if($(this).is(':checked'))
					$('.password').removeAttr('disabled');
				else
					$('.password').attr('disabled','');
			});
		});
	</script>
@endsection