<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('agent_tiers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->decimal('default_commission_percent', 5, 2)->default(0);
            $table->decimal('default_markup_percent', 5, 2)->default(0);
            $table->decimal('max_markup_percent', 5, 2)->default(0);
            $table->decimal('min_selling_price', 12, 2)->default(0);
            $table->decimal('credit_limit', 12, 2)->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('agencies', function (Blueprint $table) {
            $table->id();
            $table->string('agency_name');
            $table->string('owner_name')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->string('whatsapp')->nullable();
            $table->text('office_address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('company_reg_no')->nullable();
            $table->string('travel_licence')->nullable();
            $table->string('tax_info')->nullable();
            $table->string('cnic')->nullable();
            $table->text('bank_details')->nullable();
            $table->foreignId('tier_id')->nullable()->constrained('agent_tiers')->nullOnDelete();
            $table->foreignId('branch_id')->nullable()->constrained()->nullOnDelete();
            $table->string('status')->default('pending');
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('agency_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('agency_id')->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->string('file_path');
            $table->string('original_name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('agency_documents');
        Schema::dropIfExists('agencies');
        Schema::dropIfExists('agent_tiers');
    }
};
