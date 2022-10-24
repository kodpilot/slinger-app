<?php

namespace Database\Seeders;

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
        // $this->call(\Epigra\TrGeoZones\Database\Seeders\TrGeoZonesDatabaseSeeder::class);
        $this->call([
        infoSeeder::class,
        productSeeder::class,
        categorySeeder::class,
        subCategorySeeder::class,
        userSeeder::class,
        addressSeeder::class,
        panelMenuSeeder::class,
        subPanelMenuSeeder::class,
        roleSeeder::class,
        permissionSeeder::class,
        photosSeeder::class,
        JobsSeeder::class,
    ]);
    }
}
