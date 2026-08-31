<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('action');
            $table->string('entity')->nullable();
            $table->unsignedBigInteger('entity_id')->nullable();
            $table->json('previous_data')->nullable();
            $table->json('new_data')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });

        Schema::create('website_contents', function (Blueprint $table) {
            $table->id();
            $table->string('section')->index();
            $table->string('key')->index();
            $table->text('content')->nullable();
            $table->string('image_path')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('system_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('group')->default('general');
            $table->timestamps();
        });

        Schema::create('support_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('status')->default('open');
            $table->string('priority')->default('normal');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('internal_notes', function (Blueprint $table) {
            $table->id();
            $table->string('entity_type');
            $table->unsignedBigInteger('entity_id');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->text('note');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('internal_notes');
        Schema::dropIfExists('support_tickets');
        Schema::dropIfExists('system_settings');
        Schema::dropIfExists('website_contents');
        Schema::dropIfExists('audit_logs');
    }
};
