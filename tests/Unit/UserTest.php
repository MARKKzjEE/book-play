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

        $userEdited = User::editprivateprofile('Arnau Rovira', 'Descripcion', $fakeUser[0]->id);
        $this->assertDatabaseMissing('users',[
            'username' => 'lolaperez'
        ]);
        $this->assertDatabaseHas('users',[
            'descripcion' => 'Descripcion'
        ]);
    }
    /**
     * @test
     */
    public function testEditProfilePublic()
    {
        $fakeUser2 = factory(User::class,1)->create([
            'id' => 5234,
            'name' => 'Paco Prat',
            'email' => 'pacoprat@gmail.com',
            'codigo_postal' => '08025',
            'telefono' => '666123456',
            'ciudad' => 'Lleida',
            'direccion' => 'Calle Pelayo'
        ]);
        $userEdited = User::editpublicprofile(5234, 'Alex pro', 'emailfalso@gmail.com', '612345678', '08021', 'Tarragona', 'Calle Huelva');
        //var_dump($fakeUser[0][1]);
        $this->assertDatabaseMissing('users',[
            'name' => 'Paco Prat'
        ]);

        $this->assertDatabaseMissing('users',[
            'codigo_postal' =>  '08025'
        ]);
        $this->assertDatabaseMissing('users',[
            'telefono' => '666123456'
        ]);
        $this->assertDatabaseMissing('users',[
            'ciudad' => 'Lleida'
        ]);
        $this->assertDatabaseMissing('users',[
            'direccion' => 'Calle Pelayo'
        ]);
    }


}
