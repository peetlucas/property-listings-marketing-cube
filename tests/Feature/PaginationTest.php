<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaginationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_pagination_home_page(): void
    {
        $response = $this->visit('/')
                    ->click('/?page=2')
                    ->seePageIs('/?page=2');
                    //$response->see('/?page=2');

        $response->assertStatus(200);        
             
    }
}
