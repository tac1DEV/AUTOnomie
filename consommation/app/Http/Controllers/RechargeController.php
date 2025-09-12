<?php

namespace App\Http\Controllers;
use App\Models\Recharge;
use Illuminate\Http\Request;

class RechargeController extends Controller
{
    public function index()
    {
        $recharges = Recharge::all();

        return view('recharges.index', compact('recharges'));
    }
}
