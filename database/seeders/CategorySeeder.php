<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();
        DB::table('categories')->insert([
            ['name' => 'バーガー', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'ドリンク', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'デザート', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'フライ', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
