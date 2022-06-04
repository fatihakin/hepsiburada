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
        Schema::create('rover_states', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('rover_id')->nullable(false);
            $table->foreign('rover_id')->references('id')->on('rovers');
            $table->integer('old_x_coordinate')->nullable(false);
            $table->integer('old_y_coordinate')->nullable(false);
            $table->string('old_facing')->nullable(false);
            $table->string('command')->nullable(false);
            $table->integer('new_x_coordinate')->nullable(false);
            $table->integer('new_y_coordinate')->nullable(false);
            $table->string('new_facing')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rover_states');
    }
};
