<?php

namespace Database\Seeders;

use App\Models\Master\MasterProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $weights = [0.5, 1, 2, 3, 5, 10, 25, 50, 100, 250, 500, 1000];
        $img_url = "https://kadoemas.com/wp-content/uploads/2020/08/0.5-g.jpg";

        for ($i = 0; $i < count($weights); $i++) {
            MasterProduct::create([
                'weight' => $weights[$i],
                'img_url' => $img_url
            ]);
        }
    }
}
