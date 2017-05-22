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
            <div class="row">
                <div class="col-md-8"><h1>{{ $board['name'] }}</h1></div>
                <div class="col-md-4 text-right"><a class="btn btn-primary" href="/board/{{$board['id']}}/card/"> Nuevo</a></div>
            </div>
            <div class="row">
                @forelse ($listCards as $list)
                    <div class="col-md-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{ $list['name'] }}</h3>
                            </div>
                            <div class="panel-body">
                                <ul class="list-group">
                                    @forelse ($list['cards'] as $card)
                                    <a class="list-group-item" style="cursor: pointer"
                                       href="/board/{{$board['id']}}/card/{{$card['id']}}">
                                        {{  $card['name'] }}
                                    </a>
                                    @empty
                                        <div class="col-md-12 alert alert-danger">
                                            <p>Cards not found</p>
                                        </div>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 alert alert-danger">
                        <p>Lists not found</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection