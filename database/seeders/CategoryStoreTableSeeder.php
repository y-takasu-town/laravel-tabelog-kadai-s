<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoryStore;


class CategoryStoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 50; $i += 1) {
            CategoryStore::create([
                'category_id' => $i%5 + 1,
                'store_id' => $i
                ]);
        }

        for ($i = 1; $i <= 10; $i += 1) {
            CategoryStore::create([
                'category_id' => $i%5 + 1,
                'store_id' => $i + 1
            ]);
        }
        }
}
