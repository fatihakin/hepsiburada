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
        Schema::create('plateaus', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->integer('x_coordinate')->nullable(false)->default(0);
            $table->integer('y_coordinate')->nullable(false)->default(0);
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
        Schema::dropIfExists('plateaux');
    }
};
