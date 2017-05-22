<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 21/05/2017
 * Time: 9:58 AM
 */
namespace App\Http\Controllers;
use App\TrelloClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    function showLogin(){
        return view('auth.login');
    }

    function login(Request $request){
        $token = $request->token;
        $trello_client =  new TrelloClient();
        $token_data = $trello_client->get("token/{$token}");
        $id_member = $token_data['idMember'];
        $member_data = $trello_client->get("member/{$id_member}", $token);
        $session_data = [
            'idMember'=> $token_data['idMember'],
            'token' => $token,
            'fullName' => $member_data['fullName'],
            'username'=> $member_data['username']
        ];
        session($session_data);
        return response("Ok");
    }

    public static function getUserInSession(){
        return array(
            'name'=> session('fullName'),
            'username'=> session('username'),
            'idMember'=> session('idMember'),
            'token' => session('token'),
        );
    }
}