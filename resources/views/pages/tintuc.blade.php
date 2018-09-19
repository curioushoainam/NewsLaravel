@extends('layout.index')

@section('content')

<!-- Page Content -->
<div class="container">
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-9">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{$tintuc->TieuDe}}</h1>

            <!-- Author -->
            <p class="lead">
                by <a href="#">admin</a>
            </p>

            <!-- Preview Image -->
            <img class="img-responsive" src="public/upload/tintuc/{{$tintuc->Hinh}}" alt="" style="height:300">

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on {{$tintuc->created_at}}</p>
            <hr>

            <!-- Post Content -->
            <p>{!! $tintuc->NoiDung !!}</p>

            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            @if(Auth::user())
            <div class="well">
                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>

                {!! errAlert($errors->all()) !!}
                {!! message(session('msg')) !!}

                <form role="form" action="tintuc/comment/{{$tintuc->id}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <textarea class="form-control" name="NoiDung" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>
            @endif  
            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
            @foreach($tintuc->comment as $cmt)
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$cmt->user->name}}
                        <small>{{$cmt->created_at}}</small>
                    </h4>
                    {{$cmt->NoiDung}}
                </div>
            </div>
			@endforeach			

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin liên quan</b></div>
                <div class="panel-body">
					@foreach($tinlienquan as $tintuc)
	                    <!-- item -->
	                    <div class="row" style="margin: 2px;">
	                        <div class="col-md-5">
	                            <a href="tintuc/{{$tintuc->id}}/{{$tintuc->TieuDeKhongDau}}.html">
	                                <img class="img-responsive" src="public/upload/tintuc/{{$tintuc->Hinh}}" alt="">
	                            </a>
	                        </div>
	                        <div class="col-md-7">
	                            <a href="tintuc/{{$tintuc->id}}/{{$tintuc->TieuDeKhongDau}}.html"><b>{{$tintuc->TieuDe}}</b></a>
	                        </div>
	                        <p><small>{{$tintuc->TomTat}}</small></p>
	                        <div class="break"></div>
	                    </div>
	                    <!-- end item -->

                    @endforeach
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin nổi bật</b></div>
                <div class="panel-body">
					@foreach($tinnoibat as $tintuc)
	                    <!-- item -->
	                    <div class="row" style="margin: 2px;">
	                        <div class="col-md-5">
	                            <a href="tintuc/{{$tintuc->id}}/{{$tintuc->TieuDeKhongDau}}.html">
	                                <img class="img-responsive" src="public/upload/tintuc/{{$tintuc->Hinh}}" alt="">
	                            </a>
	                        </div>
	                        <div class="col-md-7">
	                            <a href="tintuc/{{$tintuc->id}}/{{$tintuc->TieuDeKhongDau}}.html"><b>{{$tintuc->TieuDe}}</b></a>
	                        </div>
	                        <p><small>{{$tintuc->TomTat}}</small></p>
	                        <div class="break"></div>
	                    </div>
	                    <!-- end item -->

                    @endforeach
                    
                </div>
            </div>
            
        </div>

    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->

@endsection