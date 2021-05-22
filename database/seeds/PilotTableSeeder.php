<?php

use Illuminate\Database\Seeder;
use App\Pilot;

class PilotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $model = new Pilot;
        /* #操縦者名 */
        $model->name = '鈴木　昭';
        /* #所属名 */
        $model->belong = '-';
        $model->save();
    }
}
