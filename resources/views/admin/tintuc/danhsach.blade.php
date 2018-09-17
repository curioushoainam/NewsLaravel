@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tiêu đề</th>                                               
                        <th>Tóm tắt</th>
                        <th>Loại tin</th>
                        <th>Thể loại</th>
                        <th>Nổi bật</th>
                        <th>Lượt xem</th>                        
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tintuc as $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{$item->id}}</td>                        
                        <td>
                            <p>{{$item->TieuDe}}</p>
                            <img src="public/upload/tintuc/{{$item->Hinh}}" alt="image" width="100px">
                        </td>
                        <td>{{$item->TomTat}}</td>
                        <td>{{$item->loaitin->Ten}}</td>
                        <td>{{$item->loaitin->theloai->Ten}}</td>                        
                        <td>
                            @if ($item->NoiBat == 0)
                                {{"Không"}}
                            @else
                                {{"Có"}}
                            @endif
                        </td>
                        <td>{{$item->SoLuotXem}}</td>                        
                        <td class="center">
                            <form method="post" action="admin/tintuc/xoa" style="display:inline" onsubmit="return confirm('Bạn muốn xóa item {{$item->id}} không ?')" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input name="delID" value="{{$item->id}}" hidden>
                                <button class="btn btn-primary btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/xoa/{{$item->id}}">Edit</a></td>
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