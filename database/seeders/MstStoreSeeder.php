<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mst_stores')->insert([
            ['id' => 1, 'storename' => 'セブンイレブン'],
            ['id' => 2, 'storename' => 'ファミリーマート'],
            ['id' => 3, 'storename' => 'ローソン'],
            ['id' => 4, 'storename' => 'ミニストップ'],
            ['id' => 5, 'storename' => 'デイリーヤマザキ'],
            ['id' => 6, 'storename' => 'セイコーマート'],
            ['id' => 7, 'storename' => 'NewDays'],
            ['id' => 8, 'storename' => 'ポプラ'],
            ['id' => 9, 'storename' => 'ローソン・スリーエフ'],
            ['id' => 10, 'storename' => 'その他'],
        ]);
    }
}
