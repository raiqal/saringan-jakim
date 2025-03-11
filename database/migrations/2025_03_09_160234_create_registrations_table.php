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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('year');
            $table->string('category');
            $table->string('country');
            $table->string('full_name');
            $table->string('nationality');
            $table->string('gender');
            $table->string('birth_date');
            $table->string('passport_number');
            $table->string('country_code');
            $table->string('whatsapp_number');
            $table->string('email');
            $table->string('permanent_address');
            $table->string('participation');
            $table->string('country_representation')->nullable();
            $table->integer('participation_year')->nullable();
            $table->string('ranking')->nullable();
            $table->string('photo');
            $table->string('passport_image');
            $table->string('islamic_body_authority_file');
            $table->string('malawakil_file');
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
        Schema::dropIfExists('registrations');
    }
};
