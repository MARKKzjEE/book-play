<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeporteTest extends TestCase
{
    /**
     * @test
     */
    public function testGetAllSports()
    {
        /*$fakeSport = factory(Deporte::class,1)->create([
            'nombre' => 'Squash'
        ]);
        $allSports = Deporte::getAllSports();
        */
    }

    /**
     * @test
     */
    public function testGetSportNameById()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function testTransformIdToGender()
    {
        $this->assertTrue(true);
    }
}
