<?php

namespace App\Http\Controllers;

use App\Models\aplikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AplikasiEditController extends Controller
{   
    
    public function edit(aplikasi $aplikasi)
    {
        $refStatus = DB::table('ref_status')->find($aplikasi->ref_status_id);
        $refLokasi = DB::table('ref_lokasi')->find($aplikasi->ref_lokasi_id);
        $refSertf = DB::table('ref_sertf')->find($aplikasi->sertf_kelayakan_id);
        $refbasisapp = DB::table('ref_basisaplikasi')->find($aplikasi->ref_basisaplikasi_id);
        $refdatcent = DB::table('ref_datacenter')->find($aplikasi->info_data_center);
        $refOPDs = DB::table('ref_opd')->select('id', 'nama')->get();
        $refOPD = $refOPDs->firstWhere('id', $aplikasi->ref_opd_id);
        $refdasarhukum = DB::table('ref_dasarhukum')->find($aplikasi->ref_dasarhukum_id);
        $refkategoriakses = DB::table('ref_kategoriakses')->find($aplikasi->ref_kategoriakses_id);
        $reflayananpublik = DB::table('ref_layananpublik')->find($aplikasi->layanan_publik);
        
        $countries = DB::table('ref_jenisaplikasi')->pluck('nama', 'id');

        $cities = [];
            if ($aplikasi->ref_sasaran_id) {
                $cities = $this->getCities($aplikasi->ref_sasaran_id);
            }
        
        return view('data.detailaplikasi.edit', compact('aplikasi', 'refStatus', 'refLokasi', 'refOPD', 'refOPDs','refSertf','refbasisapp',
                                                        'refdatcent','countries','cities','refdasarhukum','refkategoriakses','reflayananpublik'));
    }

    public function getCities($country)
{
    $cities = DB::table('ref_sasaran_jenisaplikasi')->where('sasaran_id', $country)->pluck('nama', 'id');

    return $cities;
}

    public function update(Request $request, aplikasi $aplikasi)
    {
        $request->validate([
            'hostname' => 'required',
            'no_asset' => 'required',
            'ipaddress' => 'required',
            'nm_internal' => 'required',
            'ref_status_id' => 'required',
            'tgl_launching' => 'required',
            'nm_eksternal' => 'required',
            'ref_lokasi_id' => 'required',
            'ref_opd_id' => 'required',
            'sertf_kelayakan_id' => 'required',
            'ket_sertf' => 'required',
            'fung_apk' => 'required',
            'deskripsi' => 'required',
            'prkt_utama' => 'required',
            'info_data_center' => 'required',
            'prkt_khusus' => 'required',
            'ref_basisaplikasi_id' => 'required',
            'os' => 'required',
            'web_server' => 'required',
            'basis_data' => 'required',
            'bhs_pemrograman' => 'required',
            'framework' => 'required',
            'sistem_penghubung_layanan' => 'required',
            'kerngka_pengembangan' => 'required',
            'tipe_lisensi' => 'required',
            'komputasi_awan' => 'required',
            'ref_sasaran_jenisaplikasi_id' => 'required',
            'ref_sasaran_id' => 'required',
            'ref_dasarhukum_id' => 'required',
            'ref_kategoriakses_id' => 'required',
            'layanan_publik' => 'required',
            'unit_pengembangan' => 'required',
            'unit_operasional' => 'required',
        ]);

        $aplikasi->update([
            'hostname' => $request->hostname,
            'no_asset' => $request->no_asset,
            'ipaddress' => $request->ipaddress,
            'nm_internal' => $request->nm_internal,
            'ref_status_id' => $request->ref_status_id,
            'tgl_launching' => $request->tgl_launching,
            'nm_eksternal' => $request->nm_eksternal,
            'ref_lokasi_id' => $request->ref_lokasi_id,
            'ref_opd_id' => $request->ref_opd_id,
            'sertf_kelayakan_id' => $request->sertf_kelayakan_id,
            'ket_sertf' => $request->ket_sertf,
            'fung_apk' => $request->fung_apk,
            'deskripsi' => $request->deskripsi,
            'prkt_utama' => $request->prkt_utama,
            'info_data_center' => $request->info_data_center,
            'prkt_khusus' => $request->prkt_khusus,
            'ref_basisaplikasi_id' => $request->ref_basisaplikasi_id,
            'os' => $request->os,
            'web_server' => $request->web_server,
            'basis_data' => $request->basis_data,
            'bhs_pemrograman' => $request->bhs_pemrograman,
            'framework' => $request->framework,
            'sistem_penghubung_layanan' => $request->sistem_penghubung_layanan,
            'kerngka_pengembangan' => $request->kerngka_pengembangan,
            'tipe_lisensi' => $request->tipe_lisensi,
            'komputasi_awan' => $request->komputasi_awan,
            'ref_sasaran_jenisaplikasi_id' => $request->ref_sasaran_jenisaplikasi_id,
            'ref_sasaran_id' => $request->ref_sasaran_id,
            'ref_dasarhukum_id' => $request->ref_dasarhukum_id,
            'ref_kategoriakses_id' => $request->ref_kategoriakses_id,
            'layanan_publik' => $request->layanan_publik,
            'unit_pengembangan' => $request->unit_pengembangan,
            'unit_operasional' => $request->unit_operasional,
        ]);

        session()->flash('message', 'Aplikasi updated successfully.');

        return redirect()->route('detailaplikasi');
    }
}
