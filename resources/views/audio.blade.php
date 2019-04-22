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
                                            <td>Song</td>
                                            <td>Artist</td>
                                            <td>Album</td>
                                            <td>Category</td>
                                            <td>Music</td>
                                        </tr>
                                        @foreach($mus as  $mu)
                                            <tr>
                                                <td>{{$mu->id}}</td>
                                                <td>{{$mu->song_name}}</td>
                                                <td>{{$mu->artist->artist_name}}</td>
                                                <td>{{$mu->album->album_name}}</td>
                                                <td>{{$mu->category->category_name}}</td>
                                                <td class="col-sm-4">

                                                    @if($mu->audio)
                                                        <audio src="../audios/{{$mu->audio}}" controls></audio>
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
                            <div class="panel-heading">Music Upload</div>
                            <div class="panel-body">
                                <form enctype="multipart/form-data" action="{{route('postMusic')}}" method="post">
                                    <div class="form-group">
                                        <label for="song_name" class="control-label">Song Name</label>
                                        <input type="text" id="song_id" name="song_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="artist_id">Artist</label>
                                        <select name="artist_id" id="artist_id" class="form-control">
                                            <option value="">Select Artist</option>
                                            @foreach($art as $ar)
                                                <option value="{{$ar->id}}">{{$ar->artist_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="album_id">Album</label>
                                        <select name="album_id" id="album_id" class="form-control">
                                            <option value="">Select Album</option>
                                            @foreach($alb as $al)
                                                <option value="{{$al->id}}">{{$al->album_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Category</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">Select Category</option>
                                            @foreach($cat as $ca)
                                                <option value="{{$ca->id}}">{{$ca->category_name}}</option>
                                            @endforeach
                                        </select>
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