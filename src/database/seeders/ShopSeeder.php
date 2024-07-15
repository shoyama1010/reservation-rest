<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('shops')->insert([
        $shops = [
            [
                'shop_name' => '仙人',
                'region' => '東京都',
                'genre' => '寿司',
                'description' => '料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。<br/>
                食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg',
            ],
            [
                'shop_name' => '牛助',
                'region' => '大阪府',
                'genre' => '焼肉',
                'description' => '焼肉業界で20年間経験を積み、肉を熟知したマスターによる実力派焼肉店。長年の経験により生まれたタレと肉の組み合わせが絶品。まさに他店では味わえない希少部位も仕入れております。お気軽にお越しください。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg',
            ],
            [
                'shop_name' => '戦慄',
                'region' => '福岡県',
                'genre' => '居酒屋',
                'description' => '気軽に立ち寄れる居酒屋です。キンキンに冷えたビールと、なんとも言えない絶妙な焼鳥の組み合わせが最高です。仕事帰りの一杯に最適です。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg',
            ],
            [
                'shop_name' => 'ルーク',
                'region' => '東京都',
                'genre' => 'イタリアン',
                'description' => '都会の中心でありながら、古民家を改築した落ち着いた雰囲気のイタリアンレストラン。厳選されたイタリア産トリュフを使用したリゾットが評判です。ゆっくりとした上質な時間をお楽しみください。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg',
            ],
            [
                'shop_name' => '志摩屋',
                'region' => '福岡県',
                'genre' => 'ラーメン',
                'description' => 'ラーメン屋とは思えない店内はカウンター席はもちろん、お座敷や個室も完備しています。その他豊富な一品料理やサイドメニューもあります。ぜひご来店お待ちしております。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg',
            ],
            [
                'shop_name' => '香',
                'region' => '東京都',
                'genre' => '焼肉',
                'description' => '大切な人と過ごす特別な時間を演出します。デートや家族連れなど、幅広いシーンで利用できる焼肉店。皆様のご来店をお待ちしております。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg',
            ],
            [
                'shop_name' => 'JJ',
                'region' => '大阪府',
                'genre' => 'イタリアン',
                'description' => 'ミシュランガイドにも掲載された実績のあるイタリアンレストラン。季節の食材を使ったシェフおまかせコースが人気です。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg',
            ],
            [
                'shop_name' => 'らーめん極み',
                'region' => '東京都',
                'genre' => 'ラーメン',
                'description' => '一杯、一杯にこだわり抜いた至高のラーメンを提供します。スープから麺まで全てが自家製です。味付けも日本人好みのあっさり系。ぜひ一度ご賞味ください。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg',
            ],
        // ]);
        ];

        foreach ($shops as $shop) {
            Shop::create($shop);
        } 
    }
}
