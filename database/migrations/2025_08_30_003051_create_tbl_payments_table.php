<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tbl_payment', function (Blueprint $table) {
            $table->id('pay_id');
            $table->unsignedBigInteger('lea_id');
            $table->decimal('pay_amount', 10, 2);
            $table->date('pay_date');
            $table->string('pay_method');
            $table->string('pay_status')->default('Unpaid');
            $table->timestamps();

            $table->foreign('lea_id')->references('lea_id')->on('tbl_lease')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_payment');
    }
};
