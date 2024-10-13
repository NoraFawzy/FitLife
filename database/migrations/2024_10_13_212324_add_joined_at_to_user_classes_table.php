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
    Schema::table('user_classes', function (Blueprint $table) {
        $table->timestamp('joined_at')->nullable(); // إضافة عمود joined_at
    });
}

public function down()
{
    Schema::table('user_classes', function (Blueprint $table) {
        $table->dropColumn('joined_at'); // حذف العمود في حالة التراجع
    });
}

};
