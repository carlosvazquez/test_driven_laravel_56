<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoutesTest extends TestCase
{
    /** @test */
    public function get_concert_list()
    {
        $response = $this->get('/concerts');
        $response->assertStatus(200);
    }
}
