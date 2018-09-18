@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->

            {!! message(session('msg')) !!}                       

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>                                               
                        <th>Hình</th>
                        <th>Linh</th>
                        <th>Ngày tạo</th>
                        <th>Cập nhật</th>                        
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slide as $item)
                    <tr class="odd gradeX" align="center" id="sl{{$item->id}}">
                        <td>{{$item->id}}</td>                        
                        <td>{{$item->Ten}}</td>                        
                        <td>                            
                            <img src="public/upload/slide/{{$item->Hinh}}" alt="image" width="100px">
                        </td>
                        <td>{{$item->link}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td><button class="btn btn-primary btn-sm delsl" data-delid="{{$item->id}}" type="button" >Delete</button></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/sua/{{$item->id}}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
            $(document).on('click','.delsl',function(){
                _that = $(this);
                var delID = _that.data('delid');
                // alert(delID);
                $.get("./admin/ajax/xoaslide/"+ delID, function(data){
                    _data = JSON.parse(data);
                    if(_data.result = "done")
                        $("#sl"+delID).remove();
                    else
                        alert('Delete #id '+delID+' thất bại.' );
                });
            });            
        });
    </script>

@endsection