<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoachIdToClassesTable extends Migration
{
    public function up()
    {
        Schema::table('classes', function (Blueprint $table) {
            // Add the coach_id column (assuming it references the users table)
            $table->unsignedBigInteger('coach_id')->nullable(); // or use $table->foreignId('coach_id')->nullable()->constrained('users'); if you want a foreign key constraint
        });
    }

    public function down()
    {
        Schema::table('classes', function (Blueprint $table) {
            // Drop the coach_id column
            $table->dropColumn('coach_id');
        });
    }
}
