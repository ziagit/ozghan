<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('works', function (Blueprint $table) {
            if (Schema::hasColumn('works', 'title')) {
                $table->dropColumn('title');
            }
            if (Schema::hasColumn('works', 'is_active')) {
                $table->dropColumn('is_active');
            }
            if (Schema::hasColumn('works', 'sort_order')) {
                $table->dropColumn('sort_order');
            }
        });
    }

    public function down(): void
    {
        Schema::table('works', function (Blueprint $table) {
            if (! Schema::hasColumn('works', 'title')) {
                $table->string('title')->nullable();
            }
            if (! Schema::hasColumn('works', 'is_active')) {
                $table->boolean('is_active')->default(true);
            }
            if (! Schema::hasColumn('works', 'sort_order')) {
                $table->unsignedInteger('sort_order')->default(0);
            }
        });
    }
};
