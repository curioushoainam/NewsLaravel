@extends('admin.layout.index')


@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>{{$tintuc->TieuDe}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                {!! errAlert( $errors->all() ) !!}
                
                {!! message( session('msg') ) !!}

                <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" name="TheLoai" id="TheLoai">
                            @foreach ($theloai as $tl)
                                <option 
                                    @if($tintuc->loaitin->theloai->id == $tl->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$tl->id}}">
                                    {{$tl->Ten}}
                                </option>                          
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Loại tin</label>
                        <select class="form-control" name="LoaiTin" id="LoaiTin">
                           @foreach ($loaitin as $lt)
                                <option 
                                     @if($tintuc->loaitin->id == $lt->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$lt->id}}">
                                    {{$lt->Ten}}
                                </option>                          
                            @endforeach                          
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" name="TieuDe" class="form-control" placeholder="Nhập tiêu đề" value="{{$tintuc->TieuDe}}">
                    </div>

                    <div class="form-group">
                        <label>Tóm tắt</label>
                        <textarea name="TomTat" id="demo" class="form-control ckeditor" rows="3">
                            {{$tintuc->TomTat}}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea name="NoiDung" id="demo" class="form-control ckeditor" rows="3">
                            {{$tintuc->NoiDung}}
                        </textarea>
                    </div>
                   
                    <div class="form-group">
                        <label>Hình</label>
                        <p><img src="public/upload/tintuc/{{$tintuc->Hinh}}" alt=""></p>
                        <input name="Hinh" type="file">
                    </div>
                     {!! error( session('error') ) !!}

                    <div class="form-group">
                        <label>Nổi bật:</label>
                        &nbsp&nbsp&nbsp
                        <label class="radio-inline">
                            <input name="NoiBat" value="0"  type="radio" 
                                @if($tintuc->NoiBat == 0)
                                    {{"checked"}}
                                @endif
                            >Không
                        </label>
                        <label class="radio-inline">
                            <input name="NoiBat" value="1" type="radio" 
                                @if($tintuc->NoiBat == 1)
                                    {{"checked"}}
                                @endif
                            >Có
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Update</button>
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