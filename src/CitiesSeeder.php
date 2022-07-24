<?php

namespace Hasan\Countries;

use Illuminate\Database\Seeder;
use DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = @json_decode(file_get_contents(realpath(__DIR__ . '/../seeds/cities.json'), true));

        DB::table(config('cities.table_name'))->delete();

        foreach ($cities as $cityId => $city) {
            DB::table(config('cities.table_name'))->insert(array(
                'id' => $city->id,
                'name_ar' => $city->name_ar,
                'name_en' => $city->name_en,
                'region_id' => $city->region_id,
            ));
        }
    }
}
