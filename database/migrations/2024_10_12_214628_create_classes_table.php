<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Class name (string)
            $table->text('description'); // Class description (text)
            $table->decimal('price', 8, 2); // Class price (decimal with 2 decimal places)
            $table->date('date'); // Class date (date)
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
};
