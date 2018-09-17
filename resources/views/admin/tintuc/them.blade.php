@extends('admin.layout.index')


@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                {!! errAlert( $errors->all() ) !!}
                
                {!! message( session('msg') ) !!}

                <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="TheLoai" id="TheLoai">
                            @foreach ($theloai as $tl)
                                <option value="{{$tl->id}}">{{$tl->Ten}}</option>                          
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Loại tin</label>
                        <select class="form-control" name="LoaiTin" id="LoaiTin">
                           @foreach ($loaitin as $lt)
                                <option value="{{$lt->id}}">{{$lt->Ten}}</option>                          
                            @endforeach                          
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" name="TieuDe" class="form-control" placeholder="Nhập tiêu đề">
                    </div>

                    <div class="form-group">
                        <label>Tóm tắt</label>
                        <textarea name="TomTat" id="demo" class="form-control ckeditor" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="NoiDung" id="demo" class="form-control ckeditor" rows="3"></textarea>
                    </div>
                   
                    <div class="form-group">
                        <label>Hình</label>
                        <input name="Hinh" type="file">
                    </div>
                     {!! error( session('error') ) !!}

                    <div class="form-group">
                        <label>Nổi bật:</label>
                        &nbsp&nbsp&nbsp
                        <label class="radio-inline">
                            <input name="NoiBat" value="0" checked="" type="radio">Không
                        </label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="1" type="radio">Có
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
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
    $(document).ready(function(){
        $('#TheLoai').change(function(){
            _that = $(this);
            $.get("./admin/ajax/loaitin/" + _that.val(), function(data){
                $("#LoaiTin").html(data);
                // alert(data);
            });    
        });
    });
</script>
@endsection