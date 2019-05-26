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

    public function testgetpreciopista(){
        $fakePista = factory(Pista::class,1)->create([
            'id' => 4545,
            'id_club' => factory(Establecimiento::Class,1)->create([
                'id' => 9999
            ]),
            'precio' => 4
        ]);
        $PistaQuery = Pista::getpreciopista($fakePista[0]->id);

        $this->assertFalse($PistaQuery[0]->preciopista == 3);
        $this->assertTrue($PistaQuery[0]->preciopista == 4);
    }

    public function testdatospistafilter(){
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
        $fakeClub = factory(Establecimiento::class,1)->create([
            'id' => 4545,
            'hora_final' => '2019-05-12 22:00'
        ]);
        $PistaQuery = Pista::datospistafilter('Cesped','Exterior','Muro', 3, null,4545);
        $this->assertTrue($PistaQuery[0]->nombrepista == 'Pista1');
        $this->assertFalse($PistaQuery[0]->nombrepista == 'Pista2');
        $this->assertTrue($PistaQuery[0]->id_pista == 999);
        $this->assertFalse($PistaQuery[0]->id_pista == 1000);
        $PistaQuery = Pista::datospistafilter('Cesped','Interior','Muro', 3, null,4545);
        $this->assertFalse($PistaQuery[0]->nombrepista == 'Pista1');
        $this->assertTrue($PistaQuery[0]->nombrepista == 'Pista2');
        $this->assertFalse($PistaQuery[0]->id_pista == 999);
        $this->assertTrue($PistaQuery[0]->id_pista == 1000);
        $PistaQuery = Pista::datospistafilter('Cesped',-1,-1, 3, null,4545);
        $this->assertTrue($PistaQuery[0]->nombrepista == 'Pista1');
        $this->assertTrue($PistaQuery[1]->nombrepista == 'Pista2');
        $this->assertTrue($PistaQuery[0]->id_pista == 999);
        $this->assertTrue($PistaQuery[1]->id_pista == 1000);
    }
    public function testdatospista()
    {
        $fakePista = factory(Pista::class, 1)->create([
            'id' => 999,
            'id_club' => 4545,
            'nombre' => 'Pista1',
            'cerramiento' => 'Exterior',
            'superficie' => 'Cesped',
            'pared' => 'Muro',
            'id_deporte' => '3',
        ]);
        $fakePista2 = factory(Pista::class, 1)->create([
            'id' => 1000,
            'id_club' => 4545,
            'nombre' => 'Pista2',
            'cerramiento' => 'Interior',
            'superficie' => 'Cesped',
            'pared' => 'Muro',
            'id_deporte' => '3',
        ]);
        $fakeClub = factory(Establecimiento::class,1)->create([
            'id' => 4545
        ]);
        $PistaQuery = Pista::datospista(4545);
        $this->assertTrue($PistaQuery[0]->id_pista == 999);
        $this->assertFalse($PistaQuery[0]->id_pista == 998);
        $this->assertFalse($PistaQuery[0]->id_pista == 1000);
        $this->assertTrue($PistaQuery[1]->id_pista == 1000);
        $this->assertFalse($PistaQuery[1]->id_pista == 1001);
        $this->assertFalse($PistaQuery[1]->id_pista == 999);
        $this->assertTrue($PistaQuery[0]->nombrepista == 'Pista1');
        $this->assertFalse($PistaQuery[0]->nombrepista == 'Pista2');
        $this->assertFalse($PistaQuery[0]->nombrepista == 'Pista3');
        $this->assertTrue($PistaQuery[1]->nombrepista == 'Pista2');
        $this->assertFalse($PistaQuery[1]->nombrepista == 'Pista1');
        $this->assertFalse($PistaQuery[1]->nombrepista == 'Pista3');
    }
}