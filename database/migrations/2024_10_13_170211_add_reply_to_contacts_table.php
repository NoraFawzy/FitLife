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
    Schema::table('contacts', function (Blueprint $table) {
        $table->text('admin_reply')->nullable(); // Column to store the reply
        $table->boolean('is_replied')->default(false); // Column to check if a reply was sent
    });
}

public function down()
{
    Schema::table('contacts', function (Blueprint $table) {
        $table->dropColumn('admin_reply');
        $table->dropColumn('is_replied');
    });
}

};
