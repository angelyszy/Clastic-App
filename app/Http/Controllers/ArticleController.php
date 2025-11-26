<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $articles;

    public function __construct()
    {
        $this->middleware('auth');

        // Satu sumber data saja (dipakai index & show)
        $this->articles = [
            [
                'id' => 1,
                'title' => 'Sebegini Parah Ternyata Masalah Sampah Plastik di Indonesia',
                'excerpt' => 'Masalah sampah plastik di Indonesia lagi-lagi menjadi sorotan public. Melihat pertumbuhan masalah sampah plastik...',
                'image' => 'https://images.unsplash.com/photo-1621451537084-482c73073a0f?w=800&q=80',
                'author' => 'Heri Kusmanta',
                'content' => 'Sampah plastik adalah semua barang bekas atau tidak terpakai yang materialnya diproduksi dari bahan kimia tak terbarukan...',
                'url' => 'https://www.example.com/article1'
            ],
            [
                'id' => 2,
                'title' => 'Sampah Plastik Telah Menjadi Masalah Antarnegara',
                'excerpt' => 'Konflik persoalan plastik Indonesia...',
                'image' => 'https://unair.ac.id/wp-content/uploads/2020/10/Ilustrasi-oleh-Politik-Hijau.jpeg', // GANTI INI
                'author' => 'Sarah Wijaya',
                'content' => 'Konflik persoalan plastik Indonesia...',
                'url' => 'https://www.example.com/article2'
            ],
            [
                'id' => 3,
                'title' => 'Indonesia Darurat Sampah Plastik',
                'excerpt' => 'Sampah plastik adalah menjadi masalah utama dalam pencemaran lingkungan...',
                'image' => 'https://images.unsplash.com/photo-1618477461853-cf6ed80faba5?w=800&q=80',
                'author' => 'Andi Pratama',
                'content' => 'Sampah plastik adalah menjadi masalah utama dalam pencemaran lingkungan...',
                'url' => 'https://www.example.com/article3'
            ],
            [
                'id' => 4,
                'title' => 'Sampah Plastik Disekitar Kita',
                'excerpt' => 'Di Indonesia masih banyak ditemukan...',
                'image' => 'https://sdnungaran1.sch.id/assets/images/posts/1675828051-fgdfgfdgd.JPG', // GANTI INI
                'author' => 'Heri Kusmanta',
                'content' => 'Di Indonesia masih banyak ditemukan...',
                'url' => 'https://www.example.com/article4'
         ],
        ];
    }

    public function index()
    {
        // pakai satu sumber data yang sama
        $articles = $this->articles;
        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = collect($this->articles)->firstWhere('id', $id);

        if (!$article) {
            abort(404);
        }

        return view('articles.show', compact('article'));
    }
}