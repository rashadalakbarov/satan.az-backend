<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Option;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $OptionGroups = [
            [
                'category_seflinks' => ['oyuncaqlar', 'avtomobil-oturacaqlari', 'usaq-arabalari', 'usaq-avtomobilleri', 'carpayilar-ve-besikler', 'usaq-dasiyicilari', 'usaq-geyimi', 'usaq-mebeli', 'usaq-qidasi-ve-beslenmesi', 'manejler', 'mektebliler-ucun', 'yurutecler', 'hamam-ve-gigiyena', 'usaq-tekstili', 'qidalanma-oturacaqlari', 'geyim-ve-ayaqqabilar', 'saat-ve-zinet-esyalari', 'aksesuarlar', 'saglamliq-ve-gozellik', 'elektron-siqaretler-ve-tutun-qizdiricilari', 'masaustu-kompyuterler', 'biznes-ucun-avadanliq', 'biznes-ucun-avadanliq', 'yuk-masinlari-ve-qosqular', 'avtobuslar', 'aqrotexnika', 'tikinti-texnikasi', 'motosikletler-ve-mopedler', 'su-neqliyyati', 'ehtiyyat-hisseleri-ve-aksesuarlar', 'avtomobiller' , 'mebeller', 'meiset-texnikasi', 'qab-qacaq-ve-metbex-levazimatlari', 'xalcalar-ve-aksesuarlar', 'ev-tekstili', 'ev-ve-bag-ucun-isiqlandirma', 'dekor-ve-interyer', 'bag-ve-bostan', 'ev-teserrufati-mallari', 'kompyuter-aksesuarlari', 'oyunlar-pultlar-ve-proqramlar', 'komponentler-ve-monitorlar', 'planset-ve-elektron-kitablar', 'noutbuklar-ve-netbuklar', 'ofis-avadanligi-ve-istehlak-materiallari', 'telefonlar', 'nomreler-ve-sim-kartlar', 'fototexnika', 'sebeke-ve-server-avadanligi', 'televizorlar-ve-aksesuarlar', 'smart-saat-ve-qolbaqlar', 'velosipedler', 'kolleksiyalar', 'musiqi-aletleri', 'idman-ve-asude', 'kitab-ve-jurnallar', 'kempinq-ovculuq-ve-bagciliq', 'audio-ve-video'],
                'title' => 'Yeni?',
                'type' => 'check',
                'required' => 2,
            ],
            [
                'category_seflinks' => ['oyuncaqlar', 'avtomobil-oturacaqlari', 'usaq-arabalari', 'usaq-avtomobilleri', 'carpayilar-ve-besikler', 'usaq-dasiyicilari', 'usaq-geyimi', 'usaq-mebeli', 'usaq-qidasi-ve-beslenmesi', 'suruskenler-ve-meydancalar', 'manejler', 'mektebliler-ucun', 'yurutecler', 'hamam-ve-gigiyena', 'usaq-tekstili', 'qidalanma-oturacaqlari', 'diger', 'geyim-ve-ayaqqabilar', 'saat-ve-zinet-esyalari', 'aksesuarlar', 'saglamliq-ve-gozellik', 'elektron-siqaretler-ve-tutun-qizdiricilari', 'masaustu-kompyuterler', 'biznes-ucun-avadanliq', 'biznes-ucun-avadanliq', 'gemiriciler', 'atlar', 'dovsanlar', 'heyvanlar-ucun-mehsullar', 'kt-heyvanlari', 'akvariumlar-ve-baliqlar', 'quslar', 'pisikler', 'itler', 'ehtiyyat-hisseleri-ve-aksesuarlar', 'temir-ve-tikinti',  'mebeller', 'meiset-texnikasi', 'qab-qacaq-ve-metbex-levazimatlari', 'erzaq', 'bitkiler', 'xalcalar-ve-aksesuarlar', 'ev-tekstili', 'ev-ve-bag-ucun-isiqlandirma', 'dekor-ve-interyer', 'bag-ve-bostan', 'ev-teserrufati-mallari', 'audio-ve-video', 'kompyuter-aksesuarlari', 'oyunlar-pultlar-ve-proqramlar', 'komponentler-ve-monitorlar', 'planset-ve-elektron-kitablar', 'noutbuklar-ve-netbuklar', 'ofis-avadanligi-ve-istehlak-materiallari', 'telefonlar', 'nomreler-ve-sim-kartlar', 'fototexnika', 'sebeke-ve-server-avadanligi', 'televizorlar-ve-aksesuarlar', 'smart-saat-ve-qolbaqlar', 'velosipedler', 'kolleksiyalar', 'musiqi-aletleri', 'idman-ve-asude', 'kitab-ve-jurnallar', 'kempinq-ovculuq-ve-bagciliq'],
                'title' => 'Çatdırılma?',
                'type' => 'check',
                'required' => 2,
            ],
            [
                'category_seflinks' => ['oyuncaqlar', 'carpayilar-ve-besikler', 'usaq-mebeli', 'usaq-qidasi-ve-beslenmesi', 'hamam-ve-gigiyena', 'aksesuarlar', 'mebeller', 'erzaq', 'bitkiler', 'xalcalar-ve-aksesuarlar', 'ev-tekstili', 'ev-ve-bag-ucun-isiqlandirma', 'dekor-ve-interyer', 'bag-ve-bostan', 'ev-teserrufati-mallari', 'kompyuter-aksesuarlari', 'tehlukesizlik-sistemleri', 'komponentler-ve-monitorlar', 'sebeke-ve-server-avadanligi', 'kempinq-ovculuq-ve-bagciliq'],
                'title' => 'Malın tipi',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['mektebliler-ucun', 'saat-ve-zinet-esyalari', 'saglamliq-ve-gozellik', 'elektron-siqaretler-ve-tutun-qizdiricilari', 'temir-ve-tikinti', 'meiset-texnikasi', 'qab-qacaq-ve-metbex-levazimatlari', 'audio-ve-video', 'oyunlar-pultlar-ve-proqramlar', 'biznes-ucun-avadanliq', 'biznes-ucun-avadanliq', 'heyvanlar-ucun-mehsullar', 'yuk-masinlari-ve-qosqular', 'aqrotexnika', 'tikinti-texnikasi', 'motosikletler-ve-mopedler', 'su-neqliyyati', 'planset-ve-elektron-kitablar', 'ofis-avadanligi-ve-istehlak-materiallari', 'fototexnika', 'televizorlar-ve-aksesuarlar', 'smart-saat-ve-qolbaqlar', 'biletler-ve-seyahetler', 'velosipedler', 'kolleksiyalar', 'musiqi-aletleri', 'idman-ve-asude', 'kitab-ve-jurnallar'],
                'title' => 'Malın növü',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['avtobuslar', 'tikinti-texnikasi', 'motosikletler-ve-mopedler', 'avtomobiller', 'noutbuklar-ve-netbuklar', 'telefonlar'],
                'title' => 'Marka',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['usaq-geyimi'],
                'title' => 'Geyim tipi',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['geyim-ve-ayaqqabilar', 'pisikler', 'itler'],
                'title' => 'Cins',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['texnika-temiri', 'temir-ve-tikinti', 'logistika', 'avtoservis-ve-diaqnostika'],
                'title' => 'Xidmətin növü',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['neqliyyat-vasitelerinin-icaresi'],
                'title' => 'İcarə növü',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['vakansiyalar', 'is-axtariram'],
                'title' => 'Fəaliyyət sahəsi',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['vakansiyalar'],
                'title' => 'Şirkət növü',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['vakansiyalar', 'is-axtariram'],
                'title' => 'İş qrafiki',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['vakansiyalar', 'is-axtariram'],
                'title' => 'İş təcrübəsi',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['vakansiyalar', 'is-axtariram'],
                'title' => 'Təhsil',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['vakansiyalar'],
                'title' => 'İş yerinin ünvanı',
                'type' => 'text',
                'required' => 2,
            ],
            [
                'category_seflinks' => ['vakansiyalar', 'is-axtariram'],
                'title' => 'Distant iş?',
                'type' => 'check',
                'required' => 2,
            ],
            [
                'category_seflinks' => ['heyet-evleri-bag-evleri', 'obyektler-ve-ofisler'],
                'title' => 'Əmlakın növü',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['menziller', 'heyet-evleri-bag-evleri', 'xaricde-emlak', 'obyektler-ve-ofisler'],
                'title' => 'Elanın tipi',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['menziller'],
                'title' => 'Binanın tipi',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['menziller', 'heyet-evleri-bag-evleri', 'xaricde-emlak'],
                'title' => 'Sahə, m<sup>2</sup>',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['menziller', 'heyet-evleri-bag-evleri'],
                'title' => 'Otaq sayı',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['menziller', 'heyet-evleri-bag-evleri', 'torpaq', 'obyektler-ve-ofisler'],
                'title' => 'Yerləşmə yeri',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['torpaq'],
                'title' => 'Sahə, sot',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['yuk-masinlari-ve-qosqular', 'avtobuslar', 'aqrotexnika', 'tikinti-texnikasi', 'motosikletler-ve-mopedler', 'avtomobiller'],
                'title' => 'Buraxılış ili',
                'type' => 'text',
                'required' => 2,
            ],
            [
                'category_seflinks' => ['yuk-masinlari-ve-qosqular', 'avtobuslar', 'aqrotexnika', 'tikinti-texnikasi', 'motosikletler-ve-mopedler', 'avtomobiller'],
                'title' => 'Yürüş, km',
                'type' => 'text',
                'required' => 2,
            ],
            [
                'category_seflinks' => ['yuk-masinlari-ve-qosqular', 'avtobuslar', 'motosikletler-ve-mopedler', 'avtomobiller'],
                'title' => 'Mühərrik, sm<sup>3</sup>',
                'type' => 'text',
                'required' => 2,
            ],
            [
                'category_seflinks' => ['avtobuslar', 'avtomobiller'],
                'title' => 'Yanacaq növü',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['avtomobiller'],
                'title' => 'Rəng',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['motosikletler-ve-mopedler'],
                'title' => 'Model',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['ehtiyyat-hisseleri-ve-aksesuarlar', 'tanisliq'],
                'title' => 'Elanın növü',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['avtomobiller'],
                'title' => 'Sürətlər qutusu',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['avtomobiller'],
                'title' => 'Kuzov növü',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['nomreler-ve-sim-kartlar'],
                'title' => 'Operator',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['nomreler-ve-sim-kartlar'],
                'title' => 'Telefon nömrəsi',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['tanisliq'],
                'title' => 'Tanışlıq məqsədi',
                'type' => 'select',
                'required' => 1,
            ],
            [
                'category_seflinks' => ['tanisliq'],
                'title' => 'Yaş',
                'type' => 'text',
                'required' => 1,
            ],
        ];

        foreach ($OptionGroups as $optionGroup) {
            foreach ($optionGroup['category_seflinks'] as $seflink) {
                $category = Category::where('seflink', $seflink)->first();

                if ($category) {
                    Option::create([
                        'category_id' => $category->id,
                        'title'       => $optionGroup['title'],
                        'type'        => $optionGroup['type'],
                        'required'    => $optionGroup['required'],
                    ]);
                }
            }
        }
    }
}
