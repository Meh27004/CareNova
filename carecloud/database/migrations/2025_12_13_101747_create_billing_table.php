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
        Schema::create('billings', function (Blueprint $table) {
            $table->id();

            // Foreign key (recommended)
            $table->unsignedBigInteger('patient_id');

            $table->string('bill_number')->unique();
            $table->decimal('total_amount', 10, 2);

            // Enum for status
            $table->enum('status', ['paid', 'pending'])->default('pending');

            $table->date('billing_date');

            $table->timestamps();

            // Optional foreign key constraint
            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};
