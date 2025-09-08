<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tbl_deposit', function (Blueprint $table) {
            $table->id('dep_id');
            $table->unsignedBigInteger('lea_id');
            $table->decimal('dep_amount', 10, 2)->nullable();
            $table->date('dep_date_paid')->nullable();
            $table->timestamps();

            $table->foreign('lea_id')->references('lea_id')->on('tbl_lease')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_deposit');
    }
};
