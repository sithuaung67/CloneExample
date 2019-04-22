@extends('admin.layouts.master')

@section('title')
    Artist
@stop

@section('style')

@stop

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <span class="fa fa-dashboard"></span> Artist
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin Panel</a></li>
                <li class="active">Artist</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-4">
                        @if(Session('info'))
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 text-center">
                                    <div class="tem alert alert-success navbar-fixed-bottom"><span class="glyphicon glyphicon-ok-circle"></span> {{Session('info')}}</div>
                                </div>
                            </div>
                        @endif
                        <div class="panel panel-primary">
                            <div class="panel-heading">Edit {{$aud->artist_name}}</div>
                            <div class="panel-body">
                                <form enctype="multipart/form-data" action="{{route('postEditArtist',['id'=>$art->id])}}" method="post">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="{{$art->id}}">
                                        <div class="form-group">
                                            <label for="song_name" class="control-label">Song Name</label>
                                            <input type="text" id="song_name" name="song_name" class="form-control" value="{{$son->song_name}}">
                                        </div>
                                        <label for="artist_name" class="control-label">Artist Name</label>
                                        <input value="{{$art->artist_name}}" type="text" id="artist_name" name="artist_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="album_name" class="control-label">Album Name</label>
                                        <input type="text" id="album_name" name="album_name" class="form-control" value="{{$alb->album_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="category_name" class="control-label">Category Name</label>
                                        <input type="text" id="category_name" name="category_name" class="form-control" value="{{$cat->category_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="audio" class="control-label">Audio</label>
                                        <input type="text" id="audio" name="audio" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
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