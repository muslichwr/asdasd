<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aplikasi extends Model
{
    public $timestamps = false;
    protected $table = 'aplikasi';
    protected $fillable = [
        'id',
        'no_asset',
        'ipaddress',
        'hostname',
        'nm_internal',
        'ref_status_id',
        'tgl_launching',
        'nm_eksternal',
        'ref_lokasi_id',
        'ref_opd_id',
        'sertf_kelayakan_id',
        'ket_sertf',
        'fung_apk',
        'deskripsi',
        'prkt_utama',
        'info_data_center',
        'prkt_khusus',
        'ref_basisaplikasi_id',
        'os',
        'web_server',
        'basis_data',
        'bhs_pemrograman',
        'framework',
        'sistem_penghubung_layanan',
        'kerngka_pengembangan',
        'tipe_lisensi',
        'komputasi_awan',
        'ref_sasaran_id',
        'ref_sasaran_jenisaplikasi_id',
        'ref_dasarhukum_id',
        'ref_kategoriakses_id',
        'layanan_publik',
        'unit_pengembangan',
        'unit_operasional',
        'ref_frekuensipemeliharaan_id',
        'ref_evaluasi_id',
        'ref_frekuensigangguan_id',
        'ref_dokumen_id',
        'proses_bisnis',
        'peta_rencana',
        'ref_tingkat_kematangan_fungsi_id',
        'ref_tingkat_kematangan_proses_id',
        'ref_pj_id',
        'ref_pjteknis_id',
        'ref_tenagateknis_id',
        'ref_tpteknis_id',
        'standar_teknis_dan_prosedur_keamanan_spbe',
        'audit_keamanan_spbe',
        'peningkatan_keamanan_spbe',
        'penanganan_insiden_keamanan_spbe',
        'edukasi_kesadaran_keamanan_spbe',
        'kelaikan_keamanan_spbe',
        'identifikasi_kerentanan_keamanan_spbe',
        'supplier_data',
        'customer_data',
        'inputan_data',
        'data_yang_digunakan',
        'luaran_data',
    ];

    public function ambilrefopdid()
    {
        return $this->belongsTo(ambilrefopdid::class, 'ref_opd_id');
    }
    
}
