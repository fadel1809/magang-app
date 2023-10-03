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
        Schema::create('lamaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lowongan');
            $table->string('title_lowongan');
            $table->string('location');
            $table->foreignId('company_id');
            $table->string('company');
            $table->string('email_user');
            $table->string('cv_user');
            $table->foreignId('created_by');
            $table->enum('status', ['pending', 'declined', 'accepted'])->default('pending');
            $table->foreign('id_lowongan')->references('id')->on('lowongan')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->nullable();
            $table->foreign('company_id')->references('created_by')->on('lowongan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lamaran');
    }
};