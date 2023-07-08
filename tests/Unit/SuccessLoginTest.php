<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function testSuccessLogin()
    {

        $user = User::create([
            'name' => 'juan',
            'email' => 'juanito@lol.cl',
            'password' => bcrypt('juanitoeslaley123'),
            'role' => 0
        ]);

        $response = $this->post('login',[
            'email' => 'juanito@lol.cl',
            'password' => 'juanitoeslaley123'
        ]);

        $response->assertStatus(302); //Verifica credenciales (redirrección correcta a la ruta del login con la data).
        $response->assertRedirect('home'); //Verifica redireccion correcta a vista "home".
        $this->assertAuthenticatedAs($user); //Verifica si el usuario queda autenticado en el sistema.

    }


}
