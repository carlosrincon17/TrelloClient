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

    function showList(){
        $boards =  $this->getBoards();
        return view('board.index', array('user'=> AuthController::getUserInSession(), 'boards'=> $boards));
    }

    function showBoard($id){
        $cards = $this->getCardsFromBoard($id);
        $board = $this->getBoard($id);
        $lists = $this->getBoardLists($id);
        return view('board.cards', array(
            'user'=> AuthController::getUserInSession(),
            'listCards'=> $this->groupListCards($cards, $lists),
            'board'=> $board));
    }

    private function groupListCards($cards, $lists){
        $arrayLists = array();
        foreach ($lists as $list){
            $list['cards'] = array();
            $arrayLists[$list['id']] = $list;
        }
        foreach ($cards as $card){
            array_push( $arrayLists[$card['idList']]['cards'], $card);
        }
        return array_values($arrayLists);
    }

    private function getBoards(){
        $idMember = AuthController::getUserInSession()['idMember'];
        $boards = $this->trelloClient->get("members/{$idMember}/boards");
        return $boards;
    }

    private function getCardsFromBoard($idBoard){
        return $this->trelloClient->get("boards/{$idBoard}/cards");
    }

    private function getBoard($id){
        return $this->trelloClient->get("boards/{$id}");
    }

    public function getBoardLists($id){
        return $this->trelloClient->get("boards/{$id}/lists");
    }

}