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
        Schema::create('rovers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('plateau_id')->nullable(false);
            $table->foreign('plateau_id')->references('id')->on('plateaus');
            $table->string('name')->nullable(false)->unique();
            $table->integer('x_coordinate')->nullable(false)->default(0);
            $table->integer('y_coordinate')->nullable(false)->default(0);
            $table->addColumn('facing_type', 'facing' )->nullable(false)->default('N');
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
        Schema::dropIfExists('rovers');
    }
};
