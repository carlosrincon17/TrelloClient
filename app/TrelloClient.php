<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Log;

class TrelloClient {

    private $trello_url = "https://api.trello.com/1/";
    private $client = null;

    function __construct()
    {
        $this->client = new Client(['base_uri' => $this->trello_url]);
    }

    public function put($url, $data, $token=null){
        $response = $this->client->put($this->addAuthParams($url, $token), [
            'form_params'=> $data
        ]);
        if($response->getStatusCode() != 200){
            return null;
        }
        return json_decode($response->getBody(), true);
    }

    public function post($url, $data, $token=null){
        $response = $this->client->post($this->addAuthParams($url, $token), [
            'form_params'=> $data
        ]);
        if($response->getStatusCode() != 200){
            return null;
        }
        return json_decode($response->getBody(), true);
    }

    public function delete($url, $token=null){
        $response = $this->client->delete($this->addAuthParams($url, $token));
        if($response->getStatusCode() != 200){
            return null;
        }
        return json_decode($response->getBody(), true);
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
        return $url;
    }
}
