@extends('admin/template')

@section('title', 'Edit Aplikasi')

@section('content')

<div id="tabs" class="container">
<div class="activity">
<ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#detailaplikasi" role="tab">Detail Aplikasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#deskripsisistem" role="tab">Deskripsi Sistem</a>
                        </li>                                                
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#domaininfrastuktur" role="tab">Domain Infrastuktur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#domainaplikasi" role="tab">Domain Aplikasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#domainlayanan" role="tab">Domain Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#domainprosesbisnis" role="tab">Domain 
                                Proses 
                                Bisnis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#sumberdayamanusia" role="tab">Sumber 
                                Daya
                                Manusia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#domainkeamanan" role="tab">Domain 
                                Keamanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#domaindatadaninformasi" role="tab">Domain 
                                Data dan 
                                Informasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#beritaacara" role="tab">Berita
                                Acara</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#uploadfile" role="tab">Upload
                                File</a>
                        </li>
                    </ul>

    <div class="activity-data2">
    <div class="card-body">
    <form action="{{ route('aplikasis.update', $aplikasi) }}" method="POST">
                    @csrf
                    @method('PUT')
<div class="tab-content">
        <div class="tab-pane active p-3" id="detailaplikasi" role="tabpanel">
                <h class="hdetailaplikasi">DETAIL APLIKASI</h>
                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Nomor Asset</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="no_asset" name="no_asset" value="{{ $aplikasi->no_asset }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Hostname</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="hostname" name="hostname" value="{{ $aplikasi->hostname }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">IP Address</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="ipaddress" name="ipaddress" value="{{ $aplikasi->ipaddress }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Nama Internal</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="nm_internal" name="nm_internal" value="{{ $aplikasi->nm_internal }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p for="ref_status_id" class="col-sm-2 col-form-label text-right">Status</label>
                    <div class="col-sm-10">
                    <select class="form-control" id="ref_status_id" name="ref_status_id">
                        <option value=""></option>
                        <option value="1" @if($refStatus && $refStatus->id == 1) selected @endif>Aktif</option>
                        <option value="2" @if($refStatus && $refStatus->id == 2) selected @endif>Tidak Aktif</option>
                    </select>
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Tanggal Launching</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="date" class="form-control" id="tgl_launching" name="tgl_launching" value="{{ $aplikasi->tgl_launching }}">
                    </div>
                </div>

                <div class="detailaplikasitambah"> 
                <button class="tambah-data">Update</button> 
                </div>
        </div>

        <div class="tab-pane p-3" id="deskripsisistem" role="tabpanel">
                <h class="hdetailaplikasi">DESKRIPSI SISTEM</h>
                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Nama Eksternal</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="nm_eksternal" name="nm_eksternal" value="{{ $aplikasi->nm_eksternal }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p for="ref_lokasi_id" class="col-sm-2 col-form-label text-right">Lokasi</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="ref_lokasi_id" name="ref_lokasi_id">
                            <option value=""></option>
                            <option value="1" @if($refLokasi && $refLokasi->id == 1) selected @endif>VPS</option>
                            <option value="2" @if($refLokasi && $refLokasi->id == 2) selected @endif>Dedicated</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <p for="ref_opd_id" class="col-sm-2 col-form-label text-right">OPD</label>
                    <div class="col-sm-10">
                    <select class="form-control" id="ref_opd_id" name="ref_opd_id">
                        <option value=""></option>
                        @foreach ($refOPDs as $refOPD)
                            <option value="{{ $refOPD->id }}" @if($refOPD->id == $aplikasi->ref_opd_id) selected @endif>{{ $refOPD->nama }}</option>
                        @endforeach
                    </select>
                    </div>
                </div>

                <div class="form-group row">
                    <p for="sertf_kelayakan_id" class="col-sm-2 col-form-label text-right">Sertifikat Kelayakan</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="sertf_kelayakan_id" name="sertf_kelayakan_id">
                            <option value=""></option>
                            <option value="1" @if($refSertf && $refSertf->id == 1) selected @endif>Ya</option>
                            <option value="2" @if($refSertf && $refSertf->id == 2) selected @endif>Tidak</option>
                            <option value="3" @if($refSertf && $refSertf->id == 3) selected @endif>Belum jadi</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Keterangan Sertifikat</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="ket_sertf" name="ket_sertf" value="{{ $aplikasi->ket_sertf }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Profile Penyelenggara</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="" name="" value="" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Fungsi Aplikasi</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="fung_apk" name="fung_apk" value="{{ $aplikasi->fung_apk }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Deskripsi</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $aplikasi->deskripsi }}">
                    </div>
                </div>


                <div class="detailaplikasitambah"> 
                <button class="tambah-data">Update</button> 
                </div>
        </div>

        <div class="tab-pane  p-3" id="domainlayanan" role="tabpanel">
                <h class="hdetailaplikasi">DOMAIN LAYANAN</h>

                <div class="form-group row">
                    <p for="" class="col-sm-2 col-form-label text-right">Kategori Jenis Aplikasi</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="ref_sasaran_id" name="ref_sasaran_id">
                        <option value="">Select Jenis Aplikasi</option>
                        @foreach($countries as $id => $nama)
                            <option value="{{ $id }}"{{ $aplikasi->ref_sasaran_id == $id ? 'selected' : '' }}>
                            {{ $nama }}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <select class="form-control" id="ref_sasaran_jenisaplikasi_id" name="ref_sasaran_jenisaplikasi_id">
                        <option value="">Select Sasaran</option>
                        @foreach($cities as $id => $nama)
                        <option value="{{ $id }}" {{ $aplikasi->ref_sasaran_jenisaplikasi_id == $id ? 'selected' : '' }}>
                        {{ $nama }}
                            </option>
                        @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <p for="ref_dasarhukum_id" class="col-sm-2 col-form-label text-right">Dasar Hukum</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="ref_dasarhukum_id" name="ref_dasarhukum_id">
                            <option value=""></option>
                            <option value="1" @if($refdasarhukum && $refdasarhukum->id == 1) selected @endif>Tidak ada atau belum ada</option>
                            <option value="2" @if($refdasarhukum && $refdasarhukum->id == 2) selected @endif>Ada tetapi masih dalam rancangan atau konsep atau SE</option>
                            <option value="3" @if($refdasarhukum && $refdasarhukum->id == 3) selected @endif>Ada dari pereaturan pusat tetapi belum ada kebijakan tingkat daerah</option>
                            <option value="4" @if($refdasarhukum && $refdasarhukum->id == 4) selected @endif>Sudah tersedia kebijakan tingkat daerah yang merupakan turunan kebijakan dari pusat</option>
                            <option value="5" @if($refdasarhukum && $refdasarhukum->id == 5) selected @endif>Sudah tersedia kebijakan tingkat daerah yang merupakan turunan kebijakan dari pusat. Kebijakan sudah mengalami beberapa kali evaluasi</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <p for="ref_kategoriakses_id" class="col-sm-2 col-form-label text-right">Kategori Akses</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="ref_kategoriakses_id" name="ref_kategoriakses_id">
                            <option value=""></option>
                            <option value="1" @if($refkategoriakses && $refkategoriakses->id == 1) selected @endif>Melalui jaringan intra pemerintah </option>
                            <option value="2" @if($refkategoriakses && $refkategoriakses->id == 2) selected @endif>Internet (jalur publik)</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <p for="layanan_publik" class="col-sm-2 col-form-label text-right">Ketersediaan Dipublikasi</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="layanan_publik" name="layanan_publik">
                            <option value=""></option>
                            <option value="1" @if($reflayananpublik && $reflayananpublik->id == 1) selected @endif>Ya</option>
                            <option value="2" @if($reflayananpublik && $reflayananpublik->id == 2) selected @endif>Tidak</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">URL</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="hostname" name="hostname" value="{{ $aplikasi->hostname }}" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Unit Pengembangan</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="unit_pengembangan" name="unit_pengembangan" value="{{ $aplikasi->unit_pengembangan }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Unit Operasional</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="unit_operasional" name="unit_operasional" value="{{ $aplikasi->unit_operasional }}">
                    </div>
                </div>

                <div class="detailaplikasitambah"> 
                <button class="tambah-data">Update</button> 
                </div>
        </div>

        <div class="tab-pane  p-3" id="domaininfrastuktur" role="tabpanel">
                <h class="hdetailaplikasi">DOMAIN INFRASTRUKTUR</h>
                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Perangkat Utama</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="prkt_utama" name="prkt_utama" value="{{ $aplikasi->prkt_utama }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p for="info_data_center" class="col-sm-2 col-form-label text-right">Basis Aplikasi</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="info_data_center" name="info_data_center">
                            <option value=""></option>
                            <option value="1" @if($refdatcent && $refdatcent->id == 1) selected @endif>Di Data Center Dinas Kominfo Pemkot Kediri</option>
                            <option value="2" @if($refdatcent && $refdatcent->id == 2) selected @endif>Di Luar Data Center Dinas Kominfo Pemkot Kediri</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Perangkat Khusus</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="prkt_khusus" name="prkt_khusus" value="{{ $aplikasi->prkt_khusus }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p for="ref_basisaplikasi_id" class="col-sm-2 col-form-label text-right">Basis Aplikasi</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="ref_basisaplikasi_id" name="ref_basisaplikasi_id">
                            <option value=""></option>
                            <option value="2" @if($refbasisapp && $refbasisapp->id == 2) selected @endif>WEB</option>
                            <option value="3" @if($refbasisapp && $refbasisapp->id == 3) selected @endif>ANDROID</option>
                            <option value="4" @if($refbasisapp && $refbasisapp->id == 4) selected @endif>IOS</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Perangkat Keras Server</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="prkt_khusus" name="prkt_khusus" value="{{ $aplikasi->prkt_khusus }}">
                    </div>
                </div>

                <div class="detailaplikasitambah"> 
                <button class="tambah-data">Update</button> 
                </div>
        </div>

        <div class="tab-pane  p-3" id="domainaplikasi" role="tabpanel">
                <h class="hdetailaplikasi">DOMAIN APLIKASI</h>
                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Sistem Operasi</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="os" name="os" value="{{ $aplikasi->os }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Web Server</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="web_server" name="web_server" value="{{ $aplikasi->web_server }}">
                    </div>
                </div>
                

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Basis Data</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="basis_data" name="basis_data" value="{{ $aplikasi->basis_data }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Bahasa Pemrograman</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="bhs_pemrograman" name="bhs_pemrograman" value="{{ $aplikasi->bhs_pemrograman }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Framework</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="framework" name="framework" value="{{ $aplikasi->framework }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Sistem Penghubung Layanan</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="sistem_penghubung_layanan" name="sistem_penghubung_layanan" value="{{ $aplikasi->sistem_penghubung_layanan }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Kerangka Pengembangan</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="kerngka_pengembangan" name="kerngka_pengembangan" value="{{ $aplikasi->kerngka_pengembangan }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Tipe Lisensi</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="tipe_lisensi" name="tipe_lisensi" value="{{ $aplikasi->tipe_lisensi }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Komputasi Awan</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="komputasi_awan" name="komputasi_awan" value="{{ $aplikasi->komputasi_awan }}">
                    </div>
                </div>

                

                <div class="detailaplikasitambah"> 
                <button class="tambah-data">Update</button> 
                </div>
        </div>

        <div class="tab-pane  p-3" id="domainprosesbisnis" role="tabpanel">
                <h class="hdetailaplikasi">DOMAIN PROSES BISNIS</h>

                <div class="form-group row">
                    <p for="ref_frekuensipemeliharaan_id" class="col-sm-2 col-form-label text-right">Frekuensi Pemeliharaan</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="ref_frekuensipemeliharaan_id" name="ref_frekuensipemeliharaan_id">
                            <option value=""></option>
                            <option value="1" @if($reffrekuensipemeliharaan && $reffrekuensipemeliharaan->id == 1) selected @endif>Jarang / Tidak pernah terjadi ada pemeliharaan yang terencana</option>
                            <option value="2" @if($reffrekuensipemeliharaan && $reffrekuensipemeliharaan->id == 2) selected @endif>Pemeliharaan 1 kali dalam setahun</option>
                            <option value="3" @if($reffrekuensipemeliharaan && $reffrekuensipemeliharaan->id == 3) selected @endif>Pemeliharaan lebih dari 1 kali dalam setahun (dalam bulan)</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <p for="ref_evaluasi_id" class="col-sm-2 col-form-label text-right">Evaluasi Layanan</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="ref_evaluasi_id" name="ref_evaluasi_id">
                            <option value=""></option>
                            <option value="1" @if($refevaluasi && $refevaluasi->id == 1) selected @endif>Jarang / Tidak pernah dilakukan evaluasi layanan secara terencana oleh manajemen (minimal eselon 3)</option>
                            <option value="2" @if($refevaluasi && $refevaluasi->id == 2) selected @endif>Dilakukan evaluasi layanan secara terencana oleh manajemen (minimal eselon 3) minimal 1 kali dalam setahun</option>
                            <option value="3" @if($refevaluasi && $refevaluasi->id == 3) selected @endif>Dilakukan evaluasi layanan secara terencana oleh manajemen (minimal eselon 3) lebih dari 1 kali dalam setahun</option>
                        </select>
                    </div>
                </div>
                

                <div class="form-group row">
                    <p for="ref_frekuensigangguan_id" class="col-sm-2 col-form-label text-right">Frekuensi Gangguan</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="ref_frekuensigangguan_id" name="ref_frekuensigangguan_id">
                            <option value=""></option>
                            <option value="1" @if($reffrekuensigangguan && $reffrekuensigangguan->id == 1) selected @endif>Jarang/Tidak pernah terjadi pada jangka waktu lebih dari 1 tahun</option>
                            <option value="2" @if($reffrekuensigangguan && $reffrekuensigangguan->id == 2) selected @endif>Dapat Terjadi satu-dua kali dalam jangka waktu 1 tahun</option>
                            <option value="3" @if($reffrekuensigangguan && $reffrekuensigangguan->id == 3) selected @endif>Dapat Terjadi satu-dua kali tiap satu atau beberapa bulan</option>
                            <option value="4" @if($reffrekuensigangguan && $reffrekuensigangguan->id == 4) selected @endif>Dapat terjadi satu-dua kali tiap satu atau beberapa minggu</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <p for="ref_dokumen_id" class="col-sm-2 col-form-label text-right">Adanya Dokumen</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="ref_dokumen_id" name="ref_dokumen_id">
                            <option value=""></option>
                            <option value="1" @if($refdokumen && $refdokumen->id == 1) selected @endif>Tidak ada petunjuk penggunaan aplikasi dan dokumentasi teknis</option>
                            <option value="2" @if($refdokumen && $refdokumen->id == 2) selected @endif>Terdapat petunjuk penggunaan aplikasi</option>
                            <option value="3" @if($refdokumen && $refdokumen->id == 3) selected @endif>Terdapat dokumen teknis</option>
                            <option value="4" @if($refdokumen && $refdokumen->id == 4) selected @endif>Terdapat petunjuk penggunaan aplikasi dan dokumentasi teknis</option>
                        </select>
                    </div>
                    
                    <div class="col-sm-10" style=" padding-left: 53px; padding-right: 0px;">
                            <!-- Upload document form -->
                            <div class="form-group">
                                <p for="file">Upload Document:</p>
                                <input type="file" name="file" id="file" class="form-control">
                            </div>
                            <button type="button" id="upload-btn" class="btn btn-primary">Upload</button>


                            <!-- Display existing documents -->

                            @if(count($dokumenTatakelola) > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Filename</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dokumenTatakelola as $dokumen)
                                            <tr>
                                                <td class="hdetailaplikasi"> <p>{{ $dokumen->filename }}</p></td>
                                                <td>
                                                    <button class="btn btn-danger delete-doc" data-aplikasi="{{ $aplikasi->id }}" data-dokumen="{{ $dokumen->id }}">Delete</button>
                                                    <a href="{{ route('data.detailaplikasi.dokumen.download', [$aplikasi->id, $dokumen->id]) }}" class="btn btn-primary">Download</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No documents found.</p>
                            @endif

                    </div>

                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Proses Bisnis</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="proses_bisnis" name="proses_bisnis" value="{{ $aplikasi->proses_bisnis }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Peta Rencana</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="peta_rencana" name="peta_rencana" value="{{ $aplikasi->peta_rencana }}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <p for="ref_tingkat_kematangan_fungsi_id" class="col-sm-2 col-form-label text-right">Tingkat Kematangan Fungsi</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="ref_tingkat_kematangan_fungsi_id" name="ref_tingkat_kematangan_fungsi_id">
                            <option value=""></option>
                            <option value="1" @if($reftingkemfung && $reftingkemfung->id == 1) selected @endif>Rintisan</option>
                            <option value="2" @if($reftingkemfung && $reftingkemfung->id == 2) selected @endif>Terkelola</option>
                            <option value="3" @if($reftingkemfung && $reftingkemfung->id == 3) selected @endif>Terstandarisasi</option>
                            <option value="4" @if($reftingkemfung && $reftingkemfung->id == 4) selected @endif>Terintregasi & Terstruktur</option>
                            <option value="5" @if($reftingkemfung && $reftingkemfung->id == 5) selected @endif>Optimum</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <p for="ref_tingkat_kematangan_proses_id" class="col-sm-2 col-form-label text-right">Tingkat Kematangan Proses</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="ref_tingkat_kematangan_proses_id" name="ref_tingkat_kematangan_proses_id">
                            <option value=""></option>
                            <option value="1" @if($reftingkemapros && $reftingkemapros->id == 1) selected @endif>Informasi</option>
                            <option value="2" @if($reftingkemapros && $reftingkemapros->id == 2) selected @endif>Kolaborasi</option>
                            <option value="3" @if($reftingkemapros && $reftingkemapros->id == 3) selected @endif>Optimalisasi</option>
                            <option value="4" @if($reftingkemapros && $reftingkemapros->id == 4) selected @endif>Transaksi</option>
                            <option value="5" @if($reftingkemapros && $reftingkemapros->id == 5) selected @endif>Interaksi</option>
                        </select>
                    </div>
                </div>
                

                <div class="detailaplikasitambah"> 
                <button class="tambah-data">Update</button> 
                </div>
        </div>

        <div class="tab-pane  p-3" id="sumberdayamanusia" role="tabpanel">
                <h class="hdetailaplikasi">DOMAIN SUMBER DAYA MANUSIA (SDM)</h>

                <div class="form-group row">
                    <p for="ref_pj_id" class="col-sm-2 col-form-label text-right">Penanggung Jawab</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="ref_pj_id" name="ref_pj_id">
                            <option value=""></option>
                            <option value="1" @if($refj && $refj->id == 1) selected @endif>Tidak ada</option>
                            <option value="2" @if($refj && $refj->id == 2) selected @endif>Ada (setingkat staff)</option>
                            <option value="3" @if($refj && $refj->id == 3) selected @endif>Ada (setingkat kasi/kaba)</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <p for="ref_pjteknis_id" class="col-sm-2 col-form-label text-right">Penanggung Jawab Teknis</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="ref_pjteknis_id" name="ref_pjteknis_id">
                            <option value=""></option>
                            <option value="1" @if($refpjteknis && $refpjteknis->id == 1) selected @endif>Tidak ada</option>
                            <option value="2" @if($refpjteknis && $refpjteknis->id == 2) selected @endif>Ada (1 Orang)</option>
                            <option value="3" @if($refpjteknis && $refpjteknis->id == 3) selected @endif>Ada (lebih dari 1 orang)</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <p for="ref_tenagateknis_id" class="col-sm-2 col-form-label text-right">Tenaga Teknis</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="ref_tenagateknis_id" name="ref_tenagateknis_id">
                            <option value=""></option>
                            <option value="1" @if($reftenagateknis && $reftenagateknis->id == 1) selected @endif>Tidak ada</option>
                            <option value="2" @if($reftenagateknis && $reftenagateknis->id == 2) selected @endif>Satu orang dari internal</option>
                            <option value="3" @if($reftenagateknis && $reftenagateknis->id == 3) selected @endif>Satu orang dari penyedia</option>
                            <option value="4" @if($reftenagateknis && $reftenagateknis->id == 4) selected @endif>Lebih dari satu orang dari internal</option>
                            <option value="5" @if($reftenagateknis && $reftenagateknis->id == 5) selected @endif>Lebih dari satu orang gabungan dari internal dan penyedia</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <p for="ref_tpteknis_id" class="col-sm-2 col-form-label text-right">Tenaga Pendukung Teknis</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="ref_tpteknis_id" name="ref_tpteknis_id">
                            <option value=""></option>
                            <option value="1" @if($reftpteknis && $reftpteknis->id == 1) selected @endif>Operator</option>
                            <option value="2" @if($reftpteknis && $reftpteknis->id == 2) selected @endif>Programmer</option>
                            <option value="3" @if($reftpteknis && $reftpteknis->id == 3) selected @endif>Database</option>
                            <option value="4" @if($reftpteknis && $reftpteknis->id == 4) selected @endif>Data Analis</option>
                            <option value="5" @if($reftpteknis && $reftpteknis->id == 5) selected @endif>System Analis</option>
                        </select>
                    </div>
                </div>

                <div class="detailaplikasitambah"> 
                <button class="tambah-data">Update</button> 
                </div>
        </div>

        <div class="tab-pane  p-3" id="domainkeamanan" role="tabpanel">
                <h class="hdetailaplikasi">Domain Keamanan</h>
                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Standar Teknis dan Prosedur Keamanan SPBE</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="standar_teknis_dan_prosedur_keamanan_spbe" name="standar_teknis_dan_prosedur_keamanan_spbe" value="{{ $aplikasi->standar_teknis_dan_prosedur_keamanan_spbe }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Audit Keamanan SPBE</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="audit_keamanan_spbe" name="audit_keamanan_spbe" value="{{ $aplikasi->audit_keamanan_spbe }}">
                    </div>
                </div>
                

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Peningkatan Keamanan SPBE</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="penanganan_insiden_keamanan_spbe" name="penanganan_insiden_keamanan_spbe" value="{{ $aplikasi->penanganan_insiden_keamanan_spbe }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Penanganan Insiden Keamanan SPBE</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="penanganan_insiden_keamanan_spbe" name="penanganan_insiden_keamanan_spbe" value="{{ $aplikasi->penanganan_insiden_keamanan_spbe }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Edukasi Kesadaran Keamanan SPBE</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="edukasi_kesadaran_keamanan_spbe" name="edukasi_kesadaran_keamanan_spbe" value="{{ $aplikasi->edukasi_kesadaran_keamanan_spbe }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Kelaikan Keamanan SPBE</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="kelaikan_keamanan_spbe" name="kelaikan_keamanan_spbe" value="{{ $aplikasi->kelaikan_keamanan_spbe }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Identifikasi Kerentanan Keamanan SPBE</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="identifikasi_kerentanan_keamanan_spbe" name="identifikasi_kerentanan_keamanan_spbe" value="{{ $aplikasi->identifikasi_kerentanan_keamanan_spbe }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Sistem Pengamanan</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="sistem_pengamanan" name="sistem_pengamanan" value="{{ $aplikasi->sistem_pengamanan }}">
                    </div>
                </div>

                <div class="detailaplikasitambah"> 
                <button class="tambah-data">Update</button> 
                </div>
        </div>

        <div class="tab-pane  p-3" id="domaindatadaninformasi" role="tabpanel">
                <h class="hdetailaplikasi">Domain Data dan Informasi</h>
                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Supplier Data</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="supplier_data" name="supplier_data" value="{{ $aplikasi->supplier_data }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Customer Data</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="customer_data" name="customer_data" value="{{ $aplikasi->customer_data }}">
                    </div>
                </div>
                

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Inputan Data</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="inputan_data" name="inputan_data" value="{{ $aplikasi->inputan_data }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Data Yang Digunakan</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="data_yang_digunakan" name="data_yang_digunakan" value="{{ $aplikasi->data_yang_digunakan }}">
                    </div>
                </div>

                <div class="form-group row">
                    <p class="col-sm-2 col-form-label text-right">Luaran Data</p>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" class="form-control" id="luaran_data" name="luaran_data" value="{{ $aplikasi->luaran_data }}">
                    </div>
                </div>

                <div class="detailaplikasitambah"> 
                <button class="tambah-data">Update</button> 
                </div>
        </div>

        <div class="tab-pane  p-3" id="beritaacara" role="tabpanel">
                <h class="hdetailaplikasi">Berita Acara</h>

                <div class="detailaplikasitambah"> 
                <button class="tambah-data">Update</button> 
                </div>
        </div>

        <div class="tab-pane  p-3" id="uploadfile" role="tabpanel">
                <h class="hdetailaplikasi">Upload File</h>

                <div class="detailaplikasitambah"> 
                <button class="tambah-data">Update</button> 
                </div>
        </div>

        </form>
    </div>
    </div>
    </div>
</div>
</div>
@push('scripts')
    <script>
                $(document).ready(function() {
                    $('#ref_sasaran_id').change(function() {
                        var countryId = $(this).val();
                        $('#ref_sasaran_jenisaplikasi_id').empty();

                        if (countryId) {
                            $.ajax({
                                url: '{{ route('data.detailaplikasi.edit.dropdown', '') }}/' + countryId,
                                type: 'GET',
                                success: function(data) {
                                    $.each(data, function(key, value) {
                                        $('#ref_sasaran_jenisaplikasi_id').append('<option value="' + key + '">' + value + '</option>');
                                    });
                                }
                            });
                        }
                    });

                    $(document).on('click', '.delete-doc', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        var aplikasiId = $(this).data('aplikasi');
                        var dokumenId = $(this).data('dokumen');

                        if (confirm('Are you sure you want to delete this document? please relog ')) {
                            $.ajax({
                                url: '{{ route('data.detailaplikasi.dokumen.delete', [$aplikasi->id, '']) }}/' + dokumenId,
                                type: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    // Handle success response
                                    console.log(response);

                                    // Optionally, update the document list without reloading the page
                                },
                                error: function(xhr, status, error) {
                                    // Handle error
                                    console.error(xhr.responseText);
                                }
                            });
                        }
                    });

                    $('#upload-btn').click(function(e) {
                        e.preventDefault();
                        var fileInput = $('#file')[0];
                        var file = fileInput.files[0];
                        var formData = new FormData();
                        formData.append('file', file);

                        $.ajax({
                            url: '{{ route('data.detailaplikasi.upload', $aplikasi->id) }}',
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                // Handle success response
                                console.log(response);
                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                // Handle error
                                console.error(xhr.responseText);
                            }
                        });
                    });
                });
    </script>

@endpush
@endsection
