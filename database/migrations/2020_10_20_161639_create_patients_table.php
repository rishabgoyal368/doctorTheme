<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->nullable();
            $table->string('gender', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('mobile', 100)->nullable();
            $table->string('password', 300)->nullable();
            $table->string('profile_image', 300)->nullable();
            $table->string('description', 300)->nullable();
            $table->string('dob',100)->nullable(); 
            $table->string('age',100)->nullable(); 
            $table->string('address',100)->nullable(); 
            $table->string('emergency_name',100)->nullable(); 
            $table->string('emergency_contact',100)->nullable(); 
            $table->string('emergency_relation')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('alergy')->nullable();
            $table->string('current_medication')->nullable();
            $table->string('current_health_concern')->nullable();
            $table->string('report_file')->nullable();
            $table->softDeletes('deleted_at', 0);   
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
        Schema::dropIfExists('patients');
    }
}
