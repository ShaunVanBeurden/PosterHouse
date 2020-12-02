<?php

use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->units() as $unit) {
            \App\Models\Unit::create($unit);
        }
    }

    /**
     * Get all the units.
     *
     * @return array
     */
    private function units()
    {
        return require __DIR__.'/../data/units.php';
    }
}
