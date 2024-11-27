<script src="<?= base_url() ?>assets/dist/js/demo-theme.min.js?1692870487"></script>
<div class="page">
    <!-- Navbar -->
    <header class="navbar navbar-expand-md d-print-none">
        <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                <a href=".">
                    <h1 class="navbar-brand-image" id="usernameDisplay" style="margin: 0;"></h1>
                    <!-- <img src="<?= base_url() ?>assets/static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image"> -->
                </a>
            </h1>
            <div class="navbar-nav flex-row order-md-last">
                <div class="d-none d-md-flex">
                    <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip"
                        data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                        </svg>
                    </a>
                    <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode" data-bs-toggle="tooltip"
                        data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                            <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                        </svg>
                    </a>
                    <a href="#" class="nav-link px-0" title="Keluar" data-bs-toggle="tooltip"
                        data-bs-placement="bottom" id="logoutButton">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-logout">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                            <path d="M9 12h12l-3 -3" />
                            <path d="M18 15l3 -3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <header class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar">
                <div class="container-xl">
                    <ul class="navbar-nav">
                        <?php
                        $currentPage = $this->uri->segment(1);

                        function isActive($items, $currentPage)
                        {
                            return $items === $currentPage ? 'active' : '';
                        }
                        ?>
                        <li class="nav-item <?php echo ($currentPage == '' || $currentPage == 'akuntansi') ? 'active' : isActive('dashboard', $currentPage); ?>">
                            <a class="nav-link" href="<?= base_url('dashboard') ?>">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dashboard">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                        <path d="M13.45 11.55l2.05 -2.05" />
                                        <path d="M6.4 20a9 9 0 1 1 11.2 0z" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <!-- <li class="nav-item <?php echo isActive('akun', $currentPage); ?>">
                            <a class="nav-link" href="<?= base_url('akun') ?>">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-crown">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Kelompok Akun
                                </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo isActive('sub', $currentPage); ?>">
                            <a class="nav-link" href="<?= base_url('sub') ?>">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-crown">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Sub-Kelompok Akun
                                </span>
                            </a>
                        </li> -->
                        <li class="nav-item <?php echo isActive('data', $currentPage); ?>">
                            <a class="nav-link" href="<?= base_url('data') ?>">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-building-bank">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 21l18 0" />
                                        <path d="M3 10l18 0" />
                                        <path d="M5 6l7 -3l7 3" />
                                        <path d="M4 10l0 11" />
                                        <path d="M20 10l0 11" />
                                        <path d="M8 14l0 3" />
                                        <path d="M12 14l0 3" />
                                        <path d="M16 14l0 3" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Data Akun
                                </span>
                            </a>
                        </li>
                        <!-- <li class="nav-item <?php echo isActive('tipe', $currentPage); ?>">
                            <a class="nav-link" href="<?= base_url('tipe') ?>">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-crown">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Tipe Jurnal
                                </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo isActive('role', $currentPage); ?>">
                            <a class="nav-link" href="<?= base_url('role') ?>">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-crown">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Role
                                </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo isActive('profil', $currentPage); ?>">
                            <a class="nav-link" href="<?= base_url('profil') ?>">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-crown">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 6l4 6l5 -4l-2 10h-14l-2 -10l5 4z" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Profil
                                </span>
                            </a>
                        </li> -->
                        <li class="nav-item <?php echo isActive('jurnal', $currentPage); ?>">
                            <a class="nav-link" href="<?= base_url('jurnal') ?>">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-mouse-2">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M6 3m0 4a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v10a4 4 0 0 1 -4 4h-4a4 4 0 0 1 -4 -4z" />
                                        <path d="M12 3v7" />
                                        <path d="M6 10h12" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Input Jurnal
                                </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo isActive('buku', $currentPage); ?>">
                            <a class="nav-link" href="<?= base_url('buku') ?>">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-book-2">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M19 4v16h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12z" />
                                        <path d="M19 16h-12a2 2 0 0 0 -2 2" />
                                        <path d="M9 8h6" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Buku Besar
                                </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo isActive('saldo', $currentPage); ?>">
                            <a class="nav-link" href="<?= base_url('saldo') ?>">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-scale">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M7 20l10 0" />
                                        <path d="M6 6l6 -1l6 1" />
                                        <path d="M12 3l0 17" />
                                        <path d="M9 12l-3 -6l-3 6a3 3 0 0 0 6 0" />
                                        <path d="M21 12l-3 -6l-3 6a3 3 0 0 0 6 0" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Neraca Saldo
                                </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo isActive('riwayat', $currentPage); ?>">
                            <a class="nav-link" href="<?= base_url('riwayat') ?>">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-history">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 8l0 4l2 2" />
                                        <path d="M3.05 11a9 9 0 1 1 .5 4m-.5 5v-5h5" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Riwayat Jurnal
                                </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo isActive('laba', $currentPage); ?>">
                            <a class="nav-link" href="<?= base_url('laba') ?>">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-businessplan">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M16 6m-5 0a5 3 0 1 0 10 0a5 3 0 1 0 -10 0" />
                                        <path d="M11 6v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4" />
                                        <path d="M11 10v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4" />
                                        <path d="M11 14v4c0 1.657 2.239 3 5 3s5 -1.343 5 -3v-4" />
                                        <path d="M7 9h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                                        <path d="M5 15v1m0 -8v1" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Laba Rugi
                                </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo isActive('perubahan', $currentPage); ?>">
                            <a class="nav-link" href="<?= base_url('perubahan') ?>">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-home-2">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                        <path d="M10 12h4v4h-4z" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Perubahan Ekuitas
                                </span>
                            </a>
                        </li>
                        <li class="nav-item <?php echo isActive('lajur', $currentPage); ?>">
                            <a class="nav-link" href="<?= base_url('lajur') ?>">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-align-box-center-stretch">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 19v-14a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                        <path d="M11 17h2" />
                                        <path d="M9 12h6" />
                                        <path d="M10 7h4" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Neraca Lajur
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <script>
        const username = localStorage.getItem('nama');
        document.getElementById('usernameDisplay').textContent = username;
    </script>
    <script>
        document.getElementById('logoutButton').addEventListener('click', function(event) {
            localStorage.removeItem('authToken');
            localStorage.removeItem('username');
            localStorage.removeItem('nama');
            localStorage.removeItem('id_profil');

            window.location.href = "<?= base_url('login') ?>";
        });
    </script>