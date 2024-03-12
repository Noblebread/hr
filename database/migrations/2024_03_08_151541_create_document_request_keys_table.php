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
        Schema::create('document_request_keys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id')->nullable();
            $table->foreign('document_id')->references('id')->on('documents');
            
            // $table->unsignedBigInteger('request_id')->nullable();
            // $table->foreign('request_id')->references('id')->on('requests');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_request_keys');
    }
};
