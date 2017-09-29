<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Debug\Debug;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class StationController extends Controller
{
    private $url = 'https://api.feedback.quantumlab.co/v1';
    private $key = "c648c405-af1f-4286-b7fb-47eec4e7e565";

    function curlIt($json){
        $ch = curl_init( $this->url );
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec( $ch );
        return json_decode($response);
    }

    /**
     * @Route("/list")
     */
    public function listAction()
    {
        $json = '{     "jsonrpc": "2.0",     "method": "station_list",     "params": {            "key": "'. $this->key .'"     },     "id": 1 }';
        $result = $this->curlIt($json)->result;
        return $this->render('AppBundle:Station:list.html.twig', array(
            "stations" => $result
        ));
    }

    /**
     * @Route("/add")
     */
    public function addAction()
    {
        $json = '{     "jsonrpc": "2.0",     "method": "location_list",     "params": {         "key": "'.$this->key.'"     },     "id": 1 }';
        $result = $this->curlIt($json)->result;
        return $this->render('AppBundle:Station:add.html.twig', array(
            "locations" => $result
        ));

    }

    /**
     * @Route("/add/submit")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addSubmitAction(Request $request)
    {
        $name = $request->request->get("name");
        $location = $request->request->get("location");
        $json = '{
            "jsonrpc": "2.0",
            "method": "station_create",
            "params": {
                "key": "'.$this->key.'",
            "locationUuid": "'.$location.'",
            "metaData": {
                "name": "'.$name.'"
            }
            },
            "id": 1
        }';
        $json = '{     "jsonrpc": "2.0",     "method": "location_list",     "params": {         "key": "'.$this->key.'"     },     "id": 1 }';
        $result = $this->curlIt($json)->result;
        return $this->render('AppBundle:Station:add.html.twig', array(
            "locations" => $result
        ));

    }

    /**
     * @Route("/remove")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function removeAction(Request $request)
    {
        $uuid = $request->request->get("uuid");
        $json = '{
            "jsonrpc": "2.0",
            "method": "station_remove",
            "params": {
                "key": "'.$this->key.'",
                "uuid": "'.$uuid.'"
            },
            "id": 1
        }';
        $result = $this->curlIt($json);
        $json = '{     "jsonrpc": "2.0",     "method": "station_list",     "params": {            "key": "'. $this->key .'"     },     "id": 1 }';
        $result = $this->curlIt($json)->result;
        return $this->render('AppBundle:Station:list.html.twig', array(
            "stations" => $result
        ));

    }

    



}
