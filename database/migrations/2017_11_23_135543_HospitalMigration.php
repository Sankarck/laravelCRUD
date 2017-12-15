<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HospitalMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signup', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->string('Email')->unique();
            $table->string('Password');
            $table->string('Usertype');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('Patientdetails', function (Blueprint $table)
        {  
            $table->engine='InnoDB';
            $table->increments('id')->unsigned();
            $table->string('Name');
            $table->date('DOB');
            $table->integer('Age');
            $table->string('Sex');
            $table->string('Treatment');
            $table->text('Description');
            $table->string('Images');
            $table->rememberToken();
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
        Schema::dropIfExists('signup');
        Schema::dropIfExists('Insertdata');
    }
}
