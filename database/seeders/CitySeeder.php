<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Ağcabədi',
            'Ağdam',
            'Ağdaş',
            'Ağdərə',
            'Ağstafa',
            'Ağsu',
            'Astara',
            'Bakı',
            'Balakən',
            'Beyləqan',
            'Bərdə',
            'Biləsuvar',
            'Cəbrayıl',
            'Cəlilabad',
            'Culfa',
            'Daşkəsən',
            'Füzuli',
            'Gədəbəy',
            'Gəncə',
            'Goranboy',
            'Göyçay',
            'Göygöl',
            'Göytəpə',
            'Hacıqabul',
            'Horadiz',
            'İmişli',
            'İsmayıllı',
            'Kəlbəcər',
            'Kürdəmir',
            'Laçın',
            'Lerik',
            'Lənkəran',
            'Masallı',
            'Mingəçevir',
            'Nabran',
            'Naftalan',
            'Naxçıvan',
            'Neftçala',
            'Oğuz',
            'Ordubad',
            'Qax',
            'Qazax',
            'Qəbələ',
            'Qobustan',
            'Quba',
            'Qubadlı',
            'Qusar',
            'Saatlı',
            'Sabirabad',
            'Şabran',
            'Şahbuz',
            'Salyan',
            'Şamaxı',
            'Samux',
            'Şəki',
            'Şəmkir',
            'Şərur',
            'Şirvan',
            'Siyəzən',
            'Sumqayıt',
            'Şuşa',
            'Tərtər',
            'Tovuz',
            'Ucar',
            'Xaçmaz',
            'Xankəndi',
            'Xırdalan',
            'Xızı',
            'Xocalı',
            'Xocavənd',
            'Xudat',
            'Yardımlı',
            'Yevlax',
            'Zaqatala',
            'Zəngilan',
            'Zərdab',
        ];

        foreach ($cities as $city) {
            City::create([
                'name' => $city,
                'slug' => Str::slug($city)
            ]);
        }
    }
}
