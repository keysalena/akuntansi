<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("template/head.php") ?>
    <style>
        .btn:hover .icon {
            stroke: white;
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
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Cari Riwayat Jurnal</h3>
                                <select class="form-select" name="id_debit" id="id_debit" style="width: 350px; margin-left:-310px" required>
                                    <option value="" disabled selected>Pilih Akun</option>
                                </select>

                                <div class="d-flex align-items-center" style="width: 350px; margin-right: 50px;">
                                    <h3 class="card-title" style="width: 300px; margin-right:30px">Periode</h3>
                                    <input type="date" id="start_date" class="form-control" value="2024-11\\1 -13">
                                    <h3 class="card-title" style="width: 300px;">-</h3>
                                    <input type="date" id="end_date" class="form-control" value="2024-11-22">
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap datatable">
                                    <thead>
                                        <tr>
                                            <th>Tgl.</th>
                                            <th>Transaksi</th>
                                            <th>Tipe</th>
                                            <th>Nominal</th>
                                            <th>Debit</th>
                                            <th>Kredit</th>
                                        </tr>
                                    </thead>
                                    <tbody id="akun-table-body">
                                        <!-- Rows will be populated here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            loadAkunOptions();
            const idAkunSelect = document.getElementById("id_debit");
            const startDateInput = document.getElementById("start_date");
            const endDateInput = document.getElementById("end_date");

            idAkunSelect.addEventListener("change", loadJurnalEntries);
            startDateInput.addEventListener("change", loadJurnalEntries);
            endDateInput.addEventListener("change", loadJurnalEntries);
        });

        function loadAkunOptions() {
            fetch('http://api-akuntansi.test/api/data_akun')
                .then(response => response.json())
                .then(data => {
                    const akunOptions = data.data.data;
                    const idAkunSelect = document.getElementById("id_debit");

                    idAkunSelect.innerHTML = "";

                    if (akunOptions.length > 0) {
                        const firstOption = document.createElement("option");
                        firstOption.value = akunOptions[0].id_data_akun;
                        firstOption.textContent = `${akunOptions[0].kode} - ${akunOptions[0].nama}`;
                        firstOption.selected = true;
                        idAkunSelect.appendChild(firstOption);

                        akunOptions.slice(1).forEach(data_akun => {
                            const option = document.createElement("option");
                            option.value = data_akun.id_data_akun;
                            option.textContent = `${data_akun.kode} - ${data_akun.nama}`;
                            idAkunSelect.appendChild(option);
                        });

                        loadJurnalEntries(akunOptions[0].id_data_akun);
                    }
                })
                .catch(error => console.error('Error loading data_akun options:', error));
        }


        function loadJurnalEntries() {
            const id_data_akun = document.getElementById("id_debit").value;
            const startDate = document.getElementById("start_date").value;
            const endDate = document.getElementById("end_date").value;

            if (!id_data_akun) return; 

            fetch(`http://api-akuntansi.test/api/jurnal/data-akun/${id_data_akun}/between-date?start_date=${startDate}&end_date=${endDate}`)
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById("akun-table-body");
                    tableBody.innerHTML = "";

                    if (data.success && data.data) {
                        data.data.forEach(entry => {
                            const row = document.createElement("tr");
                            const formattedDate = new Intl.DateTimeFormat('id-ID', {
                                day: 'numeric',
                                month: 'long',
                                year: 'numeric'
                            }).format(new Date(entry.tanggal));

                            row.innerHTML = `
                                <td>${formattedDate}</td>
                                <td>${entry.nama_transaksi}</td>
                                <td>${entry.tipe_jurnal ? entry.tipe_jurnal.nama : '-'}</td>
                                <td>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(entry.nominal)}</td>
                                <td>${entry.debit_account ? entry.debit_account.nama : '-'}</td>
                                <td>${entry.kredit_account ? entry.kredit_account.nama : '-'}</td>
                            `;

                            tableBody.appendChild(row);
                        });
                    } else {
                        console.error("No Jurnal entries found for this account");
                    }
                })
                .catch(error => console.error('Error loading Jurnal entries:', error));
        }
    </script>

    <?php $this->load->view("template/footer.php") ?>
</body>

</html>