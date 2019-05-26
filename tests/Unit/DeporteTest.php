<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Deporte;

class DeporteTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function testGetAllSports()
    {
        $fakeSport = factory(Deporte::class,1)->create([
            'id' => 454545,
            'nombre' => 'Squash'
        ]);
        $allSports = Deporte::getAllSports();
        $this->assertDatabaseHas('deporte',[
            'nombre' => 'Squash'
        ]);
    }

    /**
     * @test
     */
    public function testGetSportNameById()
    {
        $fakeSport = factory(Deporte::class,1)->create([
            'id' => 454545,
            'nombre' => 'Beisbol'
        ]);
        $sport = Deporte::getSportNameById($fakeSport[0]->id);
        $this->assertTrue($fakeSport[0]->nombre == $sport);
    }

    /**
     * @test
     */
    public function testTransformIdToGender()
    {
        $gender1 = Deporte::transformIdToGender(1);
        $this->assertTrue($gender1 == 'Masculino');
        $gender2 = Deporte::transformIdToGender(2);
        $this->assertTrue($gender2 == 'Femenino');
        $gender3 = Deporte::transformIdToGender(3);
        $this->assertTrue($gender3 == 'Mixto');
        $gender4 = Deporte::transformIdToGender(4);
        $this->assertTrue($gender4 == 'Mixto');
        $gender5 = Deporte::transformIdToGender('acb');
        $this->assertTrue($gender5 == 'Mixto');
    }
    /**
     * @test
     */
    public function testDeleteSport(){
        $fakeSport = factory(Deporte::class,1)->create([
            'id' => 454545,
            'nombre' => 'Squash'
        ]);
        $this->assertDatabaseHas('deporte',[
            'nombre' => 'Squash'
        ]);
        Deporte::deleteSport($fakeSport[0]->id);
        $this->assertDatabaseMissing('deporte',[
            'nombre' => 'Squash'
        ]);
    }
    public function testdatosdeporte(){

        $fakeSport = factory(Deporte::class,1)->create([
            'id' => 454544,
            'nombre' => 'Padel'
        ]);
        $fakeSport2 = factory(Deporte::class,1)->create([
            'id' => 454545,
            'nombre' => 'Basquet'
        ]);
        $fakeSport3 = factory(Deporte::class,1)->create([
            'id' => 454546,
            'nombre' => 'Beisbol'
        ]);

        $SportQuery = Deporte::datosdeporte();
        $length = (sizeof($SportQuery));
        var_dump($SportQuery);

        $this->assertTrue($SportQuery[$length-1]->id_deporte == 454546);
        $this->assertTrue($SportQuery[$length-2]->id_deporte == 454545);
        $this->assertTrue($SportQuery[$length-3]->id_deporte == 454544);
        $this->assertTrue($SportQuery[$length-1]->nombre_deporte == 'Beisbol');
        $this->assertTrue($SportQuery[$length-2]->nombre_deporte == 'Basquet');
        $this->assertTrue($SportQuery[$length-3]->nombre_deporte == 'Padel');
        $this->assertFalse($SportQuery[$length-1]->id_deporte == 454544);
        $this->assertFalse($SportQuery[$length-2]->id_deporte == 454546);
        $this->assertFalse($SportQuery[$length-3]->id_deporte == 454545);
        $this->assertFalse($SportQuery[$length-1]->nombre_deporte == 'Padel');
        $this->assertFalse($SportQuery[$length-2]->nombre_deporte == 'Beisbol');
        $this->assertFalse($SportQuery[$length-3]->nombre_deporte == 'Basquet');
    }
}
