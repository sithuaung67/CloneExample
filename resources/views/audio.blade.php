@extends('admin.layouts.master')

@section('title')
    Mp3 Upload
@stop

@section('style')

@stop

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <span class="fa fa-dashboard"></span> Mp3 Upload
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin Panel</a></li>
                <li class="active">Mp3 Upload</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Mp3 Upload</div>
                            <div class="panel-body table-responsive">
                                <form>
                                    <table class="table">
                                        <tr>
                                            <td>Id</td>
                                            <td>Artist Name</td>
                                            <td>Song Name</td>
                                            <td>Album Name</td>
                                            <td>Category</td>
                                            <td>Music</td>
                                        </tr>
                                        @foreach($mus as  $mu)
                                            <tr>
                                                <td>{{$mu->id}}</td>
                                                <td>{{$mu->artist_name}}</td>
                                                <td>{{$mu->song_name}}</td>
                                                <td>{{$mu->album_name}}</td>
                                                <td>{{$mu->category_name}}</td>
                                                <td class="col-sm-4">
                                                    @if($mu->audio)
                                                        <audio controls class="embed-responsive" src="Audios/{{$mu->audio}}"></audio>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @if(Session('info'))
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 text-center">
                                    <div class="tem alert alert-success navbar-fixed-bottom"><span class="glyphicon glyphicon-ok-circle"></span> {{Session('info')}}</div>
                                </div>
                            </div>
                        @endif
                        <div class="panel panel-primary">
                            <div class="panel-heading">Category Upload</div>
                            <div class="panel-body">
                                <form enctype="multipart/form-data" action="{{route('postMusic')}}" method="post">
                                    <div class="form-group">
                                        <label for="singer_name" class="control-label">Singer Name</label>
                                        <input type="text" id="singer_name" name="singer_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="song_name" class="control-label">Song Name</label>
                                        <input type="text" id="song_name" name="song_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="album_name" class="control-label">Album Name</label>
                                        <input type="text" id="album_name" name="album_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="category_name" class="control-label">Category Name</label>
                                        <input type="text" id="category_name" name="category_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="music_name" class="control-label">Music</label>
                                        <input type="file" name="music_name" id="music_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                    </div>
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@stop

@section('script')

@stop