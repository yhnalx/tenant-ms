<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tbl_maintenancerequest', function (Blueprint $table) {
            $table->id('mai_id');
            $table->unsignedBigInteger('lea_id');
            $table->string('mai_description');
            $table->date('mai_request_date');
            $table->string('mai_status')->default('Pending');
            $table->timestamps();

            $table->foreign('lea_id')->references('lea_id')->on('tbl_lease')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_maintenancerequest');
    }
};
