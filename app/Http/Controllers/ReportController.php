<?php

namespace App\Http\Controllers;

use App\Models\aplikasi;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report()
    {
        $aplikasiData = Aplikasi::with('ambilrefopdid')->get();

        return view('data.detailaplikasi.report', compact('aplikasiData'));
    }
}
