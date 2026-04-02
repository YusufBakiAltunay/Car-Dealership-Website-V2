<?php

namespace App\Http\Controllers\Open;

use App\Http\Controllers\Controller;
use App\Models\GarageService;
use Illuminate\Http\Request;

class GarageServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $garageServices = GarageService::with('prices')->paginate(12);
        return view('open.garage-services.index', ['garageServices' => $garageServices]);
    }
}
 