<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->integer('numerical_score')->nullable()->after('admin_remark');
            $table->integer('rank')->nullable()->after('numerical_score');

            $table->foreignId('reviewed_by')
                ->nullable()
                ->after('rank')
                ->constrained('admins')
                ->nullOnDelete();

            $table->timestamp('reviewed_at')
                ->nullable()
                ->after('reviewed_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->dropConstrainedForeignId('reviewed_by');
            $table->dropColumn([
                'numerical_score',
                'rank',
                'reviewed_at'
            ]);
        });
    }
};


