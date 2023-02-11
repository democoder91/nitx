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
        Schema::create('screens', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId("media_owner_id")->nullable()->references('id')->on('media_owners');
            $table->foreignId("sequence_id")->nullable()->references('id')->on('sequences');
            $table->unsignedInteger('active_screen_group_id')->nullable();
            $table->string('orientation');
            $table->string('status');
            $table->string('latitude');
            $table->string('longitude');
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
        Schema::dropIfExists('screens');
    }
};
