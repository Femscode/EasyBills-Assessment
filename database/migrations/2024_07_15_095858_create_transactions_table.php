<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('user_id')->constrained()->onDelete('cascade');
            $table->string('bill_name');
            $table->string('description');
            $table->decimal('amount', 12, 2);
            $table->decimal('before_balance', 12, 2);
            $table->decimal('after_balance', 12, 2);
            $table->integer('status')->default(1);
            $table->timestamp('transaction_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
