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
        Schema::create('message_board', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('guest_id')->nullable();
            $table->bigInteger('article_id')->nullable();
            // *
            $table->text('content')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_board');
    }
};
