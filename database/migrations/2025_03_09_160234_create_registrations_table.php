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
            $table->string('type', 15);
            $table->year('year'); 
            $table->string('category', 15);
            $table->unsignedBigInteger('category_id'); 
            $table->unsignedBigInteger('contestant_id')->nullable(); 
            $table->string('country', 100); 
            $table->string('full_name', 100);
            $table->string('nationality', 100);
            $table->string('gender', 10);
            $table->date('birth_date'); 
            $table->string('passport_number', 100);
            $table->string('country_code', 15); 
            $table->string('whatsapp_number', 20);
            $table->string('email', 100); 
            $table->text('permanent_address'); 
            $table->string('participation', 100);
            $table->string('country_representation', 100)->nullable();
            $table->year('participation_year')->nullable(); 
            $table->string('ranking', 100)->nullable(); 
            $table->string('photo'); 
            $table->string('passport_image'); 
            $table->string('islamic_body_authority_file'); 
            $table->string('malawakil_file');
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
        Schema::dropIfExists('registrations');
    }
};
