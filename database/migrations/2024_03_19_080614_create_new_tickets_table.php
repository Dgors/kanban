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
        Schema::create('new_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('client_email');
            $table->string('text_subject')->nullable();
            $table->text('text_message');
            $table->timestamps();
            $table->integer('uid')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_tickets');
    }
};
