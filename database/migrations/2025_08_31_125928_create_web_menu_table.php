<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('web_menu_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->softDeletes();
        });

        DB::table('web_menu_sections')->insert(['id' => 1, 'title' => 'Main menu']);

        Schema::create('web_menu', function (Blueprint $table) {
            $table->id();

            $table->foreignId('web_menu_sections_id')->nullable();
            $table->foreign('web_menu_sections_id')->references('id')->on('web_menu_sections');

            $table->foreignId('web_menu_id')->nullable();
            $table->foreign('web_menu_id')->references('id')->on('web_menu');

            $table->foreignId('web_page_id');
            $table->foreign('web_page_id')->references('id')->on('web_pages');

            $table->integer('order')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_menu');
        Schema::dropIfExists('web_menu_sections');
    }
};
