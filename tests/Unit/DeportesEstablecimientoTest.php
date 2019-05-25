<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Establecimiento;
use App\Deporte;
use App\DeportesEstablecimiento;

class DeportesEstablecimientoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function testAllSportByClubId()
    {
        $fakeClub = factory(Establecimiento::class,1)->create([
            'id' => 4444,
            'nombre' => 'Futbol Club Hospitalet'
        ]);

        $fakeSport = factory(Deporte::class,1)->create([
            'id' => 33,
            'nombre' => 'Squash'
        ]);

        factory(DeportesEstablecimiento::class,1)->create([
            'id_club' => 4444,
            'id_deporte' => 33
        ]);
        $sports = DeportesEstablecimiento::getAllSportByClubId($fakeClub[0]->id);
        foreach ($sports as $sport) {
            $this->assertTrue($sport->nombre == $fakeSport[0]->nombre);
        }
    }
    /**
     * @test
     */
    public function testGetAllSportByClubId(){
        $fakeSport= factory(Deporte::class,1)->create([
            'id' => 33,
        ]);
        factory(DeportesEstablecimiento::class,1)->create([
            'id_deporte' => 33,
            'id_club' => 99,
        ]);
        factory(Establecimiento::class,1)->create([
            'id' => 99,
        ]);
        $sports = DeportesEstablecimiento::getAllSportByClubId(99);
        $this->assertTrue($sports[0]->id_deporte == $fakeSport[0]->id);

        $sports = DeportesEstablecimiento::getAllSportByClubId(999);
        $this->assertTrue($sports == null);
        
        $sports = DeportesEstablecimiento::getAllSportByClubId("string");
        $this->assertTrue($sports == null);

        $sports = DeportesEstablecimiento::getAllSportByClubId(-1);
        $this->assertTrue($sports == null);

        $sports = DeportesEstablecimiento::getAllSportByClubId(0);
        $this->assertTrue($sports == null);
    }
    /**
     * @test
     */
    public function testDeleteByClubId(){
        factory(DeportesEstablecimiento::class,1)->create([
            'id_deporte' => factory(Deporte::class,1)->create([
                'id' => 88
            ]) ,
            'id_club' => factory(Establecimiento::class,1)->create([
                'id' => 333
            ])
        ]);
        DeportesEstablecimiento::deleteByClubId(3333);
        $this->assertDatabaseMissing('deportes_establecimiento',[
            'id_deporte' => '88',
            'id_club' => '333'
        ]);
    }
    /**
     * @test
     */
    public function testDeleteBySportId(){
        factory(DeportesEstablecimiento::class,1)->create([
            'id_deporte' => factory(Deporte::class,1)->create([
                'id' => 88
            ]) ,
            'id_club' => factory(Establecimiento::class,1)->create([
                'id' => 333
            ])
        ]);
        DeportesEstablecimiento::deleteBySportId(88);
        $this->assertDatabaseMissing('deportes_establecimiento',[
            'id_deporte' => '88',
            'id_club' => '333'
        ]);
    }

























}
