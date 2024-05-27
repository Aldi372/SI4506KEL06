<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SignupTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->visit('Login')
            ->clickLink('Register here')
            ->assertPathIs('register')
            ->type('name', 'Evan')
            ->type('no_hp', '08996284127')
            ->type('tempat_lahir', 'jatinangor123')
            ->keys('tanggal_lahir', '1990-01-01')
            ->type('email', 'evan123@gmail.com')
            ->type('password', 'evan123')
            ->type('password_confirmation', 'evan123')
            ->press('Register')
            ->assertPathIs('/customer/dashboard');
        });
    }
}


