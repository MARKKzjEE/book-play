<?php

namespace Tests\Unit;

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

    





}
