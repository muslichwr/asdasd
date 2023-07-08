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
                        url: '{{ route('data.detailaplikasi.edit', '') }}/' + countryId,
                        type: 'GET',
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#ref_sasaran_jenisaplikasi_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>

@endpush
@endsection
