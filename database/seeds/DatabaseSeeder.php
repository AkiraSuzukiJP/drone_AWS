<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AircraftTableSeeder::class);
        $this->call(PilotTableSeeder::class);
        $this->call(InspectorTableSeeder::class);
        $this->call(InspectionRecordTableSeeder::class);
        $this->call(FlightRecordTableSeeder::class);
    }
}
