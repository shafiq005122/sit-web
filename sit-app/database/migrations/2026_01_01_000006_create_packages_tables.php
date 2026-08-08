<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->timestamps();
        });

        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('package_code')->unique();
            $table->text('description')->nullable();
            $table->text('inclusions')->nullable();
            $table->text('exclusions')->nullable();
            $table->text('terms_conditions')->nullable();
            $table->string('departure_city')->nullable();
            $table->integer('makkah_nights')->default(0);
            $table->integer('madinah_nights')->default(0);
            $table->integer('total_nights')->default(0);
            $table->string('airline')->nullable();
            $table->string('hotel_category')->nullable();
            $table->string('haram_distance')->nullable();
            $table->boolean('visa_included')->default(true);
            $table->boolean('direct_flight')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->string('status')->default('draft');
            $table->boolean('visible_b2c')->default(true);
            $table->boolean('visible_b2b')->default(true);
            $table->timestamp('publish_at')->nullable();
            $table->timestamp('expire_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('package_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained()->cascadeOnDelete();
            $table->string('file_path');
            $table->string('caption')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('package_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained()->cascadeOnDelete();
            $table->string('channel')->default('b2c');
            $table->string('currency', 3)->default('PKR');
            $table->decimal('sharing_price', 12, 2)->default(0);
            $table->decimal('quad_price', 12, 2)->default(0);
            $table->decimal('triple_price', 12, 2)->default(0);
            $table->decimal('double_price', 12, 2)->default(0);
            $table->decimal('child_with_bed', 12, 2)->default(0);
            $table->decimal('child_without_bed', 12, 2)->default(0);
            $table->decimal('infant_price', 12, 2)->default(0);
            $table->decimal('visa_price', 12, 2)->default(0);
            $table->decimal('airline_price', 12, 2)->default(0);
            $table->decimal('extra_baggage', 12, 2)->default(0);
            $table->decimal('airport_transport', 12, 2)->default(0);
            $table->decimal('makkah_transport', 12, 2)->default(0);
            $table->decimal('madinah_transport', 12, 2)->default(0);
            $table->decimal('ziyarah_price', 12, 2)->default(0);
            $table->decimal('meals_price', 12, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('package_hotels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained()->cascadeOnDelete();
            $table->string('city');
            $table->string('hotel_name');
            $table->string('category')->nullable();
            $table->string('distance_from_haram')->nullable();
            $table->integer('nights')->default(0);
            $table->timestamps();
        });

        Schema::create('package_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('is_included')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('package_services');
        Schema::dropIfExists('package_hotels');
        Schema::dropIfExists('package_prices');
        Schema::dropIfExists('package_images');
        Schema::dropIfExists('packages');
        Schema::dropIfExists('room_types');
    }
};
