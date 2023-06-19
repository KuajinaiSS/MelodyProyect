<?php

namespace Tests\Unit;

use Tests\TestCase;


class SuccessConcertTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testSuccessRegister(){
        $data = [
            'concertName' => 'Concierto lol',
            'price' => '50000',
            'stock' => '300',
            'date' => '2023-10-25'
        ];

        $response = $this->post('concert_create',$data);

        $response->assertStatus(302);

    }
}
