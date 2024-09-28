<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datos = [
            ['name' => 'Bahia Principe Grand Tulum', 'country' => 'Mexico'],
            ['name' => 'Bahia Principe Luxury Akumal', 'country' => 'Mexico'],
            ['name' => 'Bahia Principe Grand Coba', 'country' => 'Mexico'],
            ['name' => 'Bahia Principe Luxury Sian Ka´an', 'country' => 'Mexico'],
            ['name' => 'Cayo Levantado Resort', 'country' => 'Republica Dominicana'],
            ['name' => 'Bahia Principe Grand El Portillo', 'country' => 'Republica Dominicana'],
            ['name' => 'Bahia Principe Grand Samana ', 'country' => 'Republica Dominicana'],
            ['name' => 'Bahia Principe Luxury Bouganville ', 'country' => 'Republica Dominicana'],
            ['name' => 'Bahia Principe Grand La Romana', 'country' => 'Republica Dominicana'],
            ['name' => 'Bahia Principe Grand Turquesa', 'country' => 'Republica Dominicana'],
            ['name' => 'Bahia Principe Luxury Esmeralda', 'country' => 'Republica Dominicana'],
            ['name' => 'Bahia Principe Fantasia Punta Cana', 'country' => 'Republica Dominicana'],
            ['name' => 'Bahia Principe Grand Bavaro', 'country' => 'Republica Dominicana'],
            ['name' => 'Bahia Principe Grand Punta Cana', 'country' => 'Republica Dominicana'],
            ['name' => 'Bahia Principe Luxury Ambar', 'country' => 'Republica Dominicana'],
            ['name' => 'Bahia Principe Grand Jamaica', 'country' => 'Jamaica'],
            ['name' => 'Bahia Principe Luxury Runaway Bay ', 'country' => 'Jamaica'],
            ['name' => 'Bahia Principe Sunlight Costa Adeje', 'country' => 'España'],
            ['name' => 'Bahia Principe Sunlight San Felipe', 'country' => 'España'],
            ['name' => 'Bahia Principe Sunlight Tenerife', 'country' => 'España'],
            ['name' => 'Bahia Principe Fantasia Tenerife', 'country' => 'España'],
            ['name' => 'Bahia Principe Sunlight Coral Playa', 'country' => 'España'],
        ];

        DB::table('destinations')->insert($datos);
    }
}
