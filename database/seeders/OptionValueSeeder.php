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
                'category_seflink' => 'tanisliq',
                'option_title' => [
                    'Tanışlıq məqsədi' => [
                        'Sevgi və münasibətlər',
                        'Dotluq və ünsiyyət',
                        'Ailə qurmaq',
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
