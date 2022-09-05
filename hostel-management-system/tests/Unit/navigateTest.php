<?php

namespace Tests\Unit;

use Tests\TestCase;

class navigateTest extends TestCase
{
    
    public function test_login_form()
    {
        $response =$this->get('/login');
        $response->assertStatus(200);
    }

    public function test_apeal_form()
    {
        $response =$this->get('/appeal');
        $response->assertStatus(200);
    }

    public function test_insert_appeal()
    {
        $response =$this->get('/insert_appeal');
        $response->assertStatus(200);
    }

    public function profiles()
    {
        $response =$this->get('/profile');
        $response->assertStatus(200);
    }
    
    // public function test_user_duplication()
    // {
    //     $user1 = User::make([
    //         'email' => 'warden1@uwu.ac.lk',
    //         'password' => 'wpw1'
    //     ]);

    //     $user2 = User::make([
    //         'email' => 'warden2@uwu.ac.lk',
    //         'password' => 'wpw2'
    //         ]);

    //     $this->asseretTrue($user1->email != $user2->email);    
    // }

    // public function test_new_user() {
    //     $response = $this->post('/profile', [
    //         'firstname' => "Wardeb",
    //         'lastname' => " ",
    //         'email' => "warden@uwu.ac.lk",
    //         'email_verified_at' => now(),
    //         'password' => bcrypt('12345678'),
    //     ]);

    //     $response->assertRedirect('/');
    // }



}
