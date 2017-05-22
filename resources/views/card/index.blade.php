@extends('layout')

@section('title', 'Boards')
@section('navbar')
    @include('menu')
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
                        <a href="/board/{{$board['id']}}/card/{{$card['id']}}/edit" class="btn btn-primary">Edit</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection