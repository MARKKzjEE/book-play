<?php

namespace Tests\Unit;

use App\Establecimiento;
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
     * @test
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    /**
     * @test
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

    /**
     * @test
     */
    public function testtimenextbook(){
        $fakeBook = factory(Reserva::class,1)->create([
            'id' => 9999,
            'id_pista' => 50,
            'hora_inicio' => '2019-05-12 12:00',
            'fecha_reserva' => '2019-05-12',
        ]);
        $fakeBook2 = factory(Reserva::class,1)->create([
            'id' => 10000,
            'id_pista' => 50,
            'hora_inicio' => '2019-05-12 16:00',
            'fecha_reserva' => '2019-05-12',
        ]);
        $BookQuery = Reserva::timenextbook(50,'2019-05-12 11:00', '2019-05-12');
        $this->assertTrue($BookQuery[0]->hora_inicio == '2019-05-12 12:00');
        $this->assertFalse($BookQuery[0]->hora_inicio == '2019-05-12 16:00');
        $BookQuery = Reserva::timenextbook(50,'2019-05-12 12:30', '2019-05-12');
        $this->assertFalse($BookQuery[0]->hora_inicio == '2019-05-12 12:00');
        $this->assertTrue($BookQuery[0]->hora_inicio == '2019-05-12 16:00');
        $BookQuery = Reserva::timenextbook(50,'2019-05-12 13:00', '2019-05-12');
        $this->assertFalse($BookQuery[0]->hora_inicio == '2019-05-12 12:00');
        $this->assertTrue($BookQuery[0]->hora_inicio == '2019-05-12 16:00');
        $BookQuery = Reserva::timenextbook(50,'2019-05-12 16:00', '2019-05-12');
        $this->assertTrue(sizeof($BookQuery) == 0);
        $BookQuery = Reserva::timenextbook(50,'2019-05-12 18:00', '2019-05-13');
        $this->assertTrue(sizeof($BookQuery) == 0);
        $BookQuery = Reserva::timenextbook(50,'2019-05-13 13:00', '2019-05-12');
        $this->assertTrue(sizeof($BookQuery) == 0);
    }

    public function testdatosreserva(){
        $fakePista = factory(Pista::class,1)->create([
            'id' => 5000,
            'id_club' => 4545,
            'nombre' => 'Pista',
            'cerramiento' => 'Interior',
            'superficie' => 'Cesped',
            'pared' => 'Muro',
            'id_deporte' => '3',
        ]);
        $fakeClub = factory(Establecimiento::class,1)->create([
            'id' => 4545,
            'nombre' => 'NombreClub',
            'hora_final' => '2019-05-12 22:00'
        ]);
        $fakeBook3 = factory(Reserva::class,1)->create([
            'id' => 1002,
            'id_pista' => 5000,
            'hora_inicio' => '2019-05-12 16:00',
            'hora_final' => '2019-05-12 17:30',
            'fecha_reserva' => '2019-05-12',
        ]);
        $fakeBook = factory(Reserva::class,1)->create([
            'id' => 1000,
            'id_pista' => 5000,
            'hora_inicio' => '2019-05-12 12:00',
            'hora_final' => '2019-05-12 14:00',
            'fecha_reserva' => '2019-05-12',
        ]);
        $fakeBook2 = factory(Reserva::class,1)->create([
            'id' => 1001,
            'id_pista' => 5000,
            'hora_inicio' => '2019-05-12 15:00',
            'hora_final' => '2019-05-12 16:00',
            'fecha_reserva' => '2019-05-12',
        ]);
        $fakeBook4 = factory(Reserva::class,1)->create([
            'id' => 1003,
            'id_pista' => 5000,
            'hora_inicio' => '2019-05-13 18:00',
            'hora_final' => '2019-05-13 19:00',
            'fecha_reserva' => '2019-05-13',
        ]);


        $BookQuery = Reserva::datosreserva(4545,'2019-05-12');
        $this->assertTrue($BookQuery[0]->hora_inicio == '2019-05-12 12:00');
        $this->assertTrue($BookQuery[1]->hora_inicio == '2019-05-12 15:00');
        $this->assertTrue($BookQuery[2]->hora_inicio == '2019-05-12 16:00');
        $BookQuery = Reserva::datosreserva(4545,'2019-05-13');
        $this->assertTrue($BookQuery[0]->hora_inicio == '2019-05-13 18:00');
    }

    public function testdatosreservafilter(){
        $fakeClub = factory(Establecimiento::class,1)->create([
            'id' => 4545,
            'hora_final' => '2019-05-12 22:00'
        ]);
        $fakePista = factory(Pista::class,1)->create([
            'id' => 999,
            'id_club' => 4545,
            'nombre' => 'Pista1',
            'cerramiento' => 'Exterior',
            'superficie' => 'Cesped',
            'pared' => 'Muro',
            'id_deporte' => '3',
        ]);
        $fakePista2 = factory(Pista::class,1)->create([
            'id' => 1000,
            'id_club' => 4545,
            'nombre' => 'Pista2',
            'cerramiento' => 'Interior',
            'superficie' => 'Cesped',
            'pared' => 'Muro',
            'id_deporte' => '3',
        ]);
        $fakeBook = factory(Reserva::class,1)->create([
            'id' => 1000,
            'id_pista' => 999,
            'hora_inicio' => '2019-05-12 12:00',
            'hora_final' => '2019-05-12 14:00',
            'fecha_reserva' => '2019-05-12',
        ]);
        $fakeBook2 = factory(Reserva::class,1)->create([
            'id' => 1001,
            'id_pista' => 1000,
            'hora_inicio' => '2019-05-12 15:00',
            'hora_final' => '2019-05-12 16:00',
            'fecha_reserva' => '2019-05-12',
        ]);
        $BookQuery = Reserva::datosreservafilter('Cesped', 'Interior', 'Muro', 3, '2019-05-12', 4545);
        $this->assertTrue($BookQuery[0]->hora_inicio == '2019-05-12 15:00');
        $this->assertFalse($BookQuery[0]->hora_inicio == '2019-05-12 12:00');
        $BookQuery = Reserva::datosreservafilter('Cesped', 'Exterior', 'Muro', 3, '2019-05-12', 4545);
        $this->assertTrue($BookQuery[0]->hora_inicio == '2019-05-12 12:00');
        $this->assertFalse($BookQuery[0]->hora_inicio == '2019-05-12 15:00');
        $BookQuery = Reserva::datosreservafilter('Cesped', -1, 'Muro', 3, '2019-05-12', 4545);
        $this->assertTrue($BookQuery[0]->hora_inicio == '2019-05-12 12:00');
        $this->assertTrue($BookQuery[1]->hora_inicio == '2019-05-12 15:00');
        $BookQuery = Reserva::datosreservafilter('Tierra', -1, 'Muro', 3, '2019-05-12', 4545);
        //$this->assertFalse($BookQuery[0]->hora_inicio == '2019-05-12 12:00');
        //$this->assertFalse($BookQuery[1]->hora_inicio == '2019-05-12 15:00');
    }
}
