<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAircraftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aircraft', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('manufacturer')->nullable()->comment('製造者名');
            $table->string('name')->nullable()->comment('機体名称');
            $table->string('serialNo')->nullable()->comment('製造番号等');
            $table->string('owner')->nullable()->comment('所有者名');
            $table->unsignedinteger('type')->nullable()->comment('機体の種類(0:不明,1:飛行機,2:回転翼航空機,3,:滑空機,4:飛行船)');
            $table->decimal('weight',7,3)->nullable()->comment('最大離陸重量(kg)');
            $table->boolean('is_report')->nullable()->comment('報告義務機体フラグ');
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
        Schema::dropIfExists('aircraft');
    }
}
