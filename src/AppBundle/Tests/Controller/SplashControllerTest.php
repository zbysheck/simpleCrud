<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SplashControllerTest extends WebTestCase
{
    public function testFirst()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/first');
    }

    public function testSecond()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/second');
    }

}
