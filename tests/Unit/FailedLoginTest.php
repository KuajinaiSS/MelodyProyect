<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FailedLoginTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function testFailedLogin()
    {

        $user = User::create([
            'name' => 'juan',
            'email' => 'juanito@lol.cl',
            'password' => bcrypt('juanitoeslaley123'),
            'role' => 0
        ]);

        $response = $this->post('login',[
            'email' => 'juanito@lol.cl',
            'password' => 'pass'
        ]);


        $response->assertStatus(422); //Verifica credenciales incorrectas.
        $this->assertFalse(Auth::check());//Verifica que el usuario no esté autenticado.
    }
}
