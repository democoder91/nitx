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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('parent_folder_id')->nullable();
            $table->string('path');
            $table->double('size')->nullable();
            $table->string('type')->nullable();
            $table->double('duration')->nullable();
            $table->double('width')->nullable();
            $table->double('height')->nullable();
            $table->foreignId('media_owner_id')->nullable()->references('id')->on('media_owners');
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
        Schema::dropIfExists('media');
    }
};
