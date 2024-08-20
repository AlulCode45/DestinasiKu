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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('province_id')->reference('id')->on('provincies');
            $table->foreignId('regency_id')->reference('id')->on('regencies');
            $table->foreignId('district_id')->reference('id')->on('districts');
            $table->foreignId('village_id')->reference('id')->on('villages');
            $table->foreignId('destination_company_id')->reference('id')->on('destination_companies');
            $table->integer('price');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};