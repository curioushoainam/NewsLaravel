@extends('admin.layout.index')


@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

                {!! errAlert( $errors->all() ) !!}                
                {!! message( session('msg') ) !!} 

                <form action="admin/user/them" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="name" placeholder="Nhập tên" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" type="email" placeholder="Nhập email" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" name="password" type="password" placeholder="Nhập password" />
                    </div>

                    <div class="form-group">
                        <label>Nhập lại password</label>
                        <input class="form-control" name="repassword" type="password" placeholder="Nhập lại password" />
                    </div>

                    <div class="form-group">
                        <label>Phân quyền</label>&nbsp&nbsp&nbsp
                        <label class="radio-inline">
                            <input name="level" value="0" checked="" type="radio">thường
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="1" type="radio">admin
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default btn-success">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection