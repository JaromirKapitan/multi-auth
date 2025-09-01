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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->datetime('enabled_at')->nullable();
        });

        DB::table('languages')->insert([
            'code' => 'sk',
            'enabled_at' => now(),
        ]);

        DB::table('languages')->insert([
            'code' => 'cs',
            'enabled_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
