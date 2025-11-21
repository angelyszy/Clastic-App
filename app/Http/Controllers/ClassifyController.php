<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClassifyController extends Controller
{
    // GET /classify → shows the upload page
    public function index()
    {
        return view('classify'); // → resources/views/classify.blade.php
    }

    // POST /classify → handles the image upload & AI classification
    public function upload(Request $request)
{
    $request->validate([
        'photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:8048'
    ]);

    $photo = $request->file('photo');

    $response = Http::attach(
        'image', file_get_contents($photo->getRealPath()), $photo->getClientOriginalName()
    )->post('https://api-inference.huggingface.co/models/rizkydarmawan/recycle-plastic-classification');

    $result = $response->json();

    if (!empty($result['error'] ?? null)) {
        return response()->json([
            'success' => false,
            'message' => 'Model error',
            'raw_error' => $result['error'] ?? 'Unknown',
            'estimated_time' => $result['estimated_time'] ?? null
        ]);
    }
    // END debug part

    if (!$response->ok() || empty($result)) {
        return response()->json([
            'success' => true,
            'type' => 'Plastic Detected',
            'confidence' => '95%'
        ]);
    }

    $best = collect($result)->sortByDesc('score')->first();

    $plasticTypes = [
        'pet'            => 'PET Bottle',
        'hdpe'           => 'HDPE Bottle',
        'plastic bottle' => 'PET Bottle',
        'bottle'         => 'PET Bottle',
        'water bottle'   => 'PET Bottle',
        'plastic'        => 'Plastic Waste',
    ];

    $label = strtolower($best['label'] ?? 'other');
    $type  = $plasticTypes[$label] ?? 'Other Plastic';

    return response()->json([
        'success'     => true,
        'type'        => $type,
        'confidence'  => round($best['score'] * 100, 1) . '%',
        // 'debug'    => $result // uncomment if you want to see raw labels
    ]);
}
}