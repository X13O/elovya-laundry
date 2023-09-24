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
                                        class="fa fa-power-off text-primary mr-2"></i>Keluar</button>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- Main Bagian Kiri End --}}

            {{-- Main Bagian Kanan Start --}}
            <div class="col-sm-5 mb-2">
                <div class="card" id="print">
                    <div class="card-header bg-white border-0 pb-0 pt-4">
                        <div class="row">
                            <div class="col-8 col-sm-9 pr-0">
                                <ul class="pl-0 small" style="list-style: none;text-transform: uppercase;">
                                    <li>KASIR : {{ auth()->user()->username }}</li>
                                </ul>
                            </div>
                            <div class="col-4 col-sm-3 pl-0">
                                <ul class="pl-0 small" style="list-style: none;">
                                    <li>TGL : {{ $post->kapan_dibuat }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body small pt-0">
                        <hr class="mt-0">
                        <div class="row">
                            <div class="col-3 pr-0">
                                <span><b>Nama Jasa</b></span>
                                <p>{{ $post->kategori_jasa }}</p>
                            </div>
                            <div class="col-4 px-0 text-center">
                                <span><b>Berat Cucian / Kg</b></span><br>
                                <span class="pt-5">{{ $post->berat_cucian }} / Kg</span>
                            </div>
                            <div class="col-4 px-0 text-center">
                                <span><b>Tipe Cucian / Hari</b></span><br>
                                <span>{{ $post->tipe_cucian }}</span>
                            </div>
                            <div class="col-12">
                                <hr class="mt-2">
                            </div>
                            <div class="col-12">
                                <hr class="mt-2">
                                <ul class="list-group border-0">
                                    <li
                                        class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                                        <b>Nama Konsumen</b>
                                        <span>{{ $post->nama_konsumen }}</span>
                                    </li>
                                    <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center"
                                        id="nomorKonsumen" data-nomor="{{ $post->nomor_konsumen }}">
                                        <b>Nomor Whatsapp Konsumen</b>
                                        <span>{{ $post->nomor_konsumen }}</span>
                                    </li>
                                    <li
                                        class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                                        <b>Total Harga</b>
                                        <span>{{ $post->total_harga }}</span>
                                    </li>
                                    <li
                                        class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                                        <b>Bayar</b>
                                        <span>{{ $post->bayar }}</span>
                                    </li>
                                    <li
                                        class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                                        <b>Kembalian</b>
                                        <span>{{ $post->kembalian }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-12 mt-3 text-center">
                                <p>* TERIMA KASIH TELAH MENGGUNAKAN JASA ELOVYA LAUNDRY*</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right mt-3 mb-5">
                    <button class="btn btn-primary-light btn-sm mr-2" onclick="printContent('print')"><i
                            class="fa fa-print mr-1"></i> Print</button>
                    <button class="btn btn-primary btn-sm" name="kirimPesan" type="submit" onclick="kirimPesan()"
                        id="buttonPesan"><i class="fa fa-check mr-1"></i>
                        Kirim Pesan Whatsapp</button>
                </div>
            </div>
            {{-- Main Bagian Kanan End --}}
        </div>
    </div>

    <!-- Include Bootstrap JS (jQuery and Popper.js required) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        function printContent(print) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(print).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
        }

        function kirimPesan() {
            document.getElementById('buttonPesan').addEventListener('click', function() {
            // Mengambil nilai nomor konsumen dari atribut data-nomor
            var nomorTujuan = document.getElementById('nomorKonsumen').getAttribute('data-nomor');
            
            // Pesan yang ingin Anda kirim
            var pesan = 'Halo, Kami dari Elovya Laundry ingin menginfokan bahwa pakaian anda sudah selesai kami cuci. Silahkan diambil di loket kami dan kami mengucapkan Terimakasih karena sudah menggunakan jasa Laundry kami 🙏🙏.';
            
            // URL untuk membuka WhatsApp dengan nomor dan pesan yang sesuai
            var url = 'https://api.whatsapp.com/send?phone=' + nomorTujuan + '&text=' + encodeURIComponent(pesan);
            
            // Buka WhatsApp
            window.open(url);
            });
        }
    </script>>
</body>