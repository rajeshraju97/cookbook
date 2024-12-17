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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id(); // Primary key for the 'ingredients' table
            $table->unsignedBigInteger('dish_id'); // Foreign key referencing the 'dishes' table
            $table->json('ingredients'); // JSON column to store ingredients
            $table->bigInteger('no_of_members'); // Number of members
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('dish_id')->references('id')->on('dishes')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
