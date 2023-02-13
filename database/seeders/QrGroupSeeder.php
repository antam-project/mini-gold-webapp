<?php

namespace Database\Seeders;

use App\Models\Product\QrProductGroup;
use Illuminate\Database\Seeder;

class QrGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QrProductGroup::create([
           'code'=>'NONGROUPCODE',
           'description'=>'GROUP FOR GOLD DOES NOT HAVE A GROUP'
        ]);
    }
}
