<?php

use Illuminate\Database\Seeder;
use App\Inspector;

class InspectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $model = new Inspector;
        /* #点検者名 */
        $model->name = '鈴木　昭';
        $model->save();
    }
}
