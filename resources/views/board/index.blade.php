@extends('layout')

@section('title', 'Boards')
@section('navbar')
    @include('menu')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Boards</h1>
            <div class="row">
                @forelse ($boards as $board)
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{ $board['name'] }}</h3>
                            </div>
                            <div class="panel-body">
                                <strong>Members:</strong> {{ sizeof($board['memberships']) }}
                            </div>
                            <div class="panel-footer text-right">
                                <a class="btn btn-primary" href="board/{{$board['id']}}">
                                    <i class="glyphicon glyphicon-search"> </i> Ver
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 alert alert-danger">
                        <p>Boards not found</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection