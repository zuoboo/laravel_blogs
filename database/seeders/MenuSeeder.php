<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ダミー記事生成件数
        $num = 10;
        $insertData = array_map(
            function($no) use($num) {
                $created_at = today()->subMinutes($num+$no+1)->setHours(random_int(9, 18))->setMinutes(random_int(0, 59));
                $updated_at = random_int(0, 1) === 1 ? today()->subMinutes(random_int(1, $num+$no))->setHours(random_int(9, 18))->setMinutes(random_int(0, 59)) : $created_at;
                return [
                    'name' => 'ダミーメニュー'. $no,
                    'price' => 100,
                    'image' => 'blogs/dummy.jpg',
                    'introduction' => "ブログ記事のダミー本文です。\nここで改行されています\n\nここには空行が設定されています\n<p>ここはpタグで囲われています</p><script>alert('アラートが実行されたらXSS対策不備')</script>",
                    'created_at' => $created_at,
                    'updated_at' => $updated_at
                ];
            },
            range(1, $num)
        );
        DB::table('menus')->insert($insertData);
    }
}
