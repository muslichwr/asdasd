@extends('admin/template')
@section('title','Dashboard')

@section('content')

<div class="overview">
                
                <div class="boxes">
                    <div class="box box1">
                        <div class="card-info">
                            <h6>Jumlah Aplikasi</h6>
                            <h1>2.03M</h1>
                        </div>
                    </div>
                    <div class="box box1">
                        <div class="card-grid">
                            <div class="card-info">
                                <h6>Jumlah Aplikasi Berdasarkan Keamanan</h6>
                                <h1>60</h1>
                            </div>
                            <div class="card-progress">
                                <svg width="96" height="96">
                                    <circle
                                        id="circle1"
                                        cx="38"
                                        cy="38"
                                        r="36"
                                        class="stroke-yellow"
                                    ></circle>
                                </svg>
                                <div class="percentage">
                                    <p>90%</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box box1">
                        <div class="card-grid">
                            <div class="card-info">
                                <h6>Jumlah Aplikasi Berdasarkan Kematangan Fungsi</h6>
                                <h1>2.03M</h1>
                            </div>
    
                            <div class="card-progress">
                                <svg width="96" height="96">
                                    <circle
                                        id="circle2"
                                        cx="38"
                                        cy="38"
                                        r="36"
                                        class="stroke-yellow"
                                    ></circle>
                                </svg>
                                <div class="percentage">
                                    <p>17%</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <div class="box box1">
                        <div class="card-grid">
                            <div class="card-info">
                                <h6>Aplikasi Berdasarkan Kematangan Proses</h6>
                                <h1>2.03M</h1>
                            </div>
    
                            <div class="card-progress">
                                <svg width="96" height="96">
                                    <circle
                                        id="circle3"
                                        cx="38"
                                        cy="38"
                                        r="36"
                                        class="stroke-yellow"
                                    ></circle>
                                </svg>
                                <div class="percentage">
                                    <p>17%</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box box1">
                        <div class="card-grid">
                            <div class="card-info">
                                <h6>Aplikasi Terintegrasi</h6>
                                <h1>2.03M</h1>
                            </div>
    
                            <div class="card-progress">
                                <svg width="96" height="96">
                                    <circle
                                        id="circle4"
                                        cx="38"
                                        cy="38"
                                        r="36"
                                        class="stroke-yellow"
                                    ></circle>
                                </svg>
                                <div class="percentage">
                                    <p>17%</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box box1">
                        <div class="card-grid">
                            <div class="card-info">
                                <h6>Aplikasi Berdasarkan Dokumen Perancangan</h6>
                                <h1>2.03M</h1>
                            </div>
    
                            <div class="card-progress">
                                <svg width="96" height="96">
                                    <circle
                                        id="circle5"
                                        cx="38"
                                        cy="38"
                                        r="36"
                                        class="stroke-yellow"
                                    ></circle>
                                </svg>
                                <div class="percentage">
                                    <p>17%</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box box1">
                        <div class="card-grid">
                            <div class="card-info">
                                <h6>Aplikasi Berdasarkan Dasar Hukum</h6>
                                <h1>2.03M</h1>
                            </div>
    
                            <div class="card-progress">
                                <svg width="96" height="96">
                                    <circle
                                        id="circle6"
                                        cx="38"
                                        cy="38"
                                        r="36"
                                        class="stroke-yellow"
                                    ></circle>
                                </svg>
                                <div class="percentage">
                                    <p>17%</p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="box box1">
                        <div class="card-grid">
                            <div class="card-info">
                                <h5>Aplikasi Berdasarkan Hosting Tingkat Nasional</h5>
                                <h1>2.03M</h1>
                            </div>
    
                            <div class="card-progress">
                                <svg width="96" height="96">
                                    <circle
                                        id="circle7"
                                        cx="38"
                                        cy="38"
                                        r="36"
                                        class="stroke-yellow"
                                    ></circle>
                                </svg>
                                <div class="percentage">
                                    <p>17%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Add Chart -->
            <div class="activity">
                <div class="title2">
                    <span class="text">Indeks Aplikasi Berdasarkan SPBE Per Tahun</span>
                </div>
                <div class="activity-data">
                    <canvas id="grafikIndeksSPBE"></canvas>
                </div>
            </div>
            <div class="activity">
                <div class="title2">
                    <span class="text">Aplikasi Berdasarkan OPD</span>
                </div>
                <div class="activity-data">
                    <canvas id="grafikJumlahOPD"></canvas>
                </div>
            </div>
            <div class="graphBox">
                <div class="boxes2">
                    <div class="title3">
                        <span class="text3"> Aplikasi Berdasarkan Kematangan Fungsi</span>
                    </div>
                    <div class="box3">
                        <canvas id="grafikFungsi"></canvas>
                    </div>
                </div>
                <div class="boxes2">
                    <div class="title3">
                        <span class="text3"> Aplikasi Berdasarkan Kematangan Proses</span>
                    </div>
                    <div class="box3">
                        <canvas id="grafikProses"></canvas>
                    </div>
                </div>
            </div>
            <div class="activity">
                <div class="title2">
                    <span class="text">Aplikasi Berdasarkan Sistem Pengaman</span>
                </div>
                <div class="activity-data">
                    <canvas id="grafikSistempengaman"></canvas>
                </div>
            </div>
            <div class="activity">
                <div class="title2">
                    <span class="text">Aplikasi Berdasarkan Kelengkapan</span>
                </div>
                <div class="activity-data">
                    <canvas id="grafikKelengkapan"></canvas>
                </div>
            </div>
            <div class="activity">
                <div class="title2">
                    <span class="text">Aplikasi Berdasarkan Dasar Hukum</span>
                </div>
                <div class="activity-data">
                    <canvas id="grafikHukum"></canvas>
                </div>
            </div>
            <br>
            <div class="graphBox">
                <div class="boxes2">
                    <div class="title3">
                        <span class="text3"> Aplikasi Berdasarkan Lokasi</span>
                    </div>
                    <div class="box3">
                        <canvas id="grafikLokasi"></canvas>
                    </div>
                </div>
                <div class="boxes2">
                    <div class="title3">
                        <span class="text3"> Aplikasi Berdasarkan Lokasi</span>
                    </div>
                    <div class="box3">
                        <canvas id="grafikStatus"></canvas>
                    </div>
                </div>
            </div>
@endsection