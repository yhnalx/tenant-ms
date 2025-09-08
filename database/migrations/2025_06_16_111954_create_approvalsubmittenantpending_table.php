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
        Schema::create('approvalsubmittenantpending', function (Blueprint $table) {
            $table->id();

            // tenant details
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('contact_number', 20);
            $table->string('id_file')->nullable();   // optional file upload
            $table->string('photo_file')->nullable(); // optional file upload
            $table->text('current_address');
            $table->date('birthdate');
            $table->string('preferred_unit_type');
            $table->date('preferred_movein_date');
            $table->text('reason_renting');
            $table->string('employment_status');
            $table->string('employer_name')->nullable();

            // emergency details
            $table->string('emergency_name');
            $table->string('emergency_contact');
            $table->string('emergency_relationship');

            // status
            $table->string('status')->default('pending'); // pending, approved, rejected

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvalsubmittenantpending');
    }
};
