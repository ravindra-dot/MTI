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
        Schema::create('contests', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();

            $table->text('description')->nullable();
            $table->text('theme')->nullable();
            $table->text('rules')->nullable();
            $table->text('prizes')->nullable();

            $table->string('banner')->nullable();

            $table->string('category')->nullable();
            $table->string('age_group')->nullable();

            $table->decimal('entry_fee', 8, 2)->default(0);

            $table->date('registration_start');
            $table->date('registration_end');
            $table->date('submission_deadline');
            $table->date('result_date')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contests');
    }
};