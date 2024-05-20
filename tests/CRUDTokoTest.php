<?php

namespace Tests\Unit;
use PHPUnit\Framework\TestCase;
class CRUDToko extends TestCase
{
    
    public function test_example(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'Evan')
                    ->type('no_hp', '08996284127')
                    ->type('tempat_lahir', 'jatinangor123')
                    ->keys('#tanggal_lahir', '1990-01-01') // Masukkan tanggal lahir dengan format yang sesuai
                    ->type('email', 'evan123@gmail.com')
                    ->type('password', 'evan123')
                    ->type('password_confirmation', 'evan123')
                    ->press('Register')
                    ->assertPathIs('/customer/dashboard'); // Sesuaikan dengan halaman redirect setelah registrasi berhasil
        });
    }
}