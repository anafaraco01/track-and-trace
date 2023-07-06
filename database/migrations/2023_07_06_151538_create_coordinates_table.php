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
        Schema::create('coordinates', function (Blueprint $table) {
                $table->id();
                $table->string('place');
                $table->string('y_coordinate');
                $table->string('x_coordinate');
                $table->string('permission');
                $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coordnates');
    }
};
