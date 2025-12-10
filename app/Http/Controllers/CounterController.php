<?php

namespace App\Http\Controllers;

use App\Models\Counter;

class CounterController extends Controller
{
    // Menambah view
    public function increment($page)
    {
        // Ambil / buat record berdasarkan nama halaman
        $counter = Counter::firstOrCreate(
            ['page' => $page],
            ['views' => 0]
        );

        // Tambah 1 view
        $counter->increment('views');

        return response()->json([
            'page' => $page,
            'views' => $counter->views
        ]);
    }

    // Mendapatkan total views
    public function total($page)
    {
        $counter = Counter::where('page', $page)->first();

        return response()->json([
            'page' => $page,
            'views' => $counter->views ?? 0
        ]);
    }
}
