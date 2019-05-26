<?php

namespace Tests\Unit;

use App\Pista;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Establecimiento;

class EstablecimientoTest extends TestCase
{
    use RefreshDatabase;
    /** 
     * @test
     */
    public function testGetAllClubsVip()
    {
        $arrayClubsVip = Establecimiento::getAllClubsVip();
        foreach ($arrayClubsVip as $club) {
            $this->assertTrue($club->prioridad == 1);
        }
    }

    /** 
     * @test
     */
    public function testGetClubById()
    {
        $fakeClub = factory(Establecimiento::class,1)->create([
            'nombre' => 'Futbol Club Hospitalet',
            'id' => 4545
        ]);
        $clubQuery = Establecimiento::getClubById($fakeClub[0]->id);
        $this->assertTrue($clubQuery->id == 4545);
    }
    /**
     * @test
     */
    public function testGetaAllClubs(){
        $fakeClub = factory(Establecimiento::class,1)->create([
            'nombre' => 'Futbol Club Hospitalet',
            'id' => 4545
        ]);
        $clubs = Establecimiento::getAllClubs();
        foreach ($clubs as $club) {
            if($club->id == 4545){
                $this->assertTrue($club->nombre == $fakeClub[0]->nombre);
            }
        }
    }
    /**
     * @test
     */
    public function testDeleteClub(){
        $fakeClub = factory(Establecimiento::class,1)->create([
            'nombre' => 'Futbol Club Hospitalet',
            'id' => 4545
        ]);
        Establecimiento::deleteClub(4545);
        $this->assertDatabaseMissing('establecimiento',[
            'nombre' => 'Futbol Club Hospitalet',
            'id' => 4545
        ]);

    }
    /**
     * @test
     */
    public function testdatosestablecimiento()
    {
        $fakeClub = factory(Establecimiento::class,1)->create([
            'id' => 4545,
            'hora_inicio' => '2019-05-12 08:00:00',
            'hora_final' => '2019-05-12 22:00'
        ]);
        $clubQuery = Establecimiento::datosestablecimiento($fakeClub[0]->id);
        $this->assertTrue($clubQuery[0]->hora_inicio == '2019-05-12 08:00:00');
        $this->assertTrue($clubQuery[0]->hora_final == '2019-05-12 22:00');
    }
    /**
     * @test
     */
    public function testdatosestablecimientoidpista(){

        $fakePista = factory(Pista::class,1)->create([
            'id' => 999,
            'id_club' => 4545
        ]);
        $fakeClub = factory(Establecimiento::class,1)->create([
            'id' => 4545,
            'hora_final' => '2019-05-12 22:00'
        ]);
        $clubQuery = Establecimiento::datosestablecimientoidpista($fakePista[0]->id);
//        var_dump($clubQuery);
        $this->assertTrue($clubQuery[0]->hora_inicio == '2019-05-12 22:00');
        $this->assertTrue($clubQuery[0]->id_pista == 999);
    }

}
