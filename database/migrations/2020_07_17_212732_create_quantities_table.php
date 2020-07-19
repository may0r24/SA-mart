<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuantitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantities', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->timestamps();
        });
        DB::table('quantities')->insert(
            array(
                'value' => '1',
            )
        );
        DB::table('quantities')->insert(
            array(
                'value' => '2',
            )
        );
        DB::table('quantities')->insert(
            array(
                'value' => '3',
            )
        );
        DB::table('quantities')->insert(
            array(
                'value' => '4',
            )
        );
        DB::table('quantities')->insert(
            array(
                'value' => '5',
            )
        );
        DB::table('quantities')->insert(
            array(
                'value' => '6',
            )
        );
        DB::table('quantities')->insert(
            array(
                'value' => '7',
            )
        );
        DB::table('quantities')->insert(
            array(
                'value' => '8',
            )
        );
        DB::table('quantities')->insert(
            array(
                'value' => '9',
            )
        );
        DB::table('quantities')->insert(
            array(
                'value' => '10',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quantities');
    }
}
