<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ana Kategoriler
        $mainCategories  = [            
            [
                'name' => 'Uşaq aləmi',
                'image' => 'assets/img/categories/usaq_alemi.png',
            ],
            [
                'name' => 'Şəxsi əşyalar',
                'image' => 'assets/img/categories/ozel_esyalar.png',
            ],
            [
                'name' => 'Ev və bağ üçün',
                'image' => 'assets/img/categories/ev_bag_ucun.png',
            ],
            [
                'name' => 'Elektronika',
                'image' => 'assets/img/categories/elektronika.png',
            ],
            [
                'name' => 'Hobbi və asudə',
                'image' => 'assets/img/categories/hobby.png',
            ],
            [
                'name' => 'Nəqliyyat',
                'image' => 'assets/img/categories/avtomobil.png',
            ],
            [
                'name' => 'Daşınmaz əmlak',
                'image' => 'assets/img/categories/dasinmaz_emlak.png',
            ],
            [
                'name' => 'İş elanları',
                'image' => 'assets/img/categories/is_elanlari.png',
            ],
            [
                'name' => 'Heyvanlar',
                'image' => 'assets/img/categories/heyvanlar.png',
            ],
            [
                'name' => 'Xidmətlər və biznes',
                'image' => 'assets/img/categories/services_business.png',
            ],
        ];

        $insertedMain = [];

        foreach ($mainCategories as $mainCategory) {
            $record = Category::create([
                'image' => $mainCategory['image'],
                'name' => $mainCategory['name'],
                'seflink' => Str::slug($mainCategory['name']),
                'parent_id' => null,
            ]);

            // Kategori adı => ID eşlemesi
            $insertedMain[$mainCategory['name']] = $record->id;
        }

        // Alt Kategoriler
        $subCategories  = [   
            // Uşaq aləmi         
            [
                'name' => 'Avtomobil oturacaqları',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'name' => 'Oyuncaqlar',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'name' => 'Uşaq arabaları',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'name' => 'Uşaq avtomobilləri',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'name' => 'Çarpayılar və beşiklər',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'name' => 'Uşaq daşıyıcıları',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'name' => 'Uşaq geyimi',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'name' => 'Uşaq mebeli',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'name' => 'Uşaq qidası və bəslənməsi',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'name' => 'Sürüşkənlər və meydançalar',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'name' => 'Manejlər',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
             [
                'name' => 'Məktəblilər üçün',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'name' => 'Yürütəclər',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
             [
                'name' => 'Hamam və gigiyena',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'name' => 'Uşaq tekstili',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
             [
                'name' => 'Qidalanma oturacaqları',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],
            [
                'name' => 'digər',
                'parent_id' => $insertedMain['Uşaq aləmi'],
            ],

            // Şəxsi əşyalar
            [
                'name' => 'Geyim və ayaqqabılar',
                'parent_id' => $insertedMain['Şəxsi əşyalar'],
            ],
            [
                'name' => 'Saat və zinət əşyaları',
                'parent_id' => $insertedMain['Şəxsi əşyalar'],
            ],
            [
                'name' => 'Aksesuarlar',
                'parent_id' => $insertedMain['Şəxsi əşyalar'],
            ],
            [
                'name' => 'Sağlamlıq və gözəllik',
                'parent_id' => $insertedMain['Şəxsi əşyalar'],
            ],
            [
                'name' => 'itmiş əşyalar',
                'parent_id' => $insertedMain['Şəxsi əşyalar'],
            ],
            [
                'name' => 'Elektron siqaretlər və tütün qızdırıcıları',
                'parent_id' => $insertedMain['Şəxsi əşyalar'],
            ],

            // Ev və bağ üçün
            [
                'name' => 'Təmir və tikinti',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'name' => 'Mebellər',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'name' => 'Məişət texnikası',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'name' => 'Qab-qacaq və mətbəx ləvazimatları',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'name' => 'Ərzaq',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'name' => 'Bitkilər',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'name' => 'Xalçalar və aksesuarlar',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'name' => 'Ev tekstili',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'name' => 'Ev və bağ üçün işıqlandırma',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'name' => 'Dekor və interyer',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'name' => 'Bağ və bostan',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],
            [
                'name' => 'Ev təsərrüfatı malları',
                'parent_id' => $insertedMain['Ev və bağ üçün'],
            ],

            // Elektronika
            [
                'name' => 'Audio və video',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'name' => 'Kompyuter aksesuarları',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'name' => 'Oyunlar, pultlar və proqramlar',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'name' => 'Masaüstü kompyuterlər',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'name' => 'Komponentlər və monitorlar',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'name' => 'Planşet və elektron kitablar',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'name' => 'Noutbuklar və netbuklar',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'name' => 'Ofis avadanlığı və istehlak materialları',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'name' => 'Telefonlar',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'name' => 'Nömrələr və SİM-kartlar',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'name' => 'Fototexnika',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'name' => 'Smart saat və qolbaqlar',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'name' => 'Televizorlar və aksesuarlar',
                'parent_id' => $insertedMain['Elektronika'],
            ],
            [
                'name' => 'Şəbəkə və server avadanlığı',
                'parent_id' => $insertedMain['Elektronika'],
            ],

            // Hobbi və asudə
            [
                'name' => 'Biletlər və səyahətlər',
                'parent_id' => $insertedMain['Hobbi və asudə'],
            ],
            [
                'name' => 'Velosipedlər',
                'parent_id' => $insertedMain['Hobbi və asudə'],
            ],
            [
                'name' => 'Kolleksiyalar',
                'parent_id' => $insertedMain['Hobbi və asudə'],
            ],
            [
                'name' => 'Musiqi alətləri',
                'parent_id' => $insertedMain['Hobbi və asudə'],
            ],
            [
                'name' => 'İdman və asudə',
                'parent_id' => $insertedMain['Hobbi və asudə'],
            ],
            [
                'name' => 'Kitab və jurnallar',
                'parent_id' => $insertedMain['Hobbi və asudə'],
            ],
            [
                'name' => 'Kempinq, ovçuluq və bağçılıq',
                'parent_id' => $insertedMain['Hobbi və asudə'],
            ],
            [
                'name' => 'Tanışlıq',
                'parent_id' => $insertedMain['Hobbi və asudə'],
            ],
 
            // Nəqliyyat
            [
                'name' => 'Avtomobillər',
                'parent_id' => $insertedMain['Nəqliyyat'],
            ],
            [
                'name' => 'Ehtiyyat hissələri və aksesuarlar',
                'parent_id' => $insertedMain['Nəqliyyat'],
            ],
            [
                'name' => 'Su nəqliyyatı',
                'parent_id' => $insertedMain['Nəqliyyat'],
            ],
            [
                'name' => 'Motosikletlər və mopedlər',
                'parent_id' => $insertedMain['Nəqliyyat'],
            ],
            [
                'name' => 'Tikinti texnikası',
                'parent_id' => $insertedMain['Nəqliyyat'],
            ],
            [
                'name' => 'Aqrotexnika',
                'parent_id' => $insertedMain['Nəqliyyat'],
            ],
            [
                'name' => 'Avtobuslar',
                'parent_id' => $insertedMain['Nəqliyyat'],
            ],
            [
                'name' => 'Yük maşınları və qoşqular',
                'parent_id' => $insertedMain['Nəqliyyat'],
            ],
            [
                'name' => 'Qeydiyyat nişanları',
                'parent_id' => $insertedMain['Nəqliyyat'],
            ],

            // Daşınmaz əmlak
            [
                'name' => 'Mənzillər',
                'parent_id' => $insertedMain['Daşınmaz əmlak'],
            ],
            [
                'name' => 'Həyət evləri, bağ evləri',
                'parent_id' => $insertedMain['Daşınmaz əmlak'],
            ],
            [
                'name' => 'Torpaq',
                'parent_id' => $insertedMain['Daşınmaz əmlak'],
            ],
            [
                'name' => 'Qarajlar',
                'parent_id' => $insertedMain['Daşınmaz əmlak'],
            ],
            [
                'name' => 'Xaricdə əmlak',
                'parent_id' => $insertedMain['Daşınmaz əmlak'],
            ],
            [
                'name' => 'Obyektlər və ofislər',
                'parent_id' => $insertedMain['Daşınmaz əmlak'],
            ],

            // İş elanları
            [
                'name' => 'Vakansiyalar',
                'parent_id' => $insertedMain['İş elanları'],
            ],
            [
                'name' => 'İş axtarıram',
                'parent_id' => $insertedMain['İş elanları'],
            ],

            // Heyvanlar
            [
                'name' => 'İtlər',
                'parent_id' => $insertedMain['Heyvanlar'],
            ],
            [
                'name' => 'Pişiklər',
                'parent_id' => $insertedMain['Heyvanlar'],
            ],
            [
                'name' => 'Quşlar',
                'parent_id' => $insertedMain['Heyvanlar'],
            ],
            [
                'name' => 'Akvariumlar və balıqlar',
                'parent_id' => $insertedMain['Heyvanlar'],
            ],
            [
                'name' => 'K/T heyvanları',
                'parent_id' => $insertedMain['Heyvanlar'],
            ],
            [
                'name' => 'Heyvanlar üçün məhsullar',
                'parent_id' => $insertedMain['Heyvanlar'],
            ],
            [
                'name' => 'Dovşanlar',
                'parent_id' => $insertedMain['Heyvanlar'],
            ],
            [
                'name' => 'Atlar',
                'parent_id' => $insertedMain['Heyvanlar'],
            ],
            [
                'name' => 'Gəmiricilər',
                'parent_id' => $insertedMain['Heyvanlar'],
            ],
            [
                'name' => 'Digər heyvanlar',
                'parent_id' => $insertedMain['Heyvanlar'],
            ],

            // Xidmətlər və biznes
            [
                'name' => 'Avadanlığın icarəsi',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Avadanlıqların quraşdırılması',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Biznes üçün avadanlıq',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Avtoservis və diaqnostika',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Dayələr, baxıcılar',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Foto və video çəkiliş xidmətləri',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Gözəllik, sağlamlıq',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Hüquq xidmətləri',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'İT, internet, reklam',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Logistika',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Mebel yığılması və təmiri',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Musiqi, əyləncə və tədbirlər',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Mühasibat xidmətləri',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Nəqliyyat vasitələrinin icarəsi',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Qidalanma, keytering',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Reklam, dizayn və poliqrafiya',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Siğorta qiymətləri',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Təhlükəsizlik sistemləri',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Təlim, hazırlıq kursları',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Təmir və tikinti',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Təmizlik',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Tərcümə',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Texnika təmiri',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Tibbi xidmətlər',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
            [
                'name' => 'Digər',
                'parent_id' => $insertedMain['Xidmətlər və biznes'],
            ],
        ];

        foreach ($subCategories as $sub) {
            Category::create([
                'name' => $sub['name'],
                'seflink' => Str::slug($sub['name']),
                'parent_id' => $sub['parent_id'],
            ]);
        }
    }
}
