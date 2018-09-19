@extends('layout.index')

@section('title')
    Tìm Kiếm "{{$keyword}}"
@endsection

@section('content')

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h4><b>Tìm thấy tổng cộng  tin tức có {{ $count }} liên quan đến từ khóa "{{$keyword}}".</b></h4>
                </div>

                @foreach($tintuc as $tt)
                    <div class="row-item row">
                        <div class="col-md-3">

                            <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="public/upload/tintuc/{{$tt->Hinh}}" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3><a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">{!! highlight($tt->TieuDe, $keyword) !!}</a></h3>
                            <span><i>Tin ngày : {{$tt->created_at}}</i></span>
                            <p>{!! highlight($tt->TomTat, $keyword) !!}</p>
                            <a class="btn btn-primary" href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">Xem Thêm.. <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
              
                @endforeach
                <!-- Pagination -->
                <div class="row text-center">
                   {{ $tintuc->links() }}
                </div>
                <!-- /.row -->

            </div>
        </div> 

    </div>

</div>
<!-- end Page Content -->

@endsection

