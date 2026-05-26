<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RealProjectsSeeder extends Seeder
{
        public function run(): void
    {

        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        \Illuminate\Support\Facades\DB::table('project_gallery')->truncate();
        \App\Models\Project::truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $projects = [
            ['title' => '1915 Çanakkale Köprüsü', 'scope' => 'Elektrik & Mekanik', 'location' => 'Çanakkale', 'size' => null],
            ['title' => 'TOFAŞ Spor Salonu', 'scope' => 'Mekanik Tesisat', 'location' => 'Bursa', 'size' => '7.500 Kişilik'],
            ['title' => 'Pendik Medical Park', 'scope' => 'Elektromekanik Taahhüt', 'location' => 'İstanbul', 'size' => null],
            ['title' => 'İstanbul Aydın Üni. Sosyal Bilimler Fakültesi', 'scope' => 'Mekanik Tesisat', 'location' => 'İstanbul', 'size' => '80.000 m²'],
            ['title' => 'Sarphan Finanspark C-Blok', 'scope' => 'Mekanik Taahhüt', 'location' => 'İstanbul', 'size' => '50.000 m²'],
            ['title' => 'Carus Cappadocia Otel', 'scope' => 'Elektromekanik Tesisat', 'location' => 'Nevşehir', 'size' => null],
            ['title' => 'Curio by Hilton Yeşil Ev', 'scope' => 'Mekanik & Elektrik', 'location' => 'Sultanahmet, İstanbul', 'size' => null],
            ['title' => 'Badal Tüneli', 'scope' => 'Elektromekanik İşler', 'location' => 'Amasya', 'size' => null],
            ['title' => 'Eğribel Tüneli', 'scope' => 'Elektromekanik Altyapı', 'location' => 'Giresun', 'size' => '5.900 m'],
            ['title' => 'Yağdonduran Tüneli', 'scope' => 'Tünel Elektromekanik', 'location' => 'Sivas', 'size' => null],
            ['title' => 'DowAksa Sulu Yangın Söndürme', 'scope' => 'Yangın Söndürme Sistemleri', 'location' => 'Yalova', 'size' => null],
            ['title' => 'Özel Avrasya Hastanesi', 'scope' => 'Hastane Mekanik Tesisat', 'location' => 'İstanbul', 'size' => null],
            ['title' => '262 Towers', 'scope' => 'Mekanik & Havalandırma', 'location' => 'Kocaeli', 'size' => null],
            ['title' => 'İAU Esenyurt Diş Fakültesi', 'scope' => 'Elektromekanik İşler', 'location' => 'İstanbul', 'size' => null],
        ];

        foreach ($projects as $idx => $p) {
            \App\Models\Project::create([
                'title_tr' => $p['title'],
                'title_en' => $p['title'],
                'scope_tr' => $p['scope'],
                'scope_en' => $p['scope'],
                'location_tr' => $p['location'],
                'location_en' => $p['location'],
                'size_tr' => $p['size'],
                'size_en' => $p['size'],
                'order_index' => $idx,
                'is_active' => true,
                'is_featured' => $idx < 6,
                'status' => 'completed',
                'year' => date('Y'),
            ]);
        }
    }
}
