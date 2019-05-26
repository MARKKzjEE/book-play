<?php

namespace Tests\Unit;

use App\Pista;
use App\Reserva;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DB;

class ReservaTest extends TestCase
{
    use RefreshDatabase;

    /**
     @test
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    /**
    @test
     */
    public function testdeletebook(){
        $fakeBook = factory(Reserva::class,1)->create([
            'id' => 9999
        ]);
        $this->assertDatabaseHas('reserva', [
            'id' => 9999
        ]);
        Reserva::deletebook($fakeBook[0]->id, 0);
        $this->assertDatabaseMissing('reserva', [
            'id' => 9999
        ]);
    }
}
