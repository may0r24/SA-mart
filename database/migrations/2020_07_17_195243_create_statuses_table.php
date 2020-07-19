<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->timestamps();
        });

        DB::table('statuses')->insert(
            array(
                'status' => 'PENDING',
            )
        );
        DB::table('statuses')->insert(
            array(
                'status' => 'CONFIRMED',
            )
        );
        DB::table('statuses')->insert(
            array(
                'status' => 'SHIPPED',
            )
        );
        DB::table('statuses')->insert(
            array(
                'status' => 'DELIVERED',
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
        Schema::dropIfExists('statuses');
    }
}
