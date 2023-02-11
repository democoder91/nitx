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
        Schema::create('ad_issues', function (Blueprint $table) {
            $table->id();
            $table->string('advertiser_email');
            $table->string('advertiser_name');
            $table->date('date_of_issue');
            $table->longText('description');
            $table->foreignId("media_owner_id")->nullable()->references('id')->on('media_owners');
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
        Schema::dropIfExists('ads_issues');
    }
};
