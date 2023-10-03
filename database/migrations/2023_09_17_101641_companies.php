<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('companyName');
            $table->longText('companyProfile')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('location');
            $table->string('notelp')->unique();
            $table->string('photo')->nullable();
            $table->enum('status', ['accept', 'pending'])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};