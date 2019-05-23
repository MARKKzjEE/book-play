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
}
