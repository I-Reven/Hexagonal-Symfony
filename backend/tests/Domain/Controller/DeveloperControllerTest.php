<?php

namespace App\Tests\Domain\Controller;

use App\Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DeveloperControllerTest
 * @package App\Tests\Domain\Controller
 * @coversDefaultClass \App\Domain\Controller\DeveloperController
 */
class DeveloperControllerTest extends TestCase
{
    /**
     * @test
     * @covers ::getAll
     * @covers ::__construct
     */
    public function itShouldReturnStatusCode200WhenGetDevelopers()
    {
        $client = $this->createClient();
        $client->request('GET', '/api/developers');

        $this->assertEquals(Response::HTTP_OK, $client->getResponse()->getStatusCode());
    }
}