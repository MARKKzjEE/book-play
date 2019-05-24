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
     * A basic unit test example.
     *
     * @return void
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
}
