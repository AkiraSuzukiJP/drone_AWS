<?php

use Illuminate\Database\Seeder;
use App\Aircraft;

class AircraftTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $model = new Aircraft;
        /* #製造者名 */
        $model->manufacturer = 'DJI';
        /* #機体名称 */
        $model->name = 'Mavic Air';
        /* #製造番号等 */
        $model->serialNo = '0K1CGCLRAJ2J56';
        /* #所有者名 */
        $model->owner = '鈴木　昭';
        /* #機体の種類(0:不明,1:飛行機,2:回転翼航空機,3,:滑空機,4:飛行船) */
        $model->type = 2;
        /* #最大離陸重量(kg) */
        $model->weight = 0.480;
        /* #報告義務機体フラグ(false:報告不要,true:報告必要) */
        $model->is_report = true;
        $model->save();
    }
}
