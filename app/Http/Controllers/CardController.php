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

class CardController extends Controller
{
    private $trelloClient = null;

    function __construct()
    {
        $this->trelloClient = new TrelloClient();
    }

    function show($id, $idCard){
        $board = $this->getBoard($id);
        $card = $this->getCard($idCard);
        $list = $this->getList($card['idList']);
        return view('card.index', array('user'=> AuthController::getUserInSession(), 'board'=> $board,
            'card'=> $card, 'list'=> $list));
    }

    function showNew($id){
        $board = $this->getBoard($id);
        $lists =  (new BoardController())->getBoardLists($id);
        return view('card.add', array('user'=> AuthController::getUserInSession(), 'board'=> $board,
            'lists'=> $lists));
    }

    function add(Request $request, $id){
        $data = array(
            'idList'=> $request->idList,
            'name'=> $request->name,
            'desc '=> $request->description
        );
        $response = $this->addCard($data);
        return redirect()->route('board', ['id' => $id]);
    }

    function delete($id, $idCard){
        $this->deleteCard($idCard);
        return redirect()->route('board', ['id' => $id]);
    }

    private function addCard($data){
        return $this->trelloClient->post("cards", $data);
    }

    private function deleteCard($idCard){
        return $this->trelloClient->delete("cards/{$idCard}");
    }

    private function getBoard($id){
        return $this->trelloClient->get("boards/{$id}");
    }

    private function getCard($id){
        return $this->trelloClient->get("cards/{$id}");
    }

    private function getList($id){
        return $this->trelloClient->get("lists/{$id}");
    }



}