<?php

namespace Database\Seeders;

use App\Imports\PropertyImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Excel::import(new PropertyImport(), storage_path('app/public/property-data.csv'));
    }
}
