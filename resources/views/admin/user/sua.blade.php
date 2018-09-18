@extends('admin.layout.index')


@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>{{$user->name}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

                {!! errAlert( $errors->all() ) !!}                
                {!! message( session('msg') ) !!} 

                <form action="admin/user/sua/{{$user->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="name" placeholder="Nhập tên" value="{{$user->name}}"  />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" type="email" placeholder="Nhập email" value="{{$user->email}}" readonly/>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="changePassword" id="changePassword">
                            Thay đổi password
                        </label>
                        <input class="form-control password" name="password" type="password" placeholder="Nhập password" disabled="" />
                    </div>

                    <div class="form-group">
                        <label>Nhập lại password</label>
                        <input class="form-control password" name="repassword" type="password" placeholder="Nhập lại password" disabled="" />
                    </div>

                    <div class="form-group">
                        <label>Phân quyền</label>&nbsp&nbsp&nbsp
                        <label class="radio-inline">
                            <input name="level" value="0"
                            @if($user->level == 0) {{"checked"}}  @endif
                            type="radio">thường
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="1"
                            @if($user->level == 1) {{"checked"}}  @endif
                            type="radio">admin
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default btn-success">Update</button>
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

@section('script')
    <script>
        $(document).on('change','#changePassword', function(){
            if($(this).is(":checked"))
                $('.password').removeAttr('disabled');
            else
                $('.password').attr('disabled','');
        });
    </script>
@endsection