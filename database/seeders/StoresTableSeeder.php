<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;


class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 50; $i += 1) {
            Store::create([
                'name' => '店舗名'. $i,
                'img' => '',
                'description' => '説明'. $i,
                'price' => $i*100,
                'open_time' => '10:00',
                'close_time' => '20:00',
                'postal_code' => '0000000',
                'address' => '住所'. $i,
                'phone_number' => '09000000000',
                'holiday' => ''
            ]);
            }
            }
}
