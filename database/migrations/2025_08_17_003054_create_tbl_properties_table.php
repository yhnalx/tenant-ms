<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tbl_property', function (Blueprint $table) {
            $table->id('pro_id');
            $table->string('pro_type');
            $table->string('pro_room_number');
            $table->decimal('pro_monthly_rent', 10, 2);
            $table->string('pro_status')->default('Available'); // <-- Added status column
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_property');
    }
};
