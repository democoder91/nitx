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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->double('price')->nullable();
            $table->integer('number_of_screens')->nullable();
            $table->integer('number_of_groups')->nullable();
            $table->integer('number_of_sequences')->nullable();
            $table->double('storage_capacity')->nullable();
            $table->string('storage_unit')->nullable();
            $table->string('currency')->nullable();
            $table->integer('discount_percentage')->nullable();
            $table->boolean('is_best_price')->nullable();
            $table->boolean('is_having_user_on_boarding')->nullable();
            $table->boolean('is_having_full_control_of_screens')->nullable();
            $table->boolean('is_having_access_to_e_manual')->nullable();
            $table->boolean('is_having_support_via_email_and_call')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
};
