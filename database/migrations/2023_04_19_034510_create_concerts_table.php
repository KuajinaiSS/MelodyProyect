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
        Schema::create('concerts', function (Blueprint $table) {
            $table->id();
<<<<<<<< HEAD:database/migrations/2023_05_03_230136_create_concerts_table.php
            $table->string('concertName');
            $table->integer('price');
            $table->integer('stock');
            $table->date('date');
========
            $table->string('nombre');
            $table->integer('precio');
            $table->date('fecha');
            $table->integer('stock');
>>>>>>>> test:database/migrations/2023_04_19_034510_create_concerts_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concerts');
    }
};
