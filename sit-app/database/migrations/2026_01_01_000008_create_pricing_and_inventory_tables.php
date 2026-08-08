<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('agent_price_rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agency_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('tier_id')->nullable()->constrained('agent_tiers')->nullOnDelete();
            $table->foreignId('package_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('departure_group_id')->nullable()->constrained()->nullOnDelete();
            $table->string('rule_type')->default('standard');
            $table->string('currency', 3)->default('PKR');
            $table->decimal('base_price', 12, 2)->default(0);
            $table->decimal('commission_percent', 5, 2)->default(0);
            $table->decimal('commission_fixed', 12, 2)->default(0);
            $table->decimal('markup_percent', 5, 2)->default(0);
            $table->decimal('max_markup_percent', 5, 2)->default(0);
            $table->decimal('min_selling_price', 12, 2)->default(0);
            $table->boolean('credit_eligible')->default(false);
            $table->date('effective_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->timestamps();
        });

        Schema::create('seat_reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('departure_group_id')->constrained()->cascadeOnDelete();
            $table->foreignId('booking_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('agency_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('quantity')->default(1);
            $table->string('status')->default('active');
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seat_reservations');
        Schema::dropIfExists('agent_price_rules');
    }
};
