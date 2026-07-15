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
        Schema::create('private_tutors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('bio')->nullable();
            $table->decimal('hourly_rate', 12, 2)->nullable();
            $table->decimal('rating', 3, 2)->default(0.00);
            $table->integer('total_students')->default(0);
            $table->integer('total_sessions')->default(0);
            $table->integer('experience_years')->default(0);
            $table->text('qualifications')->nullable();
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('private_tutors');
    }
};
