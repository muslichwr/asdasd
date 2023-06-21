// Grafik Indeks Aplikasi Berdasarkan SPBE Per Tahun
const ctxIndeks = document.getElementById('grafikIndeksSPBE');
let grafikIndeksSPBE = new Chart(ctxIndeks, {
  type: 'line',
  data: {
    labels: ['2017', '2018', '2019', '2020', '2021', '2022', '2023'],
    datasets: [{
      label: 'Indeks Aplikasi Berdasarkan SPBE Per Tahun',
      data: [1, 7, 7, 10, 10.5, 11, 12],
      fill: false,
      borderColor: 'rgb(75, 192, 192)',
      tension: 0.1
    }]
  },
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

// Grafik Aplikasi Berdasarkan Jumlah OPD
const ctxOpd = document.getElementById('grafikJumlahOPD');
let grafikJumlahOPD = new Chart(ctxOpd, {
  type: 'bar',
  data: {
    labels: ['Dinas Komunikasi dan Informatika', 'Dinas Pendidikan', 'Dinas pendapatan', 'Pengelola Keuangan dan Asset Negara', 
    'Badan Kepegawaian & Pengembangan Sumber Daya manusia', 'Badan Pemerintahan', 'Bagian Pengadaan Barang/Jasa'],
    datasets: [{
      axis: 'y',
      label: 'Jumlah Aplikasi Berdasarkan OPD',
      data: [65, 59, 80, 81, 56, 55, 40],
      fill: false,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  },
  options: {
    indexAxis: 'y',
  }
});

// Grafik Aplikasi Berdasarkan kematangan Fungsi
const ctxFungsi = document.getElementById('grafikFungsi');
let grafikFungsi = new Chart(ctxFungsi, {
  type: 'bar',
  data: {
    labels: ['Informasi', 'Interaksi', 'Transaksi', 'Kolaborasi', 'Optimalisasi'],
    datasets: [{
        label: 'Aplikasi Berdasrkan Tingkat Kematangan Fungsi',
        data: [65, 59, 80, 81, 56, 55, 40],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(54, 162, 235)',
          'rgb(153, 102, 255)',
          'rgb(201, 203, 207)'
        ],
        borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

// Grafik Aplikasi Berdasarkan Kematangan Proses
const ctxProses = document.getElementById('grafikProses');
let grafikProses = new Chart(ctxProses, {
  type: 'bar',
  data: {
    labels: ['Rintisan', 'Terkelola', 'Terstandarisasi', 'Terintegrasi & Terstruktur', 'Optimum'],
    datasets: [{
        label: 'Aplikasi Berdasrkan Tingkat Kematangan Proses',
        data: [65, 59, 80, 81, 56, 55, 40],
        backgroundColor: [
          'rgba(255, 99, 132)',
          'rgba(255, 205, 86)',
          'rgba(75, 192, 192)',
          'rgba(54, 162, 235)',
          'rgba(153, 102, 255)',
          'rgba(201, 203, 207)'
        ],
        borderColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(54, 162, 235)',
          'rgb(153, 102, 255)',
          'rgb(201, 203, 207)'
        ],
        borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});

// Aplikasi Berdasarkan Sistem Pengaman
const ctxPengaman = document.getElementById('grafikSistempengaman');
let grafikSistempengaman = new Chart(ctxPengaman, {
  type: 'bar',
  data: {
    labels: ['Terdapat sistem dengan pengamanan data dengan menggunakan sertifikat digital yang disediakan oleh dinkominfo', 
    'Tidak terdapat sistem pengamanan pada aplikasi', 'Terdapat sistem dengan pengamanan data dengan menggunakan sertifikat digital yang disediakan oleh dinkominfo dan sistem pengamanan tingkat lanjuat lainnya yang disesuaikan dengan kebutuhan'],
    datasets: [{
      axis: 'y',
      label: 'Jumlah Aplikasi Berdasarkan Sistem Pengaman',
      data: [65, 59, 80],
      fill: false,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)'
      ],
      borderWidth: 1
    }]
  },
  options: {
    indexAxis: 'y',
  }
});


// Grafik Aplikasi Berdasarkan Kelengkapan
const ctxKelengkapan = document.getElementById('grafikKelengkapan');
let grafikKelengkapan = new Chart(ctxKelengkapan, {
  type: 'bar',
  data: {
    labels: ['Tidak ada petunjuk penggunaan aplikasi dan dokumentasi teknis', 'Terdapat petunjuk dan dokumen teknis',
     'Terdapat dokumen teknis', 'Terdapat petunjuk penggunaan aplikasi'],
    datasets: [{
      axis: 'y',
      label: 'Jumlah Aplikasi per Dokumen',
      data: [81, 56, 55, 40],
      fill: false,
      backgroundColor: [
        'rgba(255, 159, 64, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)'
      ],
      borderColor: [
        'rgb(255, 159, 64)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)'
      ],
      borderWidth: 1
    }]
  },
  options: {
    indexAxis: 'y',
  }
});

// Grafik Berdasarkan Dasar Hukum
const ctxHukum = document.getElementById('grafikHukum');
let grafikHukum = new Chart(ctxHukum, {
  type: 'bar',
  data: {
    labels: ['Sudah tersedia kebijakan tingkat daerah yang merupakan turunan kebijakan dari pusat', 'Tidak ada atau belum ada', 'Ada tetapi masih dalam rancangan atau konsep atau SE', 
    'Sudah tersedia kebijakan tingkat daerah yang merupakan turunan kebijakan dari pusat. Kebijakan sudah beberapa kali evaluasi', 'Ada dari peraturan pusat tetapi belum ada kebijakan tingkat daerah'],
    datasets: [{
      axis: 'y',
      label: 'Jumlah Aplikasi per Dasar Hukum',
      data: [59, 80, 81, 56, 55],
      fill: false,
      backgroundColor: [
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)'
      ],
      borderColor: [
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
      ],
      borderWidth: 1
    }]
  },
  options: {
    indexAxis: 'y',
  }
});


// Grafik Aplikasi Berdasarkan Lokasi
const ctxLokasi = document.getElementById('grafikLokasi');
let grafikLokasi = new Chart(ctxLokasi, {
  type: 'pie',
  data: {
    labels: [
      'VPS',
      'Dedicated'
    ],
    datasets: [{
      label: 'Aplikasi Berdasarkan Lokasi',
      data: [50, 100],
      backgroundColor: [
        'rgb(255, 205, 86)',
        'rgb(255, 99, 132)'
      ],
      hoverOffset: 10
    }]
  },
});

// Grafik Aplikasi Berdasarkan Status
const ctxStatus = document.getElementById('grafikStatus');
let grafikStatus = new Chart(ctxStatus, {
  type: 'pie',
  data: {
    labels: [
      'Aktif',
      'Tidak Aktif'
    ],
    datasets: [{
      label: 'Aplikasi Berdasarkan Status',
      data: [300, 100],
      backgroundColor: [
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
      ],
      hoverOffset: 10
    }]
  },
});
