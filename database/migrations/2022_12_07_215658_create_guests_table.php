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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // 姓氏
            $table->string('last_name', 50);
            // 名字
            $table->string('first_name', 50);
            // 暱稱
            $table->string('nick_name', 50)->nullable();
            $table->date('birthday')->nullable();
            $table->integer('sexual')->default(0);
            $table->string('tel', 20)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('line_id', 50)->nullable();
            $table->string('fb_id', 50)->nullable();
            $table->string('remark', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guests');
    }
};
