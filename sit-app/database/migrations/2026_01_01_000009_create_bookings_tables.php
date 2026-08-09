<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_reference')->unique();
            $table->string('source_channel')->default('b2c');
            $table->foreignId('customer_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('agency_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('package_id')->constrained()->restrictOnDelete();
            $table->foreignId('departure_group_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained()->nullOnDelete();
            $table->string('room_type')->nullable();
            $table->integer('pax')->default(1);
            $table->string('currency', 3)->default('PKR');
            $table->decimal('gross_amount', 12, 2)->default(0);
            $table->decimal('discount_amount', 12, 2)->default(0);
            $table->decimal('tax_amount', 12, 2)->default(0);
            $table->decimal('paid_amount', 12, 2)->default(0);
            $table->decimal('outstanding_amount', 12, 2)->default(0);
            $table->string('status')->default('draft');
            $table->text('internal_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('booking_passengers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->cascadeOnDelete();
            $table->foreignId('customer_id')->nullable()->constrained()->nullOnDelete();
            $table->string('passport_number')->nullable();
            $table->date('passport_issue_date')->nullable();
            $table->date('passport_expiry_date')->nullable();
            $table->string('given_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('full_name')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('nationality')->nullable();
            $table->string('cnic')->nullable();
            $table->string('passenger_type')->default('Adult');
            $table->string('family_head')->nullable();
            $table->string('relationship')->nullable();
            $table->string('room_type')->nullable();
            $table->string('room_allocation')->nullable();
            $table->string('visa_status')->default('documents_pending');
            $table->string('ticket_status')->default('pending');
            $table->string('document_status')->default('pending');
            $table->string('mobile')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->text('medical_notes')->nullable();
            $table->text('mobility_notes')->nullable();
            $table->boolean('child_without_bed')->default(false);
            $table->boolean('additional_baggage')->default(false);
            $table->timestamps();
        });

        Schema::create('booking_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->cascadeOnDelete();
            $table->string('room_type');
            $table->integer('quantity')->default(1);
            $table->decimal('price_per_person', 12, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('booking_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->decimal('price', 12, 2)->default(0);
            $table->boolean('is_included')->default(false);
            $table->timestamps();
        });

        Schema::create('booking_status_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->cascadeOnDelete();
            $table->string('status');
            $table->foreignId('changed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_status_history');
        Schema::dropIfExists('booking_services');
        Schema::dropIfExists('booking_rooms');
        Schema::dropIfExists('booking_passengers');
        Schema::dropIfExists('bookings');
    }
};
