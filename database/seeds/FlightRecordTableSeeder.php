<?php

use Illuminate\Database\Seeder;
use App\FlightRecord;

class FlightRecordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $model = new FlightRecord;
        /* #操縦者ID */
        $model->pilot_id = 1;
        /* #飛行概要 */
        $model->overview = '';
        /* #機体ID */
        $model->aircraft_id = 1;
        /* #離陸場所 */
        $model->takeoff_place = '';
        /* #離陸時刻 */
        $model->takeoff_time = null;
        /* #着陸場所 */
        $model->landing_place = '';
        /* #着陸時刻 */
        $model->landing_time = null;
        /* #飛行時間 */
        $model->flight_time = 10;
        /* #総飛行時間 */
        $model->total_flight_time = 10;
        /* #飛行の安全に影響のあった事項 */
        $model->notices = 'なし';
        /* #飛行年月日 */
        $model->flight_date = null;
        $model->save();
    }
}
