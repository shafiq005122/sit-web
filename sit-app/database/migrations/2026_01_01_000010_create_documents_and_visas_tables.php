<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('passenger_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_passenger_id')->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->string('file_path');
            $table->string('original_name');
            $table->string('status')->default('pending');
            $table->text('rejection_reason')->nullable();
            $table->timestamps();
        });

        Schema::create('document_requirements', function (Blueprint $table) {
            $table->id();
            $table->string('entity_type');
            $table->string('document_type');
            $table->boolean('is_required')->default(true);
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('visa_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->cascadeOnDelete();
            $table->foreignId('booking_passenger_id')->nullable()->constrained()->nullOnDelete();
            $table->string('application_number')->nullable();
            $table->string('reference')->nullable();
            $table->string('status')->default('documents_pending');
            $table->date('submission_date')->nullable();
            $table->date('approval_date')->nullable();
            $table->string('issued_visa_path')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('visa_status_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visa_application_id')->constrained()->cascadeOnDelete();
            $table->string('status');
            $table->foreignId('changed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visa_status_history');
        Schema::dropIfExists('visa_applications');
        Schema::dropIfExists('document_requirements');
        Schema::dropIfExists('passenger_documents');
    }
};
