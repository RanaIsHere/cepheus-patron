<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Logging extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logging', function (Blueprint $table) {
            $table->id();
            $table->string('action', 20);
            $table->timestamps();
        });

        DB::unprepared(DB::raw("
            CREATE TRIGGER sellLog AFTER INSERT 
            ON users FOR EACH ROW BEGIN 
                INSERT INTO logging (action, created_at, updated_at) VALUES ('INSERT', CURRENT_TIME(), CURRENT_TIME());
            END;
        "));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logging');
    }
}
