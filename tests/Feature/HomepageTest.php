<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Establecimiento;

class HomepageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function testOnlyClubsVipShowsInHomepage()
    {
        factory(Establecimiento::class,1)->create([
            'nombre' => 'TestClub1',
            'prioridad' => 1
        ]);
        factory(Establecimiento::class,1)->create([
            'nombre' => 'TestClub2',
            'prioridad' => 2
        ]);
        
        $this->assertDatabaseHas('establecimiento',[
            'nombre' => 'TestClub1' 
        ]);
        $this->assertDatabaseHas('establecimiento',[
            'nombre' => 'TestClub2'
        ]);
        $response = $this->get('/');
        $response
            ->assertStatus(200)
            ->assertSee('TestClub1')
            ->assertDontSee('TestClub2');
    }
}
