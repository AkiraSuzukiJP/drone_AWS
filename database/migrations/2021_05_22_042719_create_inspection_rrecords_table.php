<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectionRrecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection_rrecords', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('inspector_id')->nullable()->comment('点検者ID');
            $table->boolean('result_0')->nullable()->comment('機体全体（機器の取り付け状態）');
            $table->boolean('result_1')->nullable()->comment('プロペラ（外観）');
            $table->boolean('result_2')->nullable()->comment('プロペラ（損傷）');
            $table->boolean('result_3')->nullable()->comment('プロペラ（歪み）');
            $table->boolean('result_4')->nullable()->comment('フレーム（外観）');
            $table->boolean('result_5')->nullable()->comment('フレーム（損傷）');
            $table->boolean('result_6')->nullable()->comment('フレーム（歪み）');
            $table->boolean('result_7')->nullable()->comment('通信系統（期待と操縦装置の通信品質の健全性）');
            $table->boolean('result_8')->nullable()->comment('推進系統（モータまたは発電機の健全性）');
            $table->boolean('result_9')->nullable()->comment('電源系統（機体および操縦装置の電源の健全性）');
            $table->boolean('result_10')->nullable()->comment('自動制御系統（飛行制御装置の健全性）');
            $table->boolean('result_11')->nullable()->comment('操縦装置（外観）');
            $table->boolean('result_12')->nullable()->comment('操縦装置（スティックの健全性）');
            $table->boolean('result_13')->nullable()->comment('操縦装置（スイッチの健全性）');
            $table->string('notice')->nullable()->comment('特記事項');
            $table->dateTime('inspection_date')->nullable()->comment('点検日');
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
        Schema::dropIfExists('inspection_rrecords');
    }
}
