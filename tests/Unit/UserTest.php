<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        // $this->assertTrue(true);
        $user = User::create([
            'uuid' => (string) Str::uuid(),
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => Hash::make('password'),
        ]);
    
        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('Test User', $user->name);
    }
}
