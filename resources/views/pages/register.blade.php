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
			  	<div class="panel-heading">Đăng ký thành viên</div>
			  	<div class="panel-body">		  		
			  		
			  		{!! errAlert($errors->all()) !!}
					{!! message(session('msg')) !!}

			    	<form method="post" action="register">
			    		<input type="hidden" value="{{csrf_token()}}" name="_token">
			    		<div>
			    			<label>Họ tên</label>
						  	<input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1" value="">
						</div>
						<br>
						<div>
			    			<label>Email</label>
						  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1">
						</div>
						<br>	
						<div>							
			    			<label>Đổi mật khẩu</label>
						  	<input type="password" class="form-control password" name="password" aria-describedby="basic-addon1">
						</div>
						<br>
						<div>
			    			<label>Nhập lại mật khẩu</label>
						  	<input type="password" class="form-control password" name="repassword" aria-describedby="basic-addon1">
						</div>
						<br>
						<button type="submit" class="btn btn-default btn-success">Đăng ký
						</button>
			    	</form>			    	
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
