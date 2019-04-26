<?php

namespace Tests\Browser\Feature;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTests extends DuskTestCase
{
    /**
     * Basic login test, user can login to application
     *
     * @return void
     */
    public function test_basic_login()
    {
        $user = factory(User::class)->state('superadmin')->create();


        $response = $this->actingAs($user)
                         ->get('/dashboard');

        $response
            ->assertStatus(200)
            ->assertSee($user->firstname);
    }

    /**
     * As admin, create new user
     *
     * @return void
     */
    public function test_create_new_user()
    {
        $admin = factory(User::class)->state('admin')->create();

        $registeredUserRole = Role::find(4)->name_SK; // id 4 == user role

        $response = $this->actingAs($admin)
                         ->visit('/users/register')
                         ->type('Tester', 'firstname')
                         ->type('Testing', 'lastname')
                         ->type('test@example.com', 'email')
                         ->type('123456789', 'password')
                         ->type('123456789', 'password_confirmation')
                         ->select($registeredUserRole, 'role')
                         ->press('Registruj');


        $response
            ->assertStatus(200)
            // ->assertRedirectedTo('/users', $with = ['success']);
            ->assertRedirectedTo('/users');
    }
}
