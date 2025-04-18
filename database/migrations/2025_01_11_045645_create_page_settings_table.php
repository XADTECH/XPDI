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
        Schema::create('page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('about_title')->nullable();
            $table->longText('about_description')->nullable();
            $table->longText('about_mission')->nullable();
            $table->longText('about_instruction')->nullable();
            $table->string('about_image')->nullable();
            $table->string('map_link')->nullable();
            $table->json('faq');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_settings');
    }
};
