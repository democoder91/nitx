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
        // Schema::create('screen_advertis', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId("screen_id")->constrained("screens");
        //     $table->foreignId("advertis_id")->constrained("advertis");
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('screen_advertise');
    }
};
