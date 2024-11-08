<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review; // Voeg deze regel toe

class HomeController extends Controller
{
    public function __construct()
    { 
        // Constructor code indien nodig
    }

    public function index()
    {
        $reviews = Review::latest()->get(); // Laad alle reviews
        return view('home', compact('reviews'));
    }
}
