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
                'title' => 'Upcoming Game',
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
                'text' => 'Di tengah keputusasaan akan cinta sejati yang tak kunjung datang, Dika—seorang pengembang muda dengan hati yang rapuh—menciptakan dunia simulasi pixel yang indah. Game ini bukan hanya tentang akhir bahagia—tapi tentang perjalanan menerima bahwa tidak semua janji harus ditepati... agar kita bisa tetap hidup dan mencintai.'
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
                'title' => 'Cuplikan Game Kami',
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
                'title' => 'Kunjungi Kami di Sosial Media',
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
