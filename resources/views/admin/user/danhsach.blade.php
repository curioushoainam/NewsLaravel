@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->  
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $us)
                        <tr class="odd gradeX" align="center" id="user{{$us->id}}">
                            <td>{{$us->id}}</td>
                            <td>{{$us->name}}</td>
                            <td>{{$us->email}}</td>
                            <td>{{$us->level}}</td>
                            <td><button class="btn btn-primary btn-sm deluser" data-delid="{{$us->id}}" type="button" >Delete</button></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/sua/{{$us->id}}">Edit</a></td>
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
            $(document).on('click','.deluser',function(){
                _that = $(this);
                var delID = _that.data('delid');
                // alert(delID);
                $.get("./admin/ajax/xoauser/"+ delID, function(data){
                    _data = JSON.parse(data);
                    if(_data.result = "done")
                        $("#user"+delID).remove();
                    else
                        alert('Delete #id '+delID+' thất bại.' );
                });
            });            
        });
    </script>

@endsection