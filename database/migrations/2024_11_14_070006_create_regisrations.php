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
        Schema::create('regisrations', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('category')->nullable();
            $table->string('country')->nullable();
            $table->string('full_name')->nullable();
            $table->string('nationality')->nullable();
            $table->string('gender')->nullable();
            $table->string('birth_date')->nullable();
            $table->integer('passport_number')->nullable();
            // $table->string('country_code')->nullable();
            $table->integer('whatsapp_number')->nullable();
            $table->string('email')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('participation')->nullable();
            $table->string('country_representation')->nullable();
            $table->integer('participation_year')->nullable();
            $table->string('ranking')->nullable();
            $table->string('photo')->nullable();
            $table->string('passport_image')->nullable();
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
        Schema::dropIfExists('regisrations');
    }
};
