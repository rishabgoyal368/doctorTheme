<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCareTakerRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('care_taker_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('care_taker_id', 200);
            $table->string('user_id', 200);
            $table->string('status', 200);
            $table->softDeletes('deleted_at', 0)->nullable();   
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
        Schema::dropIfExists('care_taker_requests');
    }
}
