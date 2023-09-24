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
    <link rel="stylesheet" href="css/style.css">

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <script src="https://unpkg.com/feather-icons"></script>


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
    @if (session()->has('success'))
    <!-- Bootstrap Alert -->
    <div class="alert alert-success alert-dismissible fade show text-lg-left" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <br>
    <div class="container-fluid">
        <div class="row">
            {{-- Laporan Bagian Kiri Start --}}
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
                                        onclick="return confirm('Yakin Mau Hapus Data??')"></i>Keluar</button>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- Laporan Bagian Kiri End --}}

            {{-- Laporan Bagian Tengah Start --}}
            <div class="col-md-9 mb-2">
                <div class="row">
                    <!-- table transaksi -->
                    <div class="col-md-12 mb-2">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <div class="card-tittle text-white"><i class="fa fa-table"></i> <b>Data Laporan</b>
                                </div>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-striped table-bordered table-sm dt-responsive nowrap"
                                    id="table" width="100%">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th class="small font-weight-bold">No</th>
                                            <th class="small font-weight-bold">Tanggal Transaksi</th>
                                            <th class="small font-weight-bold">Nama Konsumen</th>
                                            <th class="small font-weight-bold">Nomor Whatsapp</th>
                                            <th class="small font-weight-bold">Kategori Jasa</th>
                                            <th class="small font-weight-bold">Tipe Cucian</th>
                                            <th class="small font-weight-bold">Berat Cucian / Kg</th>
                                            <th class="small font-weight-bold">Total Harga</th>
                                            <th class="small font-weight-bold">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi as $dataTransaksi)
                                        <tr class="text-left ">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $dataTransaksi->created_at }}</td>
                                            <td>{{ $dataTransaksi->nama_konsumen }}</td>
                                            <td>{{ $dataTransaksi->nomor_konsumen }}</td>
                                            <td>{{ $dataTransaksi->kategori_jasa }}</td>
                                            <td>{{ $dataTransaksi->tipe_cucian }}</td>
                                            <td>{{ $dataTransaksi->berat_cucian }}</td>
                                            <td>{{ $dataTransaksi->total_harga }}</td>
                                            <td>
                                                <a href="/dashboard/laporan/{{ $dataTransaksi->id }}"
                                                    class="badge bg-primary text-white mt-2 mb-2"><span
                                                        data-feather="eye"></span></a>
                                                <form action="/dashboard/laporan/{{ $dataTransaksi->id }}" method="POST"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="badge bg-danger border-0 text-white mt-2 mb-2"
                                                        onclick="return confirm('Yakin Mau Hapus Data??')"><span
                                                            data-feather="x-circle"></span></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end table transaksi -->
                </div>
            </div>
            {{-- Laporan Bagian Kanan End --}}
        </div>
    </div>

    <!-- Include Bootstrap JS (jQuery and Popper.js required) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        feather.replace();
    </script>
</body>