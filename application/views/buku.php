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
								<h3 class="card-title">Buku Besar</h3>

								<div class="d-flex align-items-center" style="width: 350px;">
									<h3 class="card-title" style="width: 300px; margin-right:-70px">Nama Akun</h3>
									<select class="form-select" name="id_debit" id="id_debit" required>
										<option value="" disabled selected>Pilih Akun</option>
									</select>
								</div>
							</div>
							<div class="table-responsive">
								<table class="table card-table table-vcenter text-nowrap datatable">
									<thead>
										<tr>
											<th rowspan="2">Tgl.</th>
											<th rowspan="2">Uraian</th>
											<th rowspan="2">Ref</th>
											<th rowspan="2">Debit</th>
											<th rowspan="2">Kredit</th>
											<th colspan="2" style="text-align:center;">Saldo</th>
										</tr>
										<tr>
											<th class="sub-saldo" style="text-align:center;">D</th>
											<th class="sub-saldo" style="text-align:center;">K</th>
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

			// Load data when a specific Akun is selected
			idAkunSelect.addEventListener("change", () => {
				const selectedId = idAkunSelect.value;
				if (selectedId) {
					loadJurnalByDataAkun(selectedId);
				}
			});
		});

		// Load options for Akun
		function loadAkunOptions() {
			fetch('http://api-akuntansi.test/api/data_akun')
				.then(response => response.json())
				.then(data => {
					const akunOptions = data.data.data;
					const idAkunSelect = document.getElementById("id_debit");

					idAkunSelect.innerHTML = '<option value="" disabled selected>Pilih Akun</option>';

					akunOptions.forEach(data_akun => {
						const option = document.createElement("option");
						option.value = data_akun.id_data_akun;
						option.textContent = `${data_akun.kode} - ${data_akun.nama}`;
						idAkunSelect.appendChild(option);
					});
				})
				.catch(error => console.error('Error loading data_akun options:', error));
		}

		function loadJurnalByDataAkun(id_data_akun) {
			fetch(`http://api-akuntansi.test/api/jurnal/data-akun/${id_data_akun}`)
				.then(response => response.json())
				.then(data => {
					const tableBody = document.getElementById("akun-table-body");
					tableBody.innerHTML = "";

					let cumulativeDebit = 0;
					let cumulativeKredit = 0;

					if (data.success && data.data) {
						data.data.forEach(entry => {
							const row = document.createElement("tr");

							const isDebit = entry.id_debit === id_data_akun;
							const isKredit = entry.id_kredit === id_data_akun;

							if (isDebit) {
								cumulativeDebit += entry.nominal;
							}
							if (isKredit) {
								cumulativeKredit += entry.nominal;
							}
							const formattedDate = new Intl.DateTimeFormat('id-ID', {
								day: 'numeric',
								month: 'long',
								year: 'numeric'
							}).format(new Date(entry.tanggal));
							row.innerHTML = `
							<td>${formattedDate}</td>
							<td>${entry.nama_transaksi}</td>
							<td>${entry.tipe_jurnal ? entry.tipe_jurnal.nama : '-'}</td>
							<td>${isDebit ? new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(entry.nominal) : 'Rp-'}</td>
							<td>${isKredit ? new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(entry.nominal) : 'Rp-'}</td>
							<td align="center">${cumulativeDebit === 0 ? 'Rp -' : new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(cumulativeDebit)}</td>  
							<td align="center">${cumulativeKredit === 0 ? 'Rp -' : new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(cumulativeKredit)}</td>
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