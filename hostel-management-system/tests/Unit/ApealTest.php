<?php

namespace Tests\Unit;
use Tests\TestCase;
use App\Models\User;


use Illuminate\Foundation\Testing\RefreshDatabase;

class ApealTest extends TestCase
{

    public function test_apeal_form_route()
    {
        $response =$this->get('/appeal');
        $response->assertStatus(200);
    }


    public function test_insert_appeal_route()
    {
        $response =$this->get('/insert_appeal');
        $response->assertStatus(200);
    }


    // public function test_appeal__student_Id()
    // {
    //     $appeal = Appeal::factory()->create();
    //     $this->assertNoEmpty($appeal->student_Id);
    // }

}
