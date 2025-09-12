<?php

namespace App\Http\Controllers;

use App\Models\Trajet;
use Illuminate\Http\Request;

class TrajetController extends Controller
{
        public function index()
    {
        $trajets = Trajet::all();

        return view('trajets.index', compact('trajets'));
    }
}
