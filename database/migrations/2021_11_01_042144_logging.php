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
            $table->integer('item_level')->nullable();
            $table->timestamps();
        });

        // DB::unprepared(DB::raw(
        //     "
        //         CREATE FUNCTION setItemLevel(
        //             itemLevel INT
        //         ) RETURNS INT
        //         DETERMINISTIC
        //         BEGIN
        //             DECLARE randomLevelNumber INT;

        //             IF itemLevel > 5 THEN
        //                 SET randomLevelNumber = 1;
        //             ELSEIF itemLevel < 5 THEN
        //                 SET randomLevelNumber = 4;
        //             END IF;

        //             RETURN randomLevelNumber();
        //         END
        //     "
        // ));

        // DB::unprepared(DB::raw(
        //     "
        //         CREATE PROCEDURE item_level_proc(
        //             IN itemLevel INT,
        //             OUT randomLevelNumber INT
        //         )
        //         BEGIN
        //             DECLARE collQty INT DEFAULT(6);

        //             SELECT collection_quantity INTO collQty FROM items;

        //             SET randomLevelNumber = setItemLevel(collQty);
        //         END
        //     "
        // ));

        // A trigger after insertion from users. A factory creation used 33 triggers on create.

        DB::unprepared(DB::raw("
            CREATE TRIGGER userLogCreation AFTER INSERT 
            ON users FOR EACH ROW BEGIN 
                INSERT INTO logging (action, created_at, updated_at) VALUES ('INSERT_USER', CURRENT_TIME(), CURRENT_TIME());
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
