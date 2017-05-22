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
            <form method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{$card['name']}}" required>
                </div>
                <div class="form-group">
                    <label for="name">Description</label>
                    <textarea rows="3" class="form-control" id="description" placeholder="description" name="description"  required>{{$card['desc']}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="list">Description</label>
                    <select id="idList" name="idList" class="form-control" required>
                        <option value="">Select</option>
                        @forelse ($lists as $list)
                            @if($list['id'] == $card['idList'])
                                <option value="{{$list['id']}}" selected>{{$list['name']}}</option>
                            @else
                                <option value="{{$list['id']}}">{{$list['name']}}</option>
                            @endif
                        @empty
                            <option value="">Select</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection