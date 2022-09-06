<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class navigateTest extends TestCase
{
   use RefreshDatabase; 
    public function test_login_form()
    {
        $response =$this->get('/login');
        $response->assertStatus(200);
    }


    public function profiles()
    {
        $response =$this->get('/profile');
        $response->assertStatus(200);
    }
    
    public function test_user_duplication()
    {
        $user1 = User::make([
            'email' => 'warden1@uwu.ac.lk',
            'password' => 'wpw1'
        ]);

        $user2 = User::make([
            'email' => 'warden2@uwu.ac.lk',
            'password' => 'wpw2'
            ]);
   
        $this->assertTrue($user1->email != $user2->email);    
    }


    // public function test_auth_user_can_access_dashboard()
    // {
    //     $user = User::factory()->create();

    //     $response =$this->actingAs($user)->get('/');
    //     $response->assertStatus(200);
    // }

    // public function test_unauth_user_cannot_access_dashboard()
    // {
    //     $response =$this->get('/');
    //     $response->assertStatus(302);
    //     $response->assertRedirect('/login');

    // }


    // public function test_new_user() {
    //     $response = $this->post('student/profile', [
    //         'firstname' => "Wardeb",
    //         'lastname' => " ",
    //         'email' => "warden@uwu.ac.lk",
    //         'email_verified_at' => now(),
    //         'password' => bcrypt('12345678'),
    //     ]);

    //     $response->assertRedirect('/profile');
    // }



}
