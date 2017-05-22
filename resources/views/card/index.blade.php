@extends('layout')

@section('title', 'Boards')
@section('navbar')
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Awesome Trello Client</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a>{{$user['name']}}</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{$board['name']}}</h1>
            <hr />
            <div class="row">
                <div class="col-md-2">
                    <label class="control-label">Name:</label>
                </div>
                <div class="col-md-10">
                    <p>{{ $card['name'] }}</p>
                </div>
                <div class="col-md-2">
                    <label class="control-label">Description:</label>
                </div>
                <div class="col-md-10">
                    @if($card['desc'])
                        <p>{{ $card['desc'] }}</p>
                    @else
                        <p>Empty</p>
                    @endif
                </div>
                <div class="col-md-2">
                    <label class="control-label">List:</label>
                </div>
                <div class="col-md-10">
                    <p>{{ $list['name'] }}</p>
                </div>
                <form method="post" action="">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$card['id']}}">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection