<?php

namespace App\Http\Controllers;

use App\Models\aplikasi;
use App\Models\DokumenTatakelola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


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
        $reffrekuensipemeliharaan = DB::table('ref_frekuensipemeliharaan')->find($aplikasi->ref_frekuensipemeliharaan_id);
        $refevaluasi = DB::table('ref_evaluasi')->find($aplikasi->ref_evaluasi_id);
        $reffrekuensigangguan = DB::table('ref_frekuensigangguan')->find($aplikasi->ref_frekuensigangguan_id);
        $refdokumen = DB::table('ref_dokumen')->find($aplikasi->ref_dokumen_id);
        $reftingkemfung = DB::table('ref_tingkat_kematangan_fungsi')->find($aplikasi->ref_tingkat_kematangan_fungsi_id);
        $reftingkemapros = DB::table('ref_tingkat_kematangan_proses')->find($aplikasi->ref_tingkat_kematangan_proses_id);
        $refj = DB::table('ref_pj')->find($aplikasi->ref_pj_id);
        $refpjteknis = DB::table('ref_pjteknis')->find($aplikasi->ref_pjteknis_id);
        $reftenagateknis = DB::table('ref_tenagateknis')->find($aplikasi->ref_tenagateknis_id);
        $reftpteknis = DB::table('ref_tpteknis')->find($aplikasi->ref_tpteknis_id);
        
        $countries = DB::table('ref_jenisaplikasi')->pluck('nama', 'id');

        $cities = [];
            if ($aplikasi->ref_sasaran_id) {
                $cities = $this->getCities($aplikasi->ref_sasaran_id);
            }
        $dokumenTatakelola = DokumenTatakelola::where('aplikasi_id', $aplikasi->id)->get();

        return view('data.detailaplikasi.edit', compact('aplikasi', 'refStatus', 'refLokasi', 'refOPD', 'refOPDs','refSertf','refbasisapp',
                                                        'refdatcent','countries','cities','refdasarhukum','refkategoriakses','reflayananpublik',
                                                        'reffrekuensipemeliharaan','refevaluasi','reffrekuensigangguan','refdokumen','dokumenTatakelola',
                                                        'reftingkemfung','reftingkemapros','refj','refpjteknis','reftenagateknis','reftpteknis'));
    }

    public function uploadDocument(Request $request, Aplikasi $aplikasi)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);
    
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $filepath = $file->store('dokumen');
    
        $dokumen = new DokumenTatakelola();
        $dokumen->aplikasi_id = $aplikasi->id;
        $dokumen->filename = $filename;
        $dokumen->filepath = $filepath;
        $dokumen->save();
    
        return redirect()->back()->with('success', 'Document uploaded successfully.');
    }

    public function deleteDocument($aplikasi, $dokumenId)
    {
        $dokumen = DokumenTatakelola::findOrFail($dokumenId);

        Storage::delete($dokumen->filepath);
        $dokumen->delete();

        return redirect()->back()->with('success', 'Document deleted successfully.');
    }

    public function downloadDocument($aplikasi, $dokumenId)
    {
        $dokumen = DokumenTatakelola::findOrFail($dokumenId);

        return response()->download(storage_path('app/'.$dokumen->filepath));
    }

    public function getCities($country)
    {
    $cities = DB::table('ref_sasaran_jenisaplikasi')->where('sasaran_id', $country)->pluck('nama', 'id');

    return $cities;
    }

    public function update(Request $request, aplikasi $aplikasi)
    {
        $request->validate([
            'hostname' => '',
            'no_asset' => '',
            'ipaddress' => '',
            'nm_internal' => '',
            'ref_status_id' => '',
            'tgl_launching' => '',
            'nm_eksternal' => '',
            'ref_lokasi_id' => '',
            'ref_opd_id' => '',
            'sertf_kelayakan_id' => '',
            'ket_sertf' => '',
            'fung_apk' => '',
            'deskripsi' => '',
            'prkt_utama' => '',
            'info_data_center' => '',
            'prkt_khusus' => '',
            'ref_basisaplikasi_id' => '',
            'os' => '',
            'web_server' => '',
            'basis_data' => '',
            'bhs_pemrograman' => '',
            'framework' => '',
            'sistem_penghubung_layanan' => '',
            'kerngka_pengembangan' => '',
            'tipe_lisensi' => '',
            'komputasi_awan' => '',
            'ref_sasaran_jenisaplikasi_id' => '',
            'ref_sasaran_id' => '',
            'ref_dasarhukum_id' => '',
            'ref_kategoriakses_id' => '',
            'layanan_publik' => '',
            'unit_pengembangan' => '',
            'unit_operasional' => '',
            'ref_frekuensipemeliharaan_id' => '',
            'ref_evaluasi_id' => '',
            'ref_frekuensigangguan_id' => '',
            'ref_dokumen_id' => '',
            'proses_bisnis' => '',
            'peta_rencana' => '',
            'ref_tingkat_kematangan_fungsi_id' => '',
            'ref_tingkat_kematangan_proses_id' => '',
            'ref_pj_id' => '',
            'ref_pjteknis_id' => '',
            'ref_tenagateknis_id' => '',
            'ref_tpteknis_id' => '',
            'standar_teknis_dan_prosedur_keamanan_spbe' => '',
            'audit_keamanan_spbe' => '',
            'peningkatan_keamanan_spbe' => '',
            'penanganan_insiden_keamanan_spbe' => '',
            'edukasi_kesadaran_keamanan_spbe' => '',
            'kelaikan_keamanan_spbe' => '',
            'identifikasi_kerentanan_keamanan_spbe' => '',
            'supplier_data' => '',
            'customer_data' => '',
            'inputan_data' => '',
            'data_yang_digunakan' => '',
            'luaran_data' => '',
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
            'ref_frekuensipemeliharaan_id' => $request->ref_frekuensipemeliharaan_id,
            'ref_evaluasi_id' => $request->ref_evaluasi_id,
            'ref_frekuensigangguan_id' => $request->ref_frekuensigangguan_id,
            'ref_dokumen_id' => $request->ref_dokumen_id,
            'proses_bisnis' => $request->proses_bisnis,
            'peta_rencana' => $request->peta_rencana,
            'ref_tingkat_kematangan_fungsi_id' => $request->ref_tingkat_kematangan_fungsi_id,
            'ref_tingkat_kematangan_proses_id' => $request->ref_tingkat_kematangan_proses_id,
            'ref_pj_id' => $request->ref_pj_id,
            'ref_pjteknis_id' => $request->ref_pjteknis_id,
            'ref_tenagateknis_id' => $request->ref_tenagateknis_id,
            'ref_tpteknis_id' => $request->ref_tpteknis_id,
            'standar_teknis_dan_prosedur_keamanan_spbe' => $request->standar_teknis_dan_prosedur_keamanan_spbe,
            'audit_keamanan_spbe' => $request->audit_keamanan_spbe,
            'peningkatan_keamanan_spbe' => $request->peningkatan_keamanan_spbe,
            'penanganan_insiden_keamanan_spbe' => $request->penanganan_insiden_keamanan_spbe,
            'edukasi_kesadaran_keamanan_spbe' => $request->edukasi_kesadaran_keamanan_spbe,
            'kelaikan_keamanan_spbe' => $request->kelaikan_keamanan_spbe,
            'identifikasi_kerentanan_keamanan_spbe' => $request->identifikasi_kerentanan_keamanan_spbe,
            'supplier_data' => $request->supplier_data,
            'customer_data' => $request->customer_data,
            'inputan_data' => $request->inputan_data,
            'data_yang_digunakan' => $request->data_yang_digunakan,
            'luaran_data' => $request->luaran_data,
        ]);

        session()->flash('message', 'Aplikasi updated successfully.');

        return redirect()->route('detailaplikasi');
    }
}
