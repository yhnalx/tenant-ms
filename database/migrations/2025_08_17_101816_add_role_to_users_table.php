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
    Schema::table('users', function (Blueprint $table) {
        if (!Schema::hasColumn('users', 'lease_status')) {
            $table->string('lease_status')->default('pending');
        }

        if (!Schema::hasColumn('users', 'lease_file')) {
            $table->string('lease_file')->nullable();
        }

        if (!Schema::hasColumn('users', 'role')) {
            $table->enum('role', ['tenant', 'manager'])->default('tenant');
        }
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['lease_status', 'lease_file', 'role']);
    });
}
};
