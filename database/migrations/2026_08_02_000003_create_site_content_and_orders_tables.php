<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tiling_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->nullable();
            $table->string('service_type')->default('Residential');
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->timestamps();
        });

        Schema::create('service_areas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('postcode')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('category')->nullable();
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->date('completed_at')->nullable();
            $table->string('location')->nullable();
            $table->decimal('area_m2', 10, 2)->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });

        Schema::create('quote_options', function (Blueprint $table) {
            $table->id();
            $table->string('option_group');
            $table->string('label');
            $table->string('value');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->index(['option_group', 'is_active']);
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('project_type')->nullable();
            $table->string('project_location')->nullable();
            $table->string('commercial_property_type')->nullable();
            $table->string('service')->nullable();
            $table->string('address');
            $table->date('preferred_date')->nullable();
            $table->decimal('estimated_area', 10, 2)->nullable();
            $table->boolean('materials_provided')->default(false);
            $table->string('tile_size')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('note')->nullable();
            $table->json('photos')->nullable();
            $table->string('status')->default('new');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('quote_options');
        Schema::dropIfExists('works');
        Schema::dropIfExists('service_areas');
        Schema::dropIfExists('tiling_services');
    }
};
