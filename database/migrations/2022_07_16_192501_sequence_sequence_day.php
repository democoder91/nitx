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
        Schema::create('sequence_sequence_day', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('sequence_day_id')->nullable()->references('id')->on('sequence_days');
            $table->foreignId('sequence_id')->nullable()->references('id')->on('sequences');
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
        //
    }
};
