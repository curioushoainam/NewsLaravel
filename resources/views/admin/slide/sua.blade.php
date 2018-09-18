@extends('admin.layout.index')


@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">

                {!! errAlert( $errors->all() ) !!}                
                {!! message( session('msg') ) !!}
                {!! error( session('error') ) !!}

                <form action="admin/slide/sua/{{$slide->id}}" method="POST" enctype="multipart/form-data"> 
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="Ten" placeholder="Nhập tên slide" value="{{$slide->Ten}}" />
                    </div>
                    <div class="form-group">
                        <label>Hình</label>
                        <p><img src="public/upload/slide/{{$slide->Hinh}}" alt="img" width="200px"></p>
                        <input class="form-control" name="Hinh" type="file"/>
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input class="form-control" name="link" placeholder="Nhập link slide" value="{{$slide->link}}"/>
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