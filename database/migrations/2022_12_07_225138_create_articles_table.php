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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // * subject
            $table->string('subject', 100);
            // * content
            $table->text('content');
            // * cgy_id
            $table->foreign('cgy_id')->references('id')->on('cgies');
            // * enabled
            $table->boolean('enabled')->default(true);
            // * sort
            $table->integer('sort')->default(0);
            $table->timestamp('enabled_at')->nullable();
            $table->string('tags', 100)->nullable();
            // * pic
            $table->string('pic', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
};
