<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    public function testTeamApiTest()
    {
        $response = $this->get('/api/team');

        $response->assertStatus(200);
    }

   /** @test */
    public function testPlayerApiTest()
    {
        $response = $this->get('/api/player/2');

        $response->assertStatus(200);
    }


}
