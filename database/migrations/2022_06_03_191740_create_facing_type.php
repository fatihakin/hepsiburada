<?php

use Illuminate\Database\Grammar;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Grammar::macro('typeFacing_type', function () {
            return 'facing_type';
        });
        DB::statement("CREATE TYPE facing_type AS ENUM ('N','S','E','W');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP TYPE IF EXISTS facing_type CASCADE");
    }
};
