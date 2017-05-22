@extends('layout')

@section('title', 'Login')

@section('content')
    <script src="https://api.trello.com/1/client.js?key=f04d128e969065f8b91890f85461dbd5" type="text/javascript"></script>
    <script>

    function onFailedAuthorization() {
        // whatever
    }

    function onAuthorizeSuccessful() {
        const data = { token: Trello.token() };
        const headers =  {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')};
        $.ajax({
            url: "/",
            type: "post",
            data: data,
            headers: headers,
            success: function(data, textStatus, jqXHR){
                console.log("ava")
                location.reload();
            }
        });
    }

    function authenticateTrello() {
        Trello.authorize({
            name: "Trello Client",
            interactive: true,
            type: 'popup',
            expiration: "never",
            persist: false,
            success: onAuthorizeSuccessful,
            error: onFailedAuthorization,
            scope: { write: true, read: true }
            });
    }

    </script>
    <div class="row" style="margin-top: 50px">
        <div class="col-md-6 col-md-offset-3 text-center">
            <h1>Awesome Trello Client</h1>
            <button type="button" class="btn btn-primary" onclick="authenticateTrello()">Trello Login</button>
        </div>
    </div>
@endsection