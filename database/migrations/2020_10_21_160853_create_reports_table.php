<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bp', 100);
            $table->string('sugar', 100);
            $table->string('temperature', 100);
            $table->string('breakfast', 100);
            $table->string('lunch', 100);
            $table->string('dinner', 100);
            $table->string('activities', 200);
            $table->string('patinet_id', 200);
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
        Schema::dropIfExists('reports');
    }
}
