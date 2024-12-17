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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('dish_name');
            $table->string('dish_image');
            $table->unsignedBigInteger('dish_type_id'); // Add the column for the foreign key
            $table->timestamps();

            // Define the foreign key relationship
            $table->foreign('dish_type_id')
                ->references('id')
                ->on('dish_types')
                ->onDelete('cascade'); // Optional: Adjust behavior on delete
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
