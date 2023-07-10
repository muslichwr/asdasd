<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\aplikasi;
use Illuminate\Http\Request;

class DetailReportController extends Controller
{
    public function DReport(aplikasi $aplikasi)
    {
        $refStatus = DB::table('ref_status')->find($aplikasi->ref_status_id);

        
        return view('data.detailaplikasi.detailsreport', compact('aplikasi','refStatus'));
    }
}
