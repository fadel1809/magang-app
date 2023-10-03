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
        Schema::create('pemagang_aktif', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_company');
            $table->foreignId('id_lamaran');
            $table->foreignId('id_user');
            $table->string('username');
            $table->string('email_user');
            $table->string('posisi');
            $table->string('companyname');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('pemagang_aktif');
    }
};