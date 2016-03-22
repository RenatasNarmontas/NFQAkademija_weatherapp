<?php

namespace NfqAkademija\WeatherBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/city/Vilnius');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertContains('You\'ve asked for: Vilnius', $crawler->filter('body > h1:nth-child(1)')->text());
    }
}
