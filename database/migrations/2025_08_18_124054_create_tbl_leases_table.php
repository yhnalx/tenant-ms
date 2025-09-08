<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tbl_lease', function (Blueprint $table) {
            $table->id('lea_id');
            
            // Use users.id instead of tenantman
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pro_id');

            $table->date('lea_start_date');
            $table->date('lea_end_date');
            $table->string('lea_terms')->nullable();
            $table->string('lea_status')->default('Active');
            $table->timestamps();

            // Foreign key references
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pro_id')->references('pro_id')->on('tbl_property')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_lease');
    }
};
