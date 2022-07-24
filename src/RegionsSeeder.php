<?php

namespace Hasan\Countries;

use Illuminate\Database\Seeder;
use DB;

class RegionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = @json_decode(file_get_contents(realpath(__DIR__ . '/../seeds/regions.json'), true));

        DB::table(config('regions.table_name'))->delete();

        foreach ($regions as $regionId => $region) {
            DB::table(config('regions.table_name'))->insert(array(
                'id' => $regionId,
                'name_ar' => $region->name_ar,
                'name_en' => $region->name_ar,
                'capital_city_id' => $region->capital_city_id,
                'code' => $region->code,
                'population' => $region->population,
                'country_id' => $region->country_id,
            ));
        }
    }
}
