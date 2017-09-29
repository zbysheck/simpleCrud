<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Debug\Debug;
use Symfony\Component\DependencyInjection\ContainerInterface;

class StationController extends Controller
{
    /**
     * @Route("/list")
     */
    public function listAction()
    {
        Debug::enable();
        $url = 'https://api.feedback.quantumlab.co/v1';
        $key = "c648c405-af1f-4286-b7fb-47eec4e7e565";
        $myvars = '{     "jsonrpc": "2.0",     "method": "station_list",     "params": {            "key": "'. $key .'"     },     "id": 1 }';

        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec( $ch );

        $response = json_decode($response);

        dump($response->result);
        return $this->render('AppBundle:Station:list.html.twig', array(
            "stations" => $response->result
        ));
    }

    /**
     * @Route("/add")
     */
    public function addAction()
    {

        $url = 'https://api.feedback.quantumlab.co/v1';
        $myvars = '{     "jsonrpc": "2.0",     "method": "station_list",     "params": {         "key": "c648c405-af1f-4286-b7fb-47eec4e7e565"     },     "id": 1 }';

        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec( $ch );

        $response = json_decode($response);

        //  var_dump($response->result);
        return $this->render('AppBundle:Station:add.html.twig', array(

        ));


    }
    /**
    * @Route("/locations")
    */
    public function locationsAction()
    {

        $url = 'https://api.feedback.quantumlab.co/v1';
        $key = "c648c405-af1f-4286-b7fb-47eec4e7e565";
        $myvars = '
        {
            "jsonrpc": "2.0",
            "method": "location_list",
            "params": {
                "key": "'. $key .'"
            },
            "id": 1
        }';

        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec( $ch );

        $response = json_decode($response);

          var_dump($response->result);
        return $this->render('AppBundle:Station:add.html.twig', array(

        ));


    }

}
