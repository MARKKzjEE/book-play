<?php
/**
 * Created by PhpStorm.
 * User: alber
 * Date: 27/05/2019
 * Time: 17:53
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ServiciosTest extends Model
{
    /**
     * @test
     */
    public function testgetAllServices(){
        $fakeService = factory(Servicio::class,1)->create([
            'id'=> 92,
            'nombre' => 'Jacuzzi'
        ]);
        Servicio::getAllServices();
        $this->assertDatabaseHas('servicio',[
            'nombre' => 'Jacuzzi'
        ]);
    }
    /**
     * @test
     */
    public function testDeleteService(){
        $fakeService = factory(Servicio::class,1)->create([
            'id' => 21,
            'nombre' => 'Guarderia'
        ]);
        $this->assertDatabaseHas('servicio',[
            'nombre' => 'Guarderia'
        ]);
        Servicio::deleteService($fakeService[0]->id);
        $this->assertDatabaseMissing('servicio',[
            'nombre' => 'Guarderia'
        ]);
    }
}
