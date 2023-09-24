<!DOCTYPE html>
<html lang="en">

<head>
    <title>Elovya Laundry | {{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}" />
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">


    <style>
        .btn-group-xs>.btn,
        .btn-xs {
            padding: .25rem .4rem;
            font-size: .875rem;
            line-height: .5;
            border-radius: .2rem;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgb(17 26 104 / 10%);
        }

        .card-header {
            border-radius: 15px 15px 0px 0px !important;
        }

        .form-control {
            border-radius: 15px;
        }

        .btn {
            border-radius: 15px;
        }

        button.buttons-html5 {
            padding: .25rem .4rem !important;
            font-size: .875rem !important;
            line-height: .5 !important;
        }
    </style>
</head>

<body>
    {{-- Navbar Start --}}
    @include('partials.navbar')
    {{-- Navbar End --}}

    <div class="bg-primary text-center py-2 shadow-sm sticky-top d-none d-md-block mx-auto">
        <a class="navbar-brand text-white" href="/dashboard"><i class="bi bi-card-text"></i> Elovya Laundry</a>
    </div>
    <br>
    <div class="container-fluid">
        <div class="row">
            {{-- Main Bagian Kiri Start --}}
            <div class="col-md-3 mb-2 d-none d-md-block">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div class="card-tittle text-white">Hallo, {{ auth()->user()->username }}</div>
                    </div>
                    <div class="card-body">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard"><i
                                        class="fa fa-desktop text-primary mr-2"></i>Kasir</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard/laporan"><i
                                        class="fa fa-table text-primary mr-2"></i>Laporan</a>
                            </li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="nav-link border-0 bg-white"><i
                                        class="fa fa-power-off text-primary mr-2"
                                        onclick="confirmLogout()"></i>Keluar</button>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- Main Bagian Kiri End --}}

            {{-- Main Bagian Tengah Start --}}
            <div class="col-md-6 mb-2">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body py-4">
                                <form method="POST" action="/dashboard/laporan">
                                    @csrf
                                    <div class="form-group row mb-0">
                                        <label class="col-sm-4 col-form-label col-form-label-sm"
                                            for="tgl_transaksi"><b>Tgl.
                                                Transaksi</b></label>
                                        <div class="col-sm-8 mb-2">
                                            <input type="text" class="form-control form-control-sm" name="tgl_transaksi"
                                                id="tgl_transaksi" value="<?php echo  date(" j F Y"); ?>" readonly>
                                        </div>
                                        <label class="col-sm-4 col-form-label col-form-label-sm"
                                            for="nama_konsumen"><b>Nama
                                                Konsumen</b></label>
                                        <div class="col-sm-8 mb-2">
                                            <div class="input-group">
                                                <input type="text" name="nama_konsumen" id="nama_konsumen"
                                                    class="form-control form-control-sm border-right-0" required
                                                    autofocus>
                                            </div>
                                        </div>
                                        <label class="col-sm-4 col-form-label col-form-label-sm"
                                            for="nomor_konsumen"><b>Nomor WhatsApp
                                            </b></label>
                                        <div class="col-sm-8 mb-2">
                                            <div class="input-group">
                                                <input type="text" name="nomor_konsumen" id="nomor_konsumen"
                                                    class="form-control form-control-sm border-right-0" required>
                                            </div>
                                        </div>
                                        <label class="col-sm-4 col-form-label col-form-label-sm"
                                            for="kategori_jasa"><b>Kategori
                                                Jasa</b></label>
                                        <div class="col-sm-8 mb-2">
                                            <div class="input-group">
                                                <input type="text" name="kategori_jasa" id="kategori_jasa"
                                                    class="form-control form-control-sm border-right-0" required>
                                            </div>
                                        </div>
                                        <label class="col-sm-4 col-form-label col-form-label-sm"
                                            for="tipe_cucian"><b>Tipe
                                                Cucian / Harga cucian per hari</b></label>
                                        <div class="col-sm-8 mb-2">
                                            <input type="number" class="form-control form-control-sm" name="tipe_cucian"
                                                id="tipe_cucian" required>
                                        </div>
                                        <label class="col-sm-4 col-form-label col-form-label-sm"
                                            for="berat_cucian"><b>Berat
                                                Cucian / Kg</b></label>
                                        <div class="col-sm-8 mb-2">
                                            <input type="number" class="form-control form-control-sm"
                                                name="berat_cucian" id="berat_cucian" required>
                                        </div>
                                        <label class="col-sm-4 col-form-label col-form-label-sm"
                                            for="total_harga"><b>Total
                                                Harga</b></label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-sm" id="total_harga"
                                                    name="total_harga" readonly>
                                                <div class="input-group-append mb-2">
                                                    <button class="btn btn-primary btn-sm" type="button"
                                                        onclick="total()">
                                                        <i class="fa fa-plus mr-2"></i>Hitung
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <input type="hidden" class="form-control" name="no_transaksi" readonly>
                                        <input type="hidden" class="form-control" id="hargatotal" readonly>
                                        <label class="col-sm-4 col-form-label col-form-label-sm"
                                            for="bayar"><b>Bayar</b></label>
                                        <div class="col-sm-8 mb-2">
                                            <input type="number" class="form-control form-control-sm" name="bayar"
                                                id="bayar" required>
                                        </div>
                                        <label class="col-sm-4 col-form-label col-form-label-sm"
                                            for="kembalian"><b>Kembalian</b></label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-sm" id="kembalian"
                                                    name="kembalian" readonly>
                                                <div class="input-group-append mb-2">
                                                    <button class="btn btn-primary btn-sm" type="button"
                                                        onclick="totalKembalian()">
                                                        <i class="fa fa-plus mr-2"></i>Hitung Kembalian
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right mt-5">
                                        <button class="btn btn-primary btn-sm" name="save1" value="simpan"
                                            type="submit">
                                            <i class="fa fa-shopping-cart mr-2"></i>Konfirmasi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Main Bagian Tengah End --}}
        </div>
    </div>

    <!-- Include Bootstrap JS (jQuery and Popper.js required) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        function formatRupiah(angka) {
        var reverse = angka.toString().split('').reverse().join('');
        var ribuan = reverse.match(/\d{1,3}/g);
        var formatted = ribuan.join('.').split('').reverse().join('');
        return 'Rp ' + formatted;
        }
        
        function parseRupiah(rupiah) {
        var numericString = rupiah.replace(/[^0-9,-]/g, '');
        return parseFloat(numericString.replace(',', '.'));
        }


        function total() {
            // Get the values of berat_cucian and total_harga
            var tipeCucian = parseFloat(document.getElementById("tipe_cucian").value);
            var beratCucian = parseFloat(document.getElementById("berat_cucian").value);
    
            // Check if both values are valid numbers
            if (!isNaN(tipeCucian) && !isNaN(beratCucian)) {
                // Calculate the product
                var hasil = tipeCucian * beratCucian;
    
                // Update the total_harga input field with the result
                document.getElementById("total_harga").value = (hasil.toFixed(0)); // Format the result to two decimal places
            }
        }

        function confirmLogout() {
        var confirmResult = confirm("Apakah Anda yakin ingin logout?");
        if (confirmResult) {
        // Jika pengguna mengklik OK pada alert, maka lakukan logout
        window.location.href = '/logout'; // Gantilah dengan URL logout yang sesuai
        }
        }

        function totalKembalian() {
            // Get the values of berat_cucian and total_harga
            var uangBayar = parseFloat(document.getElementById("bayar").value);
            var totalHarga = document.getElementById("total_harga").value;
    
            // Check if both values are valid numbers
            if (!isNaN(totalHarga) && !isNaN(uangBayar)) {
                var hasil = uangBayar - totalHarga;
                document.getElementById("kembalian").value = formatRupiah(hasil.toFixed(2));
            }
        }
    </script>>
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if ("serviceWorker" in navigator) {
          // Register a service worker hosted at the root of the
          // site using the default scope.
          navigator.serviceWorker.register("/sw.js").then(
          (registration) => {
             console.log("Service worker registration succeeded:", registration);
          },
          (error) => {
             console.error(`Service worker registration failed: ${error}`);
          },
        );
      } else {
         console.error("Service workers are not supported.");
      }
    </script>
</body>