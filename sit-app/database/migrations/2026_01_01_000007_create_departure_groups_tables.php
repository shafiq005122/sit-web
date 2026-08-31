<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('departure_groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_code')->unique();
            $table->foreignId('package_id')->constrained()->cascadeOnDelete();
            $table->string('departure_city')->nullable();
            $table->date('departure_date');
            $table->date('return_date')->nullable();
            $table->string('airline')->nullable();
            $table->string('flight_number')->nullable();
            $table->string('return_flight_number')->nullable();
            $table->string('makkah_hotel')->nullable();
            $table->string('madinah_hotel')->nullable();
            $table->integer('makkah_nights')->default(0);
            $table->integer('madinah_nights')->default(0);
            $table->integer('total_nights')->default(0);
            $table->integer('total_seats')->default(0);
            $table->integer('available_seats')->default(0);
            $table->integer('held_seats')->default(0);
            $table->integer('confirmed_seats')->default(0);
            $table->integer('cancelled_seats')->default(0);
            $table->date('booking_deadline')->nullable();
            $table->date('visa_deadline')->nullable();
            $table->string('group_leader')->nullable();
            $table->text('notes')->nullable();
            $table->string('status')->default('draft');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('group_inventory', function (Blueprint $table) {
            $table->id();
            $table->foreignId('departure_group_id')->constrained()->cascadeOnDelete();
            $table->foreignId('room_type_id')->nullable()->constrained()->nullOnDelete();
            $table->integer('total_seats')->default(0);
            $table->integer('available_seats')->default(0);
            $table->integer('held_seats')->default(0);
            $table->integer('confirmed_seats')->default(0);
            $table->timestamps();
        });

        Schema::create('group_flights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('departure_group_id')->constrained()->cascadeOnDelete();
            $table->string('direction');
            $table->string('airline')->nullable();
            $table->string('flight_number')->nullable();
            $table->date('flight_date')->nullable();
            $table->string('departure_airport')->nullable();
            $table->string('arrival_airport')->nullable();
            $table->time('departure_time')->nullable();
            $table->time('arrival_time')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('group_flights');
        Schema::dropIfExists('group_inventory');
        Schema::dropIfExists('departure_groups');
    }
};
