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
            <form method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="name">Description</label>
                    <textarea rows="3" class="form-control" id="description" placeholder="description" name="description"
                    required>

                    </textarea>
                </div>
                <div class="form-group">
                    <label for="list">Description</label>
                    <select id="idList" name="idList" class="form-control" required>
                        <option value="">Select</option>
                        @forelse ($lists as $list)
                            <option value="{{$list['id']}}">{{$list['name']}}</option>
                        @empty
                            <option value="">Select</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection