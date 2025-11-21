<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Articles data - you can move this to database later
        $articles = [
            [
                'id' => 1,
                'title' => 'Sebegini Parah Ternyata Masalah Sampah Plastik di Indonesia',
                'excerpt' => 'Masalah sampah plastik di Indonesia lagi-lagi menjadi sorotan public. Melihat pertumbangan masalah sampah plastik...',
                'image' => 'https://images.unsplash.com/photo-1621451537084-482c73073a0f?w=800&q=80',
                'author' => 'Heri Kusmanta',
                'content' => 'Sampah plastik adalah semua barang bekas atau tidak terpakai yang materialnya diproduksi dari bahan kimia tak terbarukan. Sebagian besar sampah plastik yang digunakan saat ini biasanya dipakai untuk pengemasan. Jadi, kantong plastik juga masih sering dipakai sebagai tempat sampah organik yang dibuang ke tempat pembuangan sampah.

Melansir Detikatu.co.id dari situs UN Environment, bahan kimia yang digunakan untuk membuat plastik biasanya berasal dari minyak, gas alam, dan batu bara. Sejak 1950, sampah plastik yang diproduksi mencapai 8,3 miliar ton dan sekitar 60% plastik berakhir di tempat pembuangan sampah atau tercecer di lingkungan alam.

Secara tidak sadar, penggunaan plastik mungkin sudah menjadi comfort zone bagi banyak orang. Saat berbelanja, kemasan dan kantong plastik juga menjadi alternatif yg praktis, mudah. Hari para pelaku industri, bahan plastik juga relatif murah dibandingkan material lainnya.',
                'url' => 'https://www.example.com/article1'
            ],
            [
                'id' => 2,
                'title' => 'Sampah Plastik Telah Menjadi Masalah Antarnegara',
                'excerpt' => 'Konflik persoalan plastik Indonesia yang memicu jutang yang pantai 61.230 ton per hari atau 336 juta solar pertencana tidah ban untuk oakan pembangunan...',
                'image' => 'https://images.unsplash.com/photo-1591358144452-0047c3b57a41?w=800&q=80',
                'author' => 'Sarah Wijaya',
                'content' => 'Konflik persoalan plastik Indonesia yang memicu jutang yang pantai 61.230 ton per hari atau 336 juta solar pertencana tidah ban untuk oakan pembangunan. Masalah sampah plastik telah menjadi isu global yang memerlukan perhatian serius dari berbagai negara.',
                'url' => 'https://www.example.com/article2'
            ],
            [
                'id' => 3,
                'title' => 'Indonesia Darurat Sampah Plastik',
                'excerpt' => 'Sampah plastik adalah mendjadi masalah utama dalam pencemaran lingkungan. Lalu pencemaran tanah maupun laut. Edisi sampah plastik tidak mudah dikelola...',
                'image' => 'https://images.unsplash.com/photo-1618477461853-cf6ed80faba5?w=800&q=80',
                'author' => 'Andi Pratama',
                'content' => 'Sampah plastik adalah mendjadi masalah utama dalam pencemaran lingkungan. Lalu pencemaran tanah maupun laut. Edisi sampah plastik tidak mudah dikelola. Indonesia menghadapi krisis sampah plastik yang semakin serius setiap tahunnya.',
                'url' => 'https://www.example.com/article3'
            ],
            [
                'id' => 4,
                'title' => 'Sampah Plastik Disekitar Kita',
                'excerpt' => 'Di Indonesia masih banyak ditemukan sampah plastik yang merupakan salah satu material digunakan untuk kemasan sekali pakai...',
                'image' => 'https://images.unsplash.com/photo-1610239947835-7f8f2d1c6c1d?w=800&q=80',
                'author' => 'Heri Kusmanta',
                'content' => 'Di Indonesia masih banyak ditemukan sampah plastik yang merupakan salah satu material digunakan untuk kemasan sekali pakai. Plastik sangat mudah ditemukan di sekitar kita dalam kehidupan sehari-hari.',
                'url' => 'https://www.example.com/article4'
            ],
        ];

        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        // Articles data - same as above, you can move this to database later
        $articles = [
            [
                'id' => 1,
                'title' => 'Sebegini Parah Ternyata Masalah Sampah Plastik di Indonesia',
                'excerpt' => 'Masalah sampah plastik di Indonesia lagi-lagi menjadi sorotan public. Melihat pertumbangan masalah sampah plastik...',
                'image' => 'https://images.unsplash.com/photo-1621451537084-482c73073a0f?w=800&q=80',
                'author' => 'Heri Kusmanta',
                'content' => 'Sampah plastik adalah semua barang bekas atau tidak terpakai yang materialnya diproduksi dari bahan kimia tak terbarukan. Sebagian besar sampah plastik yang digunakan saat ini biasanya dipakai untuk pengemasan. Jadi, kantong plastik juga masih sering dipakai sebagai tempat sampah organik yang dibuang ke tempat pembuangan sampah.

Melansir Detikatu.co.id dari situs UN Environment, bahan kimia yang digunakan untuk membuat plastik biasanya berasal dari minyak, gas alam, dan batu bara. Sejak 1950, sampah plastik yang diproduksi mencapai 8,3 miliar ton dan sekitar 60% plastik berakhir di tempat pembuangan sampah atau tercecer di lingkungan alam.

Secara tidak sadar, penggunaan plastik mungkin sudah menjadi comfort zone bagi banyak orang. Saat berbelanja, kemasan dan kantong plastik juga menjadi alternatif yg praktis, mudah. Hari para pelaku industri, bahan plastik juga relatif murah dibandingkan material lainnya.',
                'url' => 'https://www.detik.com/article-example'
            ],
            [
                'id' => 2,
                'title' => 'Sampah Plastik Telah Menjadi Masalah Antarnegara',
                'excerpt' => 'Konflik persoalan plastik Indonesia yang memicu jutang yang pantai 61.230 ton per hari atau 336 juta solar pertencana tidah ban untuk oakan pembangunan...',
                'image' => 'https://images.unsplash.com/photo-1591358144452-0047c3b57a41?w=800&q=80',
                'author' => 'Sarah Wijaya',
                'content' => 'Konflik persoalan plastik Indonesia yang memicu jutang yang pantai 61.230 ton per hari atau 336 juta solar pertencana tidah ban untuk oakan pembangugan. Masalah sampah plastik telah menjadi isu global yang memerlukan perhatian serius dari berbagai negara.',
                'url' => 'https://www.kompas.com/article-example'
            ],
            [
                'id' => 3,
                'title' => 'Indonesia Darurat Sampah Plastik',
                'excerpt' => 'Sampah plastik adalah mendjadi masalah utama dalam pencemaran lingkungan. Laju pencemaran tanah maupun laut. Edisi sampah plastik tidak mudah dikelola...',
                'image' => 'https://images.unsplash.com/photo-1618477461853-cf6ed80faba5?w=800&q=80',
                'author' => 'Andi Pratama',
                'content' => 'Sampah plastik adalah mendjadi masalah utama dalam pencemaran lingkungan. Laju pencemaran tanah maupun laut. Edisi sampah plastik tidak mudah dikelola. Indonesia menghadapi krisis sampah plastik yang semakin serius setiap tahunnya.',
                'url' => 'https://www.tempo.co/article-example'
            ],
            [
                'id' => 4,
                'title' => 'Sampah Plastik Disekitar Kita',
                'excerpt' => 'Di Indonesia masih banyak ditemukan sampah plastik yang merupakan salah satu material digunakan untuk kemasan sekali pakai...',
                'image' => 'https://images.unsplash.com/photo-1610239947835-7f8f2d1c6c1d?w=800&q=80',
                'author' => 'Heri Kusmanta',
                'content' => 'Di Indonesia masih banyak ditemukan sampah plastik yang merupakan salah satu material digunakan untuk kemasan sekali pakai. Plastik sangat mudah ditemukan di sekitar kita dalam kehidupan sehari-hari.',
                'url' => 'https://www.cnn.com/article-example'
            ],
        ];

        $article = collect($articles)->firstWhere('id', $id);

        if (!$article) {
            abort(404);
        }

        return view('articles.show', compact('article'));
    }
}