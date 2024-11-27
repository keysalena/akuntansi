<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("template/head.php") ?>
    <style>
        .page-wrapper[data-bs-theme="light"] .theme-dependent-border {
            border-bottom: 2px solid black !important;
        }

        .page-wrapper[data-bs-theme="dark"] .theme-dependent-border {
            border-bottom: 2px solid white !important;
        }

        .page-wrapper[data-bs-theme="light"] .theme-border {
            border-bottom: 2px solid black !important;
            border-top: 1px solid black !important;
        }

        .page-wrapper[data-bs-theme="dark"] .theme-border {
            border-bottom: 2px solid white !important;
            border-top: 1px solid white !important;
        }

        body {
            overflow: hidden;
        }
    </style>
</head>

<body>
    <?php $this->load->view("template/sidebar.php") ?>

    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <div class="col-md-12">
                        <div class="card" style="padding: 20px; max-width: 600px ">
                            <div class="table-responsive">
                                <table style="width: 100%; margin-top: 10px;">
                                    <thead>
                                        <tr>
                                            <th colspan="3" style="text-align: center;">
                                                <h1>LAPORAN LABA RUGI</h1>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="3" class="theme-dependent-border" style="text-align: center;">
                                                <h4 style="margin-top: -15px; margin-bottom: 3px;">Untuk bulan yang berakhir 31 Desember 2023</h4>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <h3 style="margin-top:30px;">OMZET PENJUALAN</h3>
                                            </th>
                                            <th style="text-align: right;">
                                                <h3 style="margin-top:30px;">Rp -</h3>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <h3 style="margin-top:-10px; font-weight: normal; margin-left:15px;">Harga Pokok Penjualan</h3>
                                            </th>
                                            <th style="text-align: right;">
                                                <h3 style="margin-top:-10px; font-weight: normal;">Rp -</h3>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left; padding-left: 15px;">
                                                <h3 style="margin-top: -10px; font-style: italic;">Semi Laba/Rugi Kotor</h3>
                                            </th>
                                            <th style="text-align: right;">
                                                <h3 style="margin-top: -10px; font-style: italic;">Rp -</h3>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <h3 style="margin-top:10px;">BIAYA PENYIMPANAN</h3>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <h3 style="margin-top:-10px; font-weight: normal; margin-left:15px;">Biaya Barang Hilang</h3>
                                            </th>
                                            <th style="text-align: right;">
                                                <h3 style="margin-top:-10px; font-weight: normal;">Rp -</h3>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left; padding-left: 15px;">
                                                <h3 style="margin-top: 10px; font-style: italic;">Laba/Rugi Kotor</h3>
                                            </th>
                                            <th style="text-align: right;">
                                                <h3 style="margin-top: 10px; font-style: italic;">Rp -</h3>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <h3 style="margin-top:10px;">BIAYA OPERASIONAL</h3>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <h3 style="margin-top:-10px; font-weight: normal; margin-left:15px;">Beban Gaji Karyawan</h3>
                                            </th>
                                            <th style="text-align: right;">
                                                <h3 style="margin-top:-10px; font-weight: normal;">Rp -</h3>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <h3 style="margin-top:-10px; font-weight: normal; margin-left:15px;">Beban Sponsor</h3>
                                            </th>
                                            <th style="text-align: right;">
                                                <h3 style="margin-top:-10px; font-weight: normal;">Rp -</h3>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                <h3 style="margin-top:-10px; font-weight: normal; margin-left:15px;">Sewa Bayar di Muka</h3>
                                            </th>
                                            <th style="text-align: right;">
                                                <h3 style="margin-top:-10px; font-weight: normal;">Rp -</h3>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left; padding-left: 15px;">
                                                <h3 style="margin-top: 10px; margin-bottom: 40px; font-style: italic;">Total Biaya Operasional</h3>
                                            </th>
                                            <th style="text-align: right;">
                                                <h3 style="margin-top: 10px; margin-bottom: 40px; font-style: italic;">Rp -</h3>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left;" class="theme-border">
                                                <h3 style="margin-top: 5px; margin-bottom:5px;">LABA/RUGI BERSIH</h3>
                                            </th>
                                            <th style="text-align: right;" class="theme-border">
                                                <h3 style="margin-top: 5px; margin-bottom:5px;">Rp -</h3>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view("template/footer.php") ?>
    <script>
        var themeStorageKey = "tablerTheme";
        var defaultTheme = "light";
        var selectedTheme = localStorage.getItem(themeStorageKey) || defaultTheme;

        document.querySelector('.page-wrapper').setAttribute("data-bs-theme", selectedTheme);
    </script>
</body>

</html>