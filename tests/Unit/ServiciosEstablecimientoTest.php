<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Establecimiento;
use App\Servicio;
use App\ServiciosEstablecimiento;

class ServiciosEstablecimientoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function testgetAllServicesByClubId()
    {
        $fakeClub = factory(Establecimiento::class,1)->create([
            'id' => 4444,
            'nombre' => 'Futbol Club Hospitalet'
        ]);
        $fakeService = factory(Servicio::class,1)->create([
            'id'=> 2222,
            'nombre' => 'Cockteleria'
        ]);
        factory(ServiciosEstablecimiento::class,1)->create([
            'id_servicio' => 2222,
            'id_club' => 4444
        ]);
        $services = ServiciosEstablecimiento::getAllServicesByClubId($fakeClub[0]->id);
        foreach ($services as $service) {
            $this->assertTrue($service->nombre == $fakeService[0]->nombre);
        }
    }
}
