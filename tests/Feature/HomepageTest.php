<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;
    
    
    /** @test */
    public function aGuestCanSeeAllStarredClubs(){

        $first = factory(App/Establecimiento::class,6)->create();


        $response = $this->get('/');
        $response->assertStatus(200);


    }
}
