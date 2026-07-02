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
        Schema::create('enrollments', function (Blueprint $table) {

                $table->id();
                $table->foreignId('user_id')
                    ->constrained()
                    ->onDelete('cascade');
                $table->string('contest_name');
                $table->string('theme')->nullable();
                $table->string('category')->nullable();
                $table->boolean('payment_status')->default(false);
                $table->decimal('payment_amount', 8, 2)->default(0);
                $table->boolean('blueprint_downloaded')->default(false);
                $table->timestamp('blueprint_downloaded_at')->nullable();
                $table->string('artwork_file')->nullable();
                $table->timestamp('artwork_uploaded_at')->nullable();
                $table->enum('submission_status', [
                    'pending',
                    'under_review',
                    'approved',
                    'rejected'
                ])->default('pending');
                $table->text('admin_remark')->nullable();
                $table->boolean('certificate_generated')->default(false);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
                $table->unique(['user_id', 'contest_name']);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
