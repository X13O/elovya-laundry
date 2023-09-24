<nav
    class="navbar navbar-expand-lg navbar-dark bg-primary text-white shadow-sm sticky-top d-md-none d-lg-none d-xl-none">
    <a class="navbar-brand" href="/"><i class="bi bi-card-text"></i> Elovya Laundry</i></a>
    <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link putih" href="/dashboard"><i class="fa fa-desktop mr-2"></i>Kasir</a>
            </li>
            <li class="nav-item">
                <a class="nav-link putih" href="/dashboard/laporan"><i class="fa fa-table mr-2"></i>Laporan</a>
            </li>
            <li class="nav-item">
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="nav-link border-0 bg-primary"><i
                            class="fa fa-power-off text-white-50 mr-2"
                            onclick="return confirm('Apakah anda yakin ingin logout?')"></i>Keluar</button>
                </form>
            </li>
        </ul>
    </div>
</nav>