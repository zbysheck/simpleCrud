<?php

namespace AppBundle\Services;

class StationService{

    public static function runJson($json){
        //should probably be stored in sme kind of config
        $url = 'https://api.feedback.quantumlab.co/v1';


        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec( $ch );
        return json_decode($response);
    }
}



