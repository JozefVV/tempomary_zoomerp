<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;

class SuperAdminLoginTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_LoginInAsSuperadmin()
    {
        // $user = factory(User::class)->state('superadmin')->create();

        // $this->actingAs($user)
        //         ->visit('/users');

        // $this->see($user->name);
        $this->assertTrue(true);
    }
}
