<?php

namespace Tests\Unit;

use Tests\TestCase;


class FailedRegisterTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testFailedRegister()
    {
        $dataWrongPassword = [
            'name' => 'juan',
            'email' => 'juan@email.com',
            'password' => 'juan'
        ];

        $responseWrongPasword = $this->post('register',$dataWrongPassword);

        $responseWrongPasword->assertStatus(302);
        $responseWrongPasword->assertSessionHasErrors([
            'password'
        ]);

        $dataWrongName = [
            'name' => 'j',
            'email' => 'juan@email.com',
            'password' => 'juanjuan123'
        ];

        $responseWrongName = $this->post('register',$dataWrongName);

        $responseWrongName->assertStatus(302);
        $responseWrongName->assertSessionHasErrors([
            'name'
        ]);

        $dataWrongEmail = [
            'name' => 'juan',
            'email' => 'juan',
            'password' => 'juanjuan123'
        ];

        $responseWrongEmail = $this->post('register',$dataWrongEmail);

        $responseWrongEmail->assertStatus(302);
        $responseWrongEmail->assertSessionHasErrors([
            'email'
        ]);
    }
}
