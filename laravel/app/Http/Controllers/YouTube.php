<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YouTube extends Controller
{
    //
    // protected $API_key = "AIzaSyBmRAsYO3fYP0LWGZwacEotnM-jXQTD8V4";
    protected $API_key = "AIzaSyCS_4H7s_SQmaUJM-uV8AFMYUHaSfxZShc";
    // protected $API_key = "AIzaSyAIMPK0EXzxRjl_iBNkvum_qc2Zv2rH030";
    protected $BASE_URI = "https://youtube.googleapis.com/youtube/v3";
    protected $MAX_RESULT = "48";
    
    function test(){
        return ["name"=>"demo"];
    }

    function home(){
        header('Access-Control-Allow-Origin: *');
        header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );
        $url = $this->BASE_URI."/search?part=snippet&maxResults=".$this->MAX_RESULT."&key=".$this->API_key;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $resp = json_decode(curl_exec($ch),true);
        curl_close($ch);
        return ["data"=>$resp];
    }

    function nextPage(Request $req){
        header('Access-Control-Allow-Origin: *');
        header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );

        $url = $this->BASE_URI."/search?part=snippet&maxResults=".$this->MAX_RESULT."&key=".$this->API_key."&pageToken=".$req->token;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $resp = json_decode(curl_exec($ch),true);
        curl_close($ch);
        return ["data"=>$resp];
    }

    function video(Request $req){
        header('Access-Control-Allow-Origin: *');
        header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );

        $url = $this->BASE_URI."/videos?part=snippet&"."&key=".$this->API_key."&id=".$req->id;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $resp = json_decode(curl_exec($ch),true);
        curl_close($ch);
        return ["data"=>$resp];
    }

    function search(Request $req){
        $q = urlencode($req->q);
        header('Access-Control-Allow-Origin: *');
        header( 'Access-Control-Allow-Headers: Authorization, Content-Type' );

        $url = $this->BASE_URI."/search?part=snippet&maxResults=".$this->MAX_RESULT."&key=".$this->API_key."&q=".$q;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $resp = json_decode(curl_exec($ch),true);
        curl_close($ch);
        return ["data"=>$resp];
    }
}