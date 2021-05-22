<?php

use Illuminate\Database\Seeder;
use App\InspectionRrecord;

class InspectionRecordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $model = new InspectionRrecord;
        /* #点検者ID */
        $model->inspector_id = 1;
        /* #機体全体（機器の取り付け状態） */
        $model->result_0 = true;
        /* #プロペラ（外観） */
        $model->result_1 = true;
        /* #プロペラ（損傷） */
        $model->result_2 = true;
        /* #プロペラ（歪み） */
        $model->result_3 = true;
        /* #フレーム（外観） */
        $model->result_4 = true;
        /* #フレーム（損傷） */
        $model->result_5 = true;
        /* #フレーム（歪み） */
        $model->result_6 = true;
        /* #通信系統（期待と操縦装置の通信品質の健全性） */
        $model->result_7 = true;
        /* #推進系統（モータまたは発電機の健全性） */
        $model->result_8 = true;
        /* #電源系統（機体および操縦装置の電源の健全性） */
        $model->result_9 = true;
        /* #自動制御系統（飛行制御装置の健全性） */
        $model->result_10 = true;
        /* #操縦装置（外観） */
        $model->result_11 = true;
        /* #操縦装置（スティックの健全性） */
        $model->result_12 = true;
        /* #操縦装置（スイッチの健全性） */
        $model->result_13 = true;
        /* #特記事項 */
        $model->notice = 'なし';
        /* #点検日 */
        $model->inspection_date = null;
        $model->save();
    }
}
