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
        <div class="col-md-10 col-md-offset-1">
            <h1>Boards</h1>
            @forelse ($boards as $board)
                <li>{{ $board['name'] }}</li>
            @empty
                <p>Boards not found</p>
            @endforelse

        </div>
    </div>
@endsection