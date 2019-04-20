@extends('admin.layouts.master')

@section('title')
    Album
@stop

@section('style')

@stop

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <span class="fa fa-dashboard"></span> Album
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin Panel</a></li>
                <li class="active">Album</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Album Upload</div>
                            <div class="panel-body table-responsive">
                                <form>
                                    <table class="table">
                                        <tr>
                                            <td>Id</td>
                                            <td>Album Name</td>
                                        </tr>
                                        @foreach($alb as $al)
                                            <tr>
                                                <td>{{$al->id}}</td>
                                                <td>{{$al->album_name}}</td>
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
                            <div class="panel-heading">Album Upload</div>
                            <div class="panel-body">
                                <form enctype="multipart/form-data" action="{{route('postAlbum')}}" method="post">
                                    <div class="form-group">
                                        <label for="album_name" class="control-label">Album Name</label>
                                        <input type="text" id="album_name" name="album_name" class="form-control">
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