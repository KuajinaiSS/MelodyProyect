<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;

class SuccessRegisterTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testSuccessRegister(){
        $data = [
            'name' => 'juan',
            'email' => 'juan@email.com',
            'password' => 'juanjuan123'
        ];

        $response = $this->post('register',$data);

        $response->assertStatus(302);
        $this->assertTrue(Auth::check());
        $response->assertRedirect('home');
    }

}
