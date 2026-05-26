<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'slug'       => 'mekanik-tesisat',
                'order_index'=> 1,
                'title_tr'   => 'Mekanik Tesisat',
                'title_en'   => 'Mechanical Installation',
                'excerpt_tr' => 'Sıhhi tesisat, yangın önleme sistemleri ve sıvı taşıma hatlarının tasarımı ve kurulumu.',
                'excerpt_en' => 'Design and installation of sanitary, fire suppression, and fluid distribution systems.',
                'content_tr' => '<p>Mekanik tesisat hizmetlerimiz; sıhhi tesisat, yangın söndürme sistemleri, sıvı taşıma hatları ve boru tesisatı kurulumunu kapsamaktadır. ISO standartlarına uygun, uzun vadeli bakım kolaylığı gözetilerek projelendirilen sistemler sunuyoruz.</p><h3>Uygulama Alanları</h3><ul><li>Ofis binaları ve rezidanslar</li><li>Hastane ve sağlık tesisleri</li><li>Endüstriyel yapılar ve fabrikalar</li><li>Alışveriş merkezleri ve ticari yapılar</li></ul>',
                'content_en' => '<p>Our mechanical installation services include sanitary plumbing, fire suppression systems, fluid transport lines, and pipe installation. We provide systems engineered to ISO standards with long-term maintainability in mind.</p>',
                'meta_title_tr' => 'Mekanik Tesisat Hizmetleri — Setisan Elektromekanik',
                'meta_title_en' => 'Mechanical Installation Services — Setisan Elektromekanik',
                'meta_desc_tr'  => 'Kurumsal projelerde mekanik tesisat, sıhhi tesisat ve yangın söndürme sistemleri kurulumu.',
                'meta_desc_en'  => 'Mechanical installation, sanitary and fire suppression system installation for institutional projects.',
            ],
            [
                'slug'       => 'isitma-sogutma',
                'order_index'=> 2,
                'title_tr'   => 'Isıtma & Soğutma Sistemleri',
                'title_en'   => 'Heating & Cooling Systems',
                'excerpt_tr' => 'Merkezi ısıtma, soğutma grupları ve enerji verimli sistem tasarımı.',
                'excerpt_en' => 'Central heating, cooling groups, and energy-efficient system design.',
                'content_tr' => '<p>Isıtma ve soğutma sistemleri alanında merkezi kazan tesisatı, soğutma grubu kurulumu, ısı pompası ve radyatör sistemleri tasarım ve uygulaması gerçekleştiriyoruz.</p>',
                'content_en' => '<p>In the field of heating and cooling systems, we design and implement central boiler installations, cooling group setups, heat pumps, and radiator systems.</p>',
                'meta_title_tr' => 'Isıtma & Soğutma Sistemleri — Setisan Elektromekanik',
                'meta_title_en' => 'Heating & Cooling Systems — Setisan Elektromekanik',
                'meta_desc_tr'  => 'Kurumsal binalar için merkezi ısıtma, soğutma ve ısı pompası sistemleri.',
                'meta_desc_en'  => 'Central heating, cooling and heat pump systems for institutional buildings.',
            ],
            [
                'slug'       => 'hvac-iklimlendirme',
                'order_index'=> 3,
                'title_tr'   => 'HVAC / İklimlendirme',
                'title_en'   => 'HVAC / Air Conditioning',
                'excerpt_tr' => 'Ofis, hastane ve ticari yapılar için VRF, chiller ve havalandırma sistemleri.',
                'excerpt_en' => 'VRF, chiller, and ventilation systems for offices, hospitals, and commercial buildings.',
                'content_tr' => '<p>Merkezi iklimlendirme, VRF sistemleri, chiller grupları ve hava kanalı projelendirmesi ile kurumsal yapılar için kapsamlı HVAC çözümleri sunuyoruz.</p>',
                'content_en' => '<p>We provide comprehensive HVAC solutions for institutional buildings including central air conditioning, VRF systems, chiller groups, and air duct engineering.</p>',
                'meta_title_tr' => 'HVAC / İklimlendirme Sistemleri — Setisan Elektromekanik',
                'meta_title_en' => 'HVAC / Air Conditioning Systems — Setisan Elektromekanik',
                'meta_desc_tr'  => 'Kurumsal projelerde VRF, chiller, havalandırma ve merkezi iklimlendirme sistemleri.',
                'meta_desc_en'  => 'VRF, chiller, ventilation and central air conditioning systems for institutional projects.',
            ],
            [
                'slug'       => 'elektrik-sistemleri',
                'order_index'=> 4,
                'title_tr'   => 'Elektrik Sistemleri',
                'title_en'   => 'Electrical Systems',
                'excerpt_tr' => 'Güç dağıtımı, pano, aydınlatma ve zayıf akım sistemleri kurulumu.',
                'excerpt_en' => 'Power distribution, panel boards, lighting, and low-current system installation.',
                'content_tr' => '<p>Elektrik tesisat hizmetlerimiz; güç dağıtım panolarının üretimi ve montajı, iç/dış aydınlatma sistemleri, data ve zayıf akım tesisatı, güneş enerjisi entegrasyonu ve enerji ölçüm sistemlerini kapsamaktadır.</p>',
                'content_en' => '<p>Our electrical installation services include production and assembly of power distribution panels, interior/exterior lighting systems, data and low-current installations, solar energy integration, and energy metering systems.</p>',
                'meta_title_tr' => 'Elektrik Sistemleri — Setisan Elektromekanik',
                'meta_title_en' => 'Electrical Systems — Setisan Elektromekanik',
                'meta_desc_tr'  => 'Kurumsal projelerde güç dağıtımı, pano ve aydınlatma sistemleri kurulumu.',
                'meta_desc_en'  => 'Power distribution, panel board and lighting system installation for institutional projects.',
            ],
            [
                'slug'       => 'proje-ve-taahhut',
                'order_index'=> 5,
                'title_tr'   => 'Proje & Taahhüt',
                'title_en'   => 'Project & Contracting',
                'excerpt_tr' => 'Anahtar teslim proje yönetimi, teknik koordinasyon ve yapım taahhüdü.',
                'excerpt_en' => 'Turnkey project management, technical coordination, and construction contracting.',
                'content_tr' => '<p>Elektromekanik projelerin başlangıcından teknik teslime kadar tüm aşamalarını yönetiyoruz. Anahtar teslim proje anlayışımızla tek muhatap olarak teknik koordinasyonu üstleniyoruz.</p>',
                'content_en' => '<p>We manage all phases of electromechanical projects from inception to technical handover. With our turnkey project approach, we take charge of technical coordination as a single point of contact.</p>',
                'meta_title_tr' => 'Proje & Taahhüt — Setisan Elektromekanik',
                'meta_title_en' => 'Project & Contracting — Setisan Elektromekanik',
                'meta_desc_tr'  => 'Anahtar teslim elektromekanik proje yönetimi ve yapım taahhüdü hizmetleri.',
                'meta_desc_en'  => 'Turnkey electromechanical project management and construction contracting services.',
            ],
        ];

        foreach ($services as $data) {
            Service::firstOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
