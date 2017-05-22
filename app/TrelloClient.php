<?php

namespace App;

use GuzzleHttp\Client;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;

class TrelloClient {

    private $trello_url = "http://api.trello.com/1/";
    private $client = null;
    function __construct()
    {
        $this->client = new Client(['base_uri' => $this->trello_url]);
    }

    public function post($url, $data){

    }

    public function get($url, $token=null){
        $response = $this->client->get($this->addAuthParams($url, $token));
        if($response->getStatusCode() != 200){
            return null;
        }
        return json_decode($response->getBody(), true);
    }

    private function addAuthParams($url, $token){
        if($token == null){
            $token = session('token');
        }
        $key = config('trello_config.key');
        $url .= "?key=".$key;
        if($token){
            $url .= "&token=".$token;
        }
        Log::info($url);
        return $url;
    }
}
