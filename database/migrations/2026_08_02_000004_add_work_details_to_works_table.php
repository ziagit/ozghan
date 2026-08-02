<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('works', function (Blueprint $table) {
            if (! Schema::hasColumn('works', 'location')) {
                $table->string('location')->nullable()->after('completed_at');
            }
            if (! Schema::hasColumn('works', 'area_m2')) {
                $table->decimal('area_m2', 10, 2)->nullable()->after('location');
            }
        });
    }

    public function down(): void
    {
        Schema::table('works', function (Blueprint $table) {
            $columns = array_filter(['location', 'area_m2'], fn (string $column) => Schema::hasColumn('works', $column));
            if ($columns) {
                $table->dropColumn($columns);
            }
        });
    }
};
