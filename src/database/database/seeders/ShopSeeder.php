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

            [
                'shop_name' => '鳥雨',
                'region' => '大阪府',
                'genre' => '居酒屋', 
                 'description' =>
                '素材の旨味を存分に引き出す為に、塩焼を中心としたお店です。比内地鶏を中心に、厳選素材を職人が備長炭で豪快に焼き上げます。清潔な内装に包まれた大人の隠れ家で贅沢で優雅な時間をお過ごし下さい。',
                 'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg',
            ],
            [
                'shop_name' => '築地色合',
                'region' => '東京都',
                'genre' => '寿司',
                'description' =>
                '鮨好きの方の為の鮨屋として、迫力ある大きさの握りを1貫ずつ提供致します。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg',
            ],
            [
                'shop_name' => '晴海',
                'region' => '大阪府',
                'genre' => '焼肉',
                'description' =>
                '毎年チャンピオン牛を買い付け、仙台市長から表彰されるほどの上質な仕入れをする精肉店オーナーの本当に美味しい国産牛を食べてもらいたいという思いから誕生したお店です。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg',
            ],
            [
                'shop_name' => '三子',
                'region' => '福岡県',
                'genre' => '焼肉',
                'description' =>
                '最高級の美味しいお肉で日々の疲れを軽減していただければと贅沢にサーロインを盛り込んだ御膳をご用意しております。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg',
            ],
            [
                'shop_name' => '八戒',
                'region' => '東京都',
                'genre' => '居酒屋',
                'description' =>
                '当店自慢の鍋や焼き鳥などお好きなだけ堪能できる食べ放題プランをご用意しております。飲み放題は2時間と3時間がございます。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg',
            ],
            [
                'shop_name' => '福助',
                'region' => '大阪府',
                'genre' => '寿司',
                'description' =>
                'ミシュラン掲載店で磨いた、寿司職人の旨さへのこだわりはもちろん、 食事をゆっくりと楽しんでいただける空間作りも意識し続けております。 接待や大切なお食事にはぜひご利用ください。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg',
            ],
            [
                'shop_name' => 'ラー北',
                'region' => '東京都',
                'genre' => 'ラーメン',
                'description' =>
                'お昼にはランチを求められるサラリーマン、夕方から夜にかけては、学生や会社帰りのサラリーマン、小上がり席もありファミリー層にも大人気です。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/ramen.jpg',
            ],


            [
                'shop_name' => '翔',
                'region' => '大阪府',
                'genre' => '居酒屋',
                'description' =>
                '博多出身の店主自ら厳選した新鮮な旬の素材を使ったコース料理をご提供します。一人一人のお客様に目が届くようにしております。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/izakaya.jpg',
            ],
            [
                'shop_name' => '経緯',
                'region' => '東京都',
                'genre' => '寿司',
                'description' =>
                '職人が一つ一つ心を込めて丁寧に仕上げた、江戸前鮨ならではの味をお楽しみ頂けます。鮨に合った希少なお酒も数多くご用意しております。他にはない海鮮太巻き、当店自慢の蒸し鮑、是非ご賞味下さい。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg',
            ],
            [
                'shop_name' => '漆',
                'region' => '東京都',
                'genre' => '焼肉',
                'description' =>
                '店内に一歩足を踏み入れると、肉の焼ける音と芳香が猛烈に食欲を掻き立ててくる。そんな漆で味わえるのは至極の焼き肉です。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/yakiniku.jpg',
            ],
            [
                'shop_name' => 'THE TOOL',
                'region' => '福岡県',
                'genre' => 'イタリアン',
                'description' =>
                '非日常的な空間で日頃の疲れを癒し、ゆったりとした上質な時間を過ごせる大人の為のレストラン&バーです。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/italian.jpg',
            ],
            [
                'shop_name' => '木船',
                'region' => '大阪府',
                'genre' => '寿司',
                'description' =>
                '毎日店主自ら市場等に出向き、厳選した魚介類が、お鮨をはじめとした繊細な料理に仕立てられます。また、選りすぐりの種類豊富なドリンクもご用意しております。',
                'image_url' => 'https://coachtech-matter.s3-ap-northeast-1.amazonaws.com/image/sushi.jpg',
            ],
        // ]);
        ];

        foreach ($shops as $shop) {
            Shop::create($shop);
        } 
    }
}
