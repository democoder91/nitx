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
        Schema::create('screen_screen_group', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('media_owner_id')->nullable()->references('id')->on('media_owners');
            $table->foreignId('screen_id')->nullable()->references('id')->on('screens');
            $table->foreignId('screen_group_id')->nullable()->references('id')->on('screen_groups');
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
        Schema::dropIfExists('screens_screen_groups');
    }
};
