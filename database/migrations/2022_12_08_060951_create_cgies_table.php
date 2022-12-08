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
        Schema::create('cgies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('subject', 100);
            $table->string('pic', 255);
            $table->string('remark', 200)->nullable();
            $table->text('desc');
            $table->boolean('enabled')->default(true);
            $table->integer('sort')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cgies');
    }
};
