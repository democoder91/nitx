<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_screen', function (Blueprint $table) {
            $table->id();
            $table->foreignId("screen_id")->nullable()->references('id')->on('screens');
            $table->foreignId("ad_id")->nullable()->references('id')->on('ads');
            $table->date('from');
            $table->date('to');
            $table->string('status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad_screen');
    }
};
