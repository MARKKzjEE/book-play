<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Pista;
use App\Establecimiento;
use App\Deporte;

class PistaTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @test
     */
    public function testGetAllPistas()
    {
        $fakePista = factory(Pista::class,1)->create([
            'id' => 4545
        ]);
        $pistas = Pista::getAllPistas();
        foreach ($pistas as $pista) {
            if($pista->id == 4545){
                $this->assertTrue($pista->id == $fakePista[0]->id);
            }
        }
        

    }
    /**
     * A basic unit test example.
     *
     * @test
     */
    public function testDeleteField()
    {
        $fakePista = factory(Pista::class,1)->create([
            'id' => 4545,
            'id_club' => factory(Establecimiento::Class,1)->create([
                'id' => 9999
            ]),
        ]);
        Pista::deleteField(4545);
        $this->assertDatabaseMissing('pista',[
            'id' => 4545
        ]);
        
    }
}
