<?php

namespace App\Http\Controllers;

use App\Models\Detailaplikasi;
use Illuminate\Http\Request;

class AplikasiController extends Controller
{
    public function fetchChildRows($id)
    {
        $aplikasi = Detailaplikasi::where('ref_opd_id', $id)->get();

        return response()->json($aplikasi);
    }
}