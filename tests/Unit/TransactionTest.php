<?php

namespace Tests\Unit;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Str;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
class TransactionTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        // $this->assertTrue(true);
        $user = User::factory()->create();
        
        $transaction = Transaction::create([
            'user_id' => $user->uuid,
            'uuid' => Str::uuid(),
            'bill_name' => "Test Bill Name",
            'description' => 'Test Transaction',
            'amount' => 5000.00,
            'before_balance' => 1000000,
            'after_balance' => 955000,
            'transaction_date' => now(),
        ]);
    
        $this->assertInstanceOf(Transaction::class, $transaction);
        $this->assertEquals('Test Transaction', $transaction->description);
    
    }
}
