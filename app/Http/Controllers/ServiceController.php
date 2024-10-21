<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Toon de lijst met services.
     */
    public function index()
    {
        // Haal alle services op uit de database
        $service = Service::all();

        // Stuur ze door naar de services Blade-view
        return view('service', ['service' => $service]);
    }
}
