<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function testGetProfile()
    {
        $fakeUser = factory(User::class,1)->create([
            'id' => 454545,
            'username' => 'nombreapellido'
        ]);
        $user = User::profileinfo($fakeUser[0]->id);
        $this->assertDatabaseHas('users',[
            'username' => $fakeUser[0]->username
        ]);
    }

    /**
     * @test
     */
    public function testEditProfilePrivate()
    {
        $fakeUser = factory(User::class,1)->create([
            'id' => 454545,
            'username' => 'lolaperez',
            'descripcion' => 'Nivel medio'
        ]);
        $userEdited = User::editprivateprofile($fakeUser[0]->username, $fakeUser[0]->descripcion, $fakeUser[0]->id);
        $this->assertDatabaseMissing('users',[
            'username' => $fakeUser[0]->username
        ]);
        $this->assertDatabaseHas('users',[
            'descripcion' => $fakeUser[0]->descripcion
        ]);
    }
    /**
     * @test
     */
    public function testEditProfilePublic()
    {
        $fakeUser = factory(User::class,1)->create([
            'id' => 454545,
            'username' => 'lolaperez',
            'descripcion' => 'Nivel medio',
            'name' => 'Paco Prat',
            'email' => 'pacoprat@gmail.com',
            'codigo_postal' => '08020',
            'telefono' => '666123456',
            'ciudad' => 'Barcelona',
            'direccion' => 'Calle Pelayo',
        ]);
        $userEdited = User::editpublicprofile($fakeUser[0]->id, 'Alex pro', 'emailfalso@gmail.com', '612345678', '08021', 'Tarragona', 'Calle Huelva');
        $this->assertDatabaseMissing('users',[
            'name' => $fakeUser[0]->name
        ]);
        $this->assertDatabaseMissing('users',[
            'descripcion' => $fakeUser[0]->email
        ]);
        $this->assertDatabaseMissing('users',[
            'codigo_postal' => $fakeUser[0]->codigo_postal
        ]);
        $this->assertDatabaseMissing('users',[
            'telefono' => $fakeUser[0]->telefono
        ]);
        $this->assertDatabaseMissing('users',[
            'ciudad' => $fakeUser[0]->ciudad
        ]);
        $this->assertDatabaseMissing('users',[
            'direccion' => $fakeUser[0]->direccion
        ]);
    }


}
