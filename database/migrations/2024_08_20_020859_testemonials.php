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
        Schema::create('testemonials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guest_id')->reference('id')->on('guests');
            $table->foreignId('destination_id')->reference('id')->on('destinations');
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testemonials');
    }
};