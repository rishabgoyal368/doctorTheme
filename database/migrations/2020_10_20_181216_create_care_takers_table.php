<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareTakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('care_takers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('gender', 100);
            $table->string('email', 100);
            $table->string('mobile', 100);
            $table->string('password', 300);
            $table->string('profile_image', 300);
            $table->string('description', 300);
            $table->string('type', 10);
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
        Schema::dropIfExists('care_takers');
    }
}
