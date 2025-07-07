<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\Section;
use App\Models\Block;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $page = Page::updateOrCreate([
            'slug' => 'the-promise-in-little-world'
        ], [
            'title' => 'Mojomu Games — Indonesia Indie Game Developer',
            'meta_description' => 'Temukan kisah-kisah emosional dalam bentuk game pixel di Mojomu Games'
        ]);

        // Tentang
        $tentang = Section::create([
            'page_id' => $page->id,
            'background' => null,
        ]);

        Block::create([
            'section_id' => $tentang->id,
            'type' => 'header',
            'data' => [
                'title' => 'Tentang Mojomu Games',
                'desc' => 'Startup indie yang merangkai perasaan jadi pixel games.'
            ]
        ]);

        Block::create([
            'section_id' => $tentang->id,
            'type' => 'text',
            'data' => [
                'text' => 'Mojomu Games adalah startup yang didirikan oleh seseorang yang gagal dalam mencari cinta sejati. Kini, ia menyalurkan semua rasa itu ke dalam game-game pixel bertema perasaan dan keheningan. Setiap permainan dari Mojomu bukan tentang akhir bahagia—tapi tentang perjalanan menerima bahwa tidak semua janji harus ditepati... agar kita bisa tetap hidup dan mencintai.'
            ]
        ]);

        // Upcoming
        $upcoming = Section::create([
            'page_id' => $page->id,
            'background' => '#f3f3f3',
        ]);

        Block::create([
            'section_id' => $upcoming->id,
            'type' => 'header',
            'data' => [
                'title' => 'Alur Cerita Game',
                'desc' => 'Simak karya mendatang kami dengan cerita mendalam.'
            ]
        ]);

        Block::create([
            'section_id' => $upcoming->id,
            'type' => 'gallery',
            'data' => [
                'images' => [
                    'https://placehold.co/600x300/555/fff?text=The+Promise+In+Little+World'
                ]
            ]
        ]);

        Block::create([
            'section_id' => $upcoming->id,
            'type' => 'text',
            'data' => [
                'text' => 'Dika adalah seorang remaja SMA dengan ambisi besar untuk menjadi programmer hebat yang bisa mengubah dunia. Di sekolah, ia tak pernah jauh dari Kirana si teman dekat yg cerdas dan ceria, lalu secara diam-diam menjadi orang paling penting dalam hidupnya. Bersama Kirana, Dika menuliskan mimpi dan harapan mereka di sebuah buku kecil. Buku itu menjadi saksi bisu janji-janji remaja mereka, petualangan, dan dunia yang ingin mereka ciptakan.'
            ]
        ]);

        Block::create([
            'section_id' => $upcoming->id,
            'type' => 'text',
            'data' => [
                'text' => 'Namun segalanya berubah di suatu pagi yang tragis, Sebuah kebakaran hebat melanda sekolah. Kirana terjebak di dalam ruang kelas yang dilalap api. Dika berusaha menyelamatkannya dengan sekuat tenaga, namun api menyebar terlalu cepat. Ia hanya bisa menyaksikan kepergian orang yang tak sempat ia selamatkan.'
            ]
        ]);

        Block::create([
            'section_id' => $upcoming->id,
            'type' => 'text',
            'data' => [
                'text' => 'Tahun-tahun berlalu, namun luka itu tak pernah benar-benar sembuh. Suatu hari, Dika kembali ke sekolah lamanya. Ia tanpa sengaja masuk ke ruang kelas yang sudah kosong, berdebu, dan penuh kenangan. Di sudut ruangan, ia menemukan kembali buku \'The Promise\' itu. Kulitnya hangus, halamannya rusak, tapi masih ada sebagian yang bisa dibaca. Fragmen-fragmen janji mereka masih ada beberapa yg telah terwujud, namun banyak yang tak sempat dijalani bersama.'
            ]
        ]);

        Block::create([
            'section_id' => $upcoming->id,
            'type' => 'text',
            'data' => [
                'text' => 'Penyesalan yang selama ini terkubur kembali muncul ke permukaan. Dika memutuskan: jika ia tak bisa mengubah masa lalu, maka ia akan menciptakan masa depan yang berbeda. Ia melanjutkan pendidikan hingga S3, mengabdikan seluruh hidupnya untuk satu membangun dunia simulasi bernama Little World. Sebuah dunia digital tempat kenangan bisa hidup kembali, dan janji yang belum terpenuhi bisa ditebus.'
            ]
        ]);

        Block::create([
            'section_id' => $upcoming->id,
            'type' => 'button',
            'data' => [
                [
                    'text' => 'Mainkan Saat Rilis',
                    'url' => '#'
                ]
            ]
        ]);

        // Cuplikan
        $cuplikan = Section::create([
            'page_id' => $page->id,
            'background' => '#fff',
        ]);

        Block::create([
            'section_id' => $cuplikan->id,
            'type' => 'header',
            'data' => [
                'title' => 'Cuplikan Game',
                'desc' => 'Intip visual dan atmosfer game kami berikut ini.'
            ]
        ]);

        Block::create([
            'section_id' => $cuplikan->id,
            'type' => 'gallery',
            'data' => [
                'images' => [
                    'https://placehold.co/280x160/222/fff?text=Screenshot+1',
                    'https://placehold.co/280x160/333/fff?text=Screenshot+2',
                    'https://placehold.co/280x160/444/fff?text=Screenshot+3',
                ]
            ]
        ]);

        // Sosial
        $sosial = Section::create([
            'page_id' => $page->id,
            'background' => '#f0f0f0',
        ]);

        Block::create([
            'section_id' => $sosial->id,
            'type' => 'header',
            'data' => [
                'title' => 'Sosial Media',
                'desc' => 'Terhubung melalui platform pilihan:'
            ]
        ]);

        Block::create([
            'section_id' => $sosial->id,
            'type' => 'social',
            'data' => [
                [
                    'name' => 'YouTube',
                    'url' => 'https://www.youtube.com/@mojomugames458',
                    'icon' => 'https://mojomu.com/assets/img/logo-youtube.png',
                ],
                [
                    'name' => 'Itch.io',
                    'url' => 'https://itch.io/profile/mojomu',
                    'icon' => 'https://mojomu.com/assets/img/logo-itchio.png',
                ],
                [
                    'name' => 'Steam',
                    'url' => '#',
                    'icon' => 'https://mojomu.com/assets/img/logo-steam.png',
                ],
                [
                    'name' => 'Play Store',
                    'url' => '#',
                    'icon' => 'https://mojomu.com/assets/img/logo-playstore.png',
                ],
            ]
        ]);

        // Tim
        $tim = Section::create([
            'page_id' => $page->id,
            'background' => '#fff',
        ]);

        Block::create([
            'section_id' => $tim->id,
            'type' => 'header',
            'data' => [
                'title' => 'Tim Pengembang',
                'desc' => 'Orang-orang di balik layar Mojomu Games.'
            ]
        ]);

        Block::create([
            'section_id' => $tim->id,
            'type' => 'profile',
            'data' => [
                [
                    'name' => 'Faisal',
                    'image' => 'https://mojomu.com/assets/img/profile-kirito.jpg',
                    'quote' => 'Tetaplah hidup meskipun tidak hidup',
                ],
                [
                    'name' => 'Bisma',
                    'image' => 'https://mojomu.com/assets/img/profile-hikigaya.jpg',
                    'quote' => 'Setiap garis yang kutarik adalah bagian dari hati yang belum selesai.',
                ]
            ]
        ]);
    }
}
