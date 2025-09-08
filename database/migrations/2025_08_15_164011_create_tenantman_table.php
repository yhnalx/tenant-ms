<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tenantman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('tenant_name');
            $table->integer('room_number')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('room_type');
            $table->date('lease_start');
            $table->date('lease_end');
            $table->string('status')->default('pending');
            $table->string('action')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tenantman');
    }
};
