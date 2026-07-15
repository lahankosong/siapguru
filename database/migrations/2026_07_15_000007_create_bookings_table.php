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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('tutor_id')->constrained('users')->onDelete('cascade');
            $table->string('subject');
            $table->dateTime('session_date');
            $table->integer('duration')->default(60); // in minutes
            $table->decimal('price', 12, 2);
            $table->string('status')->default('pending'); // pending, confirmed, completed, cancelled
            $table->text('notes')->nullable();
            $table->string('payment_method')->nullable(); // manual, midtrans, duitku
            $table->string('payment_status')->default('pending'); // pending, paid, failed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};