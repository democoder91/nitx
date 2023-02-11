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
        Schema::create('media_sequence', function (Blueprint $table) {
            $table->id();
            $table->foreignId('media_id')->nullable()->references('id')->on('media');
            $table->foreignId('sequence_id')->nullable()->references('id')->on('sequences');
            $table->unsignedInteger('order')->nullable();
            $table->unsignedInteger('minutes')->nullable();
            $table->unsignedInteger('seconds')->nullable();
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
        Schema::dropIfExists('sequence_media');
    }
};





