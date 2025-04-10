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
            $table->string('full_name', 100);
            $table->string('country', 100); 
            $table->string('nationality', 100);
            $table->string('gender', 10);
            $table->date('birth_date'); // date
            $table->string('birth_place', 100);
            $table->string('email', 100); 
            $table->string('country_code', 15); 
            $table->string('whatsapp_number', 20);
            $table->text('permanent_address'); 
            $table->year('year'); 
            $table->string('category', 15);
            $table->integer('category_id'); 
            $table->unsignedBigInteger('contestant_id')->nullable(); 
            // $table->string('passport_number', 100)->nullable();
            $table->string('participation', 100);
            $table->year('participation_year')->nullable();// year
            $table->string('narration', 100);
            $table->string('other_narration', 100)->nullable();
            $table->string('nominating_applicant_country', 100)->nullable();
            $table->string('address_applicant_country', 100)->nullable(); 
            $table->string('mobile_applicant_country', 100)->nullable();
            $table->string('email_applicant_country', 100)->nullable();
            $table->string('nearest_malaysian_embassy', 100)->nullable();
            $table->string('photo'); 
            $table->string('passport_image'); 
            // $table->string('islamic_body_authority_file')->nullable(); 
            // $table->string('malawakil_file')->nullable();
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
