<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('classify'); // Create resources/views/classify.blade.php
    }
}