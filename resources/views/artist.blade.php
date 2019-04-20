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
                    <div class="col-md-8">
                        <div class="panel panel-primary">
                            <div class="panel-heading">Artist Upload</div>
                            <div class="panel-body table-responsive">
                                <form>
                                    <table class="table">
                                        <tr>
                                            <td>Id</td>
                                            <td>Artist Name</td>
                                        </tr>
                                        @foreach($art as $ar)
                                            <tr>
                                                <td>{{$ar->id}}</td>
                                                <td>{{$ar->artist_name}}</td>
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
                            <div class="panel-heading">Artist Upload</div>
                            <div class="panel-body">
                                <form enctype="multipart/form-data" action="{{route('postArtist')}}" method="post">
                                    <div class="form-group">
                                        <label for="artist_name" class="control-label">Artist Name</label>
                                        <input type="text" id="artist_name" name="artist_name" class="form-control">
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