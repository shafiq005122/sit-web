<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('agent_wallets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agency_id')->unique()->constrained()->cascadeOnDelete();
            $table->decimal('balance', 12, 2)->default(0);
            $table->decimal('credit_limit', 12, 2)->default(0);
            $table->decimal('used_credit', 12, 2)->default(0);
            $table->decimal('outstanding_amount', 12, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agent_wallet_id')->constrained()->cascadeOnDelete();
            $table->string('transaction_type');
            $table->decimal('amount', 12, 2)->default(0);
            $table->decimal('running_balance', 12, 2)->default(0);
            $table->string('description')->nullable();
            $table->foreignId('booking_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('payment_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agency_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('booking_id')->nullable()->constrained()->nullOnDelete();
            $table->string('currency', 3)->default('PKR');
            $table->decimal('amount', 12, 2)->default(0);
            $table->string('commission_type')->default('percentage');
            $table->decimal('rate', 5, 2)->default(0);
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commissions');
        Schema::dropIfExists('wallet_transactions');
        Schema::dropIfExists('agent_wallets');
    }
};
