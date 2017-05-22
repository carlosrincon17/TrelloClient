<?php

/**
 * Created by PhpStorm.
 * User: carlo
 * Date: 21/05/2017
 * Time: 9:58 AM
 */
namespace App\Http\Controllers;
use App\TrelloClient;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BoardController extends Controller
{
    private $trelloClient = null;

    function __construct()
    {
        $this->trelloClient = new TrelloClient();
    }

    function show(){
        $boards =  $this->getBoards();
        $user = array(
            'name'=> session('fullName'),
            'username'=> session('username')
        );
        return view('board.index', array('user'=> $user, 'boards'=> $boards));
    }

    function login(Request $request){

    }

    private function getBoards(){
        $idMember = session('idMember');
        $boards = $this->trelloClient->get("member/{$idMember}/boards");
        return $boards;
    }
}