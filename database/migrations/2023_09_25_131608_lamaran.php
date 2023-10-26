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
            $table->unsignedBigInteger('id_lowongan');
            $table->string('title_lowongan');
            $table->string('location');
            $table->unsignedBigInteger('company_id');
            $table->string('company');
            $table->string('email_user');
            $table->string('cv_user');
            $table->unsignedBigInteger('created_by');
            $table->enum('status', ['pending', 'declined', 'accepted'])->default('pending');
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