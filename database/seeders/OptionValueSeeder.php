<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class OptionValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $OptionValues = [
            [
                'category_seflink' => 'oyuncaqlar',
                'option_title' => [
                    'Malın tipi' => [
                        'İnkişaf etdirici oyuncaqlar',
                        'İnteraktiv oyuncaqlar',
                        'Konstruktorlar',
                        'Kuklalar və aksesuarlar',
                        'Kvadrokopterlər',
                        'Oyun çadırları və evciklər',
                        'Oyun dəstləri',
                        'Oyun xalçaları',
                        'Oyuncaq fiqurlar',
                        'Oyuncaq nəqliyyatı',
                        'Oyuncaq silahlar',
                        'Yumşaq oyuncaqlar',
                    ],
                ],
            ],
            [
                'category_seflink' => 'carpayilar-ve-besikler',
                'option_title' => [
                    'Malın tipi' => [
                        'Beşiklər',
                        'Uşaq çarpayıları',
                        'Yenilənən uşaq şezlonqları və kreslolar',
                    ],
                ],
            ],
            [
                'category_seflink' => 'usaq-mebeli',
                'option_title' => [
                    'Malın tipi' => [
                        'Uşaq dolabları və rəfləri',
                        'Uşaq masaları',
                        'Uşaq mebel dəstləri',
                        'Uşaq oturacaqları və taburetləri',
                    ],
                ],
            ],
            [
                'category_seflink' => 'usaq-qidasi-ve-beslenmesi',
                'option_title' => [
                    'Malın tipi' => [
                        'Bəslənmə qabları',
                        'Əmziklər və diş çıxaranlar',
                        'Südsağanlar',
                        'Şüşə üçün sterilizatorlar və qızdırıcılar',
                        'Uşaq qidası',
                    ],
                ],
            ],
            [
                'category_seflink' => 'hamam-ve-gigiyena',
                'option_title' => [
                    'Malın tipi' => [
                        'Hamam nəhsulları',
                        'Uşaq bezləri',
                        'Uşaq güvəcləri',
                    ],
                ],
            ],
            [
                'category_seflink' => 'aksesuarlar',
                'option_title' => [
                    'Malın tipi' => [
                        'Açarlıqlar',
                        'Alışqanlar',
                        'Çamadanlar',
                        'Çantalar',
                        'Çətirlər',
                        'Eynəklər',
                        'Hədiyyə və suvenirlər',
                        'Kəmərlər',
                        'Portmone və pul kisələri',
                        'Saç aksesuarları',
                        'Təsbehlər',
                        'Digər',
                    ],
                ],
            ],
            [
                'category_seflink' => 'mebeller',
                'option_title' => [
                    'Malın tipi' => [
                        'Bufetlər və servantlar',
                        'Çarpayılar',
                        'Dəhliz mebeli',
                        'Divanlar və kreslolar',
                        'Dolablar və komodlar',
                        'Döşəklər',
                        'Masalar və oturacaqlar',
                        'Mətbəx mebelləri',
                        'Ofis mebeli',
                        'Puflar və banketkalar',
                        'Qonaq otağı mebeli',
                        'Rəflər',
                        'Tumbalar',
                        'Yataq otağı mebeli',
                        'Digər',
                    ],
                ],
            ],
            [
                'category_seflink' => 'erzaq',
                'option_title' => [
                    'Malın tipi' => [
                        'Bal',
                        'Çay və qəhvə',
                        'Çərəz və quru meyvələr',
                        'Ədviyyatlar',
                        'Ət və dəniz məhsulları',
                        'İçkilər',
                        'Meyvə və tərəvəzlər',
                        'Mürəbbə və doşab',
                        'Sirkə və souslar',
                        'Şirniyyat və un məmulatları',
                        'Süd və süd məhsulları',
                        'Turşu və şorabalar',
                        'Yağlar',
                        'Yumurta',
                        'Digər',
                    ],
                ],
            ],
            [
                'category_seflink' => 'bitkiler',
                'option_title' => [
                    'Malın tipi' => [
                        'Ağaclar və tinglər',
                        'Dibçəklər',
                        'Güllər',
                        'Otaq bitkiləri',
                        'Qazonlar',
                    ],
                ],
            ],
            [
                'category_seflink' => 'xalcalar-ve-aksesuarlar',
                'option_title' => [
                    'Malın tipi' => [
                        'Xalçalar',
                        'Kilimlər',
                        'Palazlar',
                        'Hamam və tualet üçün xalçalar',
                        'Qapı qabağı xalçalar',
                    ],
                ],
            ],
            [
                'category_seflink' => 'ev-tekstili',
                'option_title' => [
                    'Malın tipi' => [
                        'Dəsmallar',
                        'Mətbəx üçün tekstil',
                        'Pərdələr və jalüzlər',
                        'Pledlər və örtüklər',
                        'Yastıklar',
                        'Yataq tekstili',
                        'Yorğanlar',
                        'Digər',
                    ],
                ],
            ],
            [
                'category_seflink' => 'ev-ve-bag-ucun-isiqlandirma',
                'option_title' => [
                    'Malın tipi' => [
                        'Tavan və asma çilçıraqlar',
                        'Divar çiraqları',
                        'Yerüstü və masaüstü çıraqlar',
                        'Küçə çiraqları',
                        'Lampalar',
                        'Projektorlar',
                        'Spotlar və trek çıraqları',
                        'İşıqlandırılma üçün aksesuarlar',
                    ],
                ],
            ],
            [
                'category_seflink' => 'dekor-ve-interyer',
                'option_title' => [
                    'Malın tipi' => [
                        'Bayram dekoru və aksesuarları',
                        'Fotoçərçivələr',
                        'Güldanlar',
                        'Güzgülər',
                        'Heykəlciklər və fiqurlar',
                        'Pul daxılları və mücrülər',
                        'Qapılar üçün stoperlər',
                        'Rəsmlər və pannolar',
                        'Saatlar, zəngli saatlar',
                        'Şamlar və şamdanlar',
                        'Süni güllər və meyvələr',
                    ],
                ],
            ],
            [
                'category_seflink' => 'bag-ve-bostan',
                'option_title' => [
                    'Malın tipi' => [
                        'Bağ çətirləri',
                        'Bağ ləvazimatları',
                        'Həşəratlarla və gəmirilərlə mübarizə',
                        'Manqallar və aksesuarlar',
                        'Otbiçənlər və trimmerlər',
                        'Qamaklar, yelləncəklər və şezlonqlar',
                        'Qaz balonları',
                        'Su çənləri',
                        'Su nasosları',
                        'Suvarma, suyun çəkilməsi və drenaj avadanlıqları',
                        'Toxumlar və gübrələr',
                    ],
                ],
            ],
            [
                'category_seflink' => 'ev-teserrufati-mallari',
                'option_title' => [
                    'Malın tipi' => [
                        'Əşyaların saxlanılması və orqanayzerlər',
                        'Hamam və tualet aksesuarları',
                        'Məişət kimyəvi maddələri',
                        'Paltar qurutma asılqanları və ipləri',
                        'Təmizlik əşyaları',
                        'Ütüləmə lövhələri',
                        'Zibil vedrələri və torbaları',
                        'Digər',
                    ],
                ],
            ],
            [
                'category_seflink' => 'kompyuter-aksesuarlari',
                'option_title' => [
                    'Malın tipi' => [
                        'Kabellər və adapterlər',
                        'Klaviaturalar və kompyuter siçanları',
                        'UPS',
                        'USB fləş və yaddaş kartları',
                        'Web kameralar',
                        'Digər',
                    ],
                ],
            ],
            [
                'category_seflink' => 'tehlukesizlik-sistemleri',
                'option_title' => [
                    'Malın tipi' => [
                        'Ağıllı ev',
                        'Domofonlar',
                        'Girişə nəzarət və idarəetmə sistemi',
                        'Metal detektorları',
                        'Siqnalizasiya sistemləri',
                        'Video müşahidə',
                        'Yanğınsöndürmə avadanlığı',
                        'Yol hərkəti təhlükəsizliyi avadanlığı',
                        'Digər',
                    ],
                ],
            ],
            [
                'category_seflink' => 'komponentler-ve-monitorlar',
                'option_title' => [
                    'Malın tipi' => [
                        'Ana plataları',
                        'Batareyalar',
                        'CD, DVD, Blu-ray',
                        'Keyslər və korpuslar',
                        'Kulerlər və ventilyatorlar',
                        'Monitorlar və ekranlar',
                        'Operativ yaddaş (RAM)',
                        'Prosessorlar (CPU)',
                        'Qida blokları',
                        'Sərt disklər (HDD, SSD)',
                        'Video kartlar',
                        'Digər',
                    ],
                ],
            ],
            [
                'category_seflink' => 'sebeke-ve-server-avadanligi',
                'option_title' => [
                    'Malın tipi' => [
                        'Giriş nöqtələri',
                        'IP-telefoniya sistemləri',
                        'Kommutatorlar',
                        'Modemlər',
                        'Routerlər',
                        'Serverlər',
                        'Şəbəkə adapterləri',
                        'SFP modul və transiverlər',
                        'Siqnal gücləndiriciləri və antenlər',
                        'Sərt disklər (HDD, SSD)',
                        'USB modemlər',
                        'Şəbəkə avadanlığı aksesuarları',
                    ],
                ],
            ],
            [
                'category_seflink' => 'kempinq-ovculuq-ve-bagciliq',
                'option_title' => [
                    'Malın tipi' => [
                        'Balıqçı aksesuarları',
                        'Binokllar',
                        'Bıçaq və alətlər',
                        'Çadrlar',
                        'Fənərlər',
                        'İzotermik və ovçu çantaları',
                        'Kemping və piknik qabları',
                        'Digər',
                    ],
                ],
            ],
            [
                'category_seflink' => 'nomreler-ve-sim-kartlar',
                'option_title' => [
                    'Operator' => [
                        'Azercell',
                        'Bakcel',
                        'Nar',
                        'Naxtel',
                        'Katel CDMA',
                        'Digər',
                    ],
                ],
            ],
            [
                'category_seflink' => 'tanisliq',
                'option_title' => [
                    'Tanışlıq məqsədi' => [
                        'Sevgi və münasibətlər',
                        'Dotluq və ünsiyyət',
                        'Ailə qurmaq',
                    ],
                    'Elanın növü' => [
                        'Qız oğlan axtarır',
                        'Oğlan qız axtarır',
                    ],
                ],
            ],
            [
                'category_seflink' => 'ehtiyyat-hisseleri-ve-aksesuarlar',
                'option_title' => [
                    'Elanın növü' => [
                        'Aksesuarlar',
                        'Audio və video texnika',
                        'Avto kosmetika və kimya',
                        'Avtomobil üçün elanlar',
                        'Diaqnostika cihazları',
                        'Ehtiyyat hissələri',
                        'GPS-naviqatorlar',
                        'Şinlər, disklər və təkərlər',
                        'Siqnalizasiyalar',
                        'Videoqeydiyyatçılar',
                        'Digər',
                    ],
                ],
            ],
            [
                'category_seflink' => 'xaricde-emlak',
                'option_title' => [
                    'Elanın tipi' => [
                        'Satış',
                        'İcarə',
                    ],
                ],
            ],
            [
                'category_seflink' => 'menziller',
                'option_title' => [
                    'Elanın tipi' => [
                        'Satılır',
                        'Kirayə verilir',
                    ],
                    'Binanın tipi' => [
                        'Yeni tikili',
                        'Köhnə tikili',
                    ],
                ],
            ],
            [
                'category_seflink' => 'obyektler-ve-ofisler',
                'option_title' => [
                    'Elanın tipi' => [
                        'Satılır',
                        'İcarəyə verilir',
                    ],
                    'Əmlakın növü' => [
                        'Ofis',
                        'Obyekt',
                        'Mağaza',
                    ],
                ],
            ],
            [
                'category_seflink' => 'heyet-evleri-bag-evleri',
                'option_title' => [
                    'Elanın tipi' => [
                        'Satılır',
                        'İcarəyə verilir',
                    ],
                    'Əmlakın növü' => [
                        'Bağ evi',
                        'Həyət evi',
                        'Villa',
                    ],
                ],
            ],
            [
                'category_seflink' => 'is-axtariram',
                'option_title' => [
                    'Fəaliyyət sahəsi' => [
                        'Avtobiznes və servis',
                        'Dizayn',
                        'Təcrübəsiz',
                        'Ev personalı və təmizlik',
                        'Gözəllik, Fitnes və idman',
                        'HR, Kadrlar',
                        'Hüquqşunaslıq',
                        'İnformasiya texnologiyaları, telekom',
                        'İnzibati heyət',
                        'Maliyyə',
                        'Marketing, reklam, PR',
                        'Nəqliyyat, Logistika, anbar',
                        'Restoran işi, Turizm',
                        'Satış',
                        'Sənaye və istehsalat',
                        'Təhlükəsizlik',
                        'Təhsil və elm',
                        'Tibb və əczaçılıq',
                        'Tikinti və təmir',
                    ],
                    'İş qrafiki' => [
                        'Tam',
                        'Natamam',
                        'Növbəli',
                        'Sərbəst',
                    ],
                    'İş təcrübəsi' => [
                        'Təcrübəsiz',
                        '1 ildən aşağı',
                        '1 ildən 3 ilə qədər',
                        '3 ildən 5 ilə qədər',
                        '5 ildən artıq',
                    ],
                    'Təhsil' => [
                        'Elmi dərəcə',
                        'Ali',
                        'Natamam ali',
                        'Orta texniki',
                        'Orta xüsusi',
                        'Orta',
                    ],
                ],
            ],
            [
                'category_seflink' => 'vakansiyalar',
                'option_title' => [
                    'Fəaliyyət sahəsi' => [
                        'Avtobiznes və servis',
                        'Dizayn',
                        'Təcrübəsiz',
                        'Ev personalı və təmizlik',
                        'Gözəllik, Fitnes və idman',
                        'HR, Kadrlar',
                        'Hüquqşunaslıq',
                        'İnformasiya texnologiyaları, telekom',
                        'İnzibati heyət',
                        'Maliyyə',
                        'Marketing, reklam, PR',
                        'Nəqliyyat, Logistika, anbar',
                        'Restoran işi, Turizm',
                        'Satış',
                        'Sənaye və istehsalat',
                        'Təhlükəsizlik',
                        'Təhsil və elm',
                        'Tibb və əczaçılıq',
                        'Tikinti və təmir',
                    ],
                    'Şirkət növü' => [
                        'Birbaşa işə götürən',
                        'Uşə düzəltmə agentliyi',
                    ],
                    'İş qrafiki' => [
                        'Tam',
                        'Natamam',
                        'Növbəli',
                        'Sərbəst',
                    ],
                    'İş təcrübəsi' => [
                        'Təcrübəsiz',
                        '1 ildən aşağı',
                        '1 ildən 3 ilə qədər',
                        '3 ildən 5 ilə qədər',
                        '5 ildən artıq',
                    ],
                    'Təhsil' => [
                        'Elmi dərəcə',
                        'Ali',
                        'Natamam ali',
                        'Orta texniki',
                        'Orta xüsusi',
                        'Orta',
                    ],
                ],
            ],
            [
                'category_seflink' => 'neqliyyat-vasitelerinin-icaresi',
                'option_title' => [
                    'İcarə növü' => [
                        'Avtobus və mikroavtobus icarəsi',
                        'Avtomobil icarəsi',
                        'Motosiklet və moped icarəsi',
                        'Xüsusi texnika icarəsi',
                        'Digər',
                    ],
                ],
            ],
            [
                'category_seflink' => 'avtoservis-ve-diaqnostika',
                'option_title' => [
                    'Xidmətin növü' => [
                        'Açar və pultların təmiri',
                        'Avtomobil qapılarının açılması',
                        'Avtorəngsaz işləri',
                        'Diaqnostika və təmir',
                        'Elektron sistemlərinin təmiri',
                        'Proqram təminatı xidmətləri',
                        'Texniki xidməti',
                        'Tüninq və detallaşdırma',
                        'Digər',
                    ],
                ],
            ],





















            
            
            [
                'category_seflink' => 'avtomobiller',
                'option_title' => [
                    'Marka' => [
                        'LADA VAZ',
                        'Mercedes',
                        'Hyundai',
                        'Opel',
                        'Toyota',
                    ],
                    'Rəng' => [
                        'Ağ',
                        'Bej',
                        'Boz',
                        'Çəhrayı',
                    ],
                    'Kuzov növü' => [
                        'Sedan',
                        'Universal',
                        'Heçbek',
                    ],
                ],
            ],
        ];

        foreach ($OptionValues as $item) {
            // Kategori ID'yi al
            $category = DB::table('categories')->where('seflink', $item['category_seflink'])->first();
            if (!$category) {
                echo "Kategori bulunamadı: " . $item['category_seflink'] . "\n";
                continue;
            }

            $categoryId = $category->id;

            foreach ($item['option_title'] as $optionTitle => $values) {
                // Option ID'yi al
                $option = DB::table('options')->where('title', $optionTitle)->where('category_id', $categoryId)->first();
                if (!$option) {
                    echo "Option bulunamadı: " . $optionTitle . "\n";
                    continue;
                }

                $optionId = $option->id;

                foreach ($values as $value) {
                    DB::table('option_values')->insert([
                        'category_id' => $categoryId,
                        'option_id' => $optionId,
                        'value' => $value,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
