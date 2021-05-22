<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pilot_id')->nullable()->comment('操縦者ID');
            $table->string('overview')->nullable()->comment('飛行概要');
            $table->integer('aircraft_id')->nullable()->comment('機体ID');
            $table->string('takeoff_place')->nullable()->comment('離陸場所');
            $table->dateTime('takeoff_time')->nullable()->comment('離陸時刻');
            $table->string('landing_place')->nullable()->comment('着陸場所');
            $table->dateTime('landing_time')->nullable()->comment('着陸時刻');
            $table->integer('flight_time')->nullable()->comment('飛行時間');
            $table->integer('total_flight_time')->nullable()->comment('総飛行時間');
            $table->string('notices')->nullable()->comment('飛行の安全に影響のあった事項');
            $table->dateTime('flight_date')->nullable()->comment('飛行年月日');
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
        Schema::dropIfExists('flight_records');
    }
}
