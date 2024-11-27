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
								<h3 class="card-title">Neraca Saldo</h3>
							</div>
							<div class="table-responsive">
								<table class="table card-table table-vcenter text-nowrap datatable">
									<thead>
										<tr>
											<th>Kode</th>
											<th>Nama Akun</th>
											<th>Debit</th>
											<th>Kredit</th>
											<th>Saldo Debit</th>
											<th>Saldo Kredit</th>
										</tr>
										<tr>
											<th colspan="4">SETELAH JURNAL PENUTUPAN, SALDO SEMUA AKUN LABA RUGI HARUS NOL & SALDO SEMUA AKUN NERACA HARUS SEIMBANG ></th>
											<th id="saldoDebit"></th>
											<th id="saldoKredit"></th>
										</tr>
									</thead>
									<tbody id="akun-table-body">

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
			loadSaldo();
		});

		function loadSaldo() {
			fetch(`http://api-akuntansi.test/api/data_akun`)
				.then(response => response.json())
				.then(data => {
					const responseData = data.data.data;
					let no = 1;
					let totalSaldoDebit = 0;
					let totalSaldoKredit = 0;

					const tableBody = document.getElementById("akun-table-body");
					tableBody.innerHTML = '';

					fetch('http://api-akuntansi.test/api/jurnal')
						.then(response => response.json())
						.then(jurnalData => {
							const jurnalEntries = jurnalData.data;

							responseData.forEach(data_akun => {
								let totalDebit = 0;
								let totalKredit = 0;

								jurnalEntries.forEach(jurnal => {
									if (jurnal.id_debit === data_akun.id_data_akun) {
										totalDebit += jurnal.nominal;
									}
									if (jurnal.id_kredit === data_akun.id_data_akun) {
										totalKredit += jurnal.nominal;
									}
								});

								totalSaldoDebit += totalDebit;
								totalSaldoKredit += totalKredit;

								const row = document.createElement("tr");
								row.innerHTML = `
									<td>${data_akun.kode}</td>
									<td>${data_akun.nama}</td>
									<td>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalDebit)}</td>
									<td>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalKredit)}</td>
									<td>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalDebit)}</td>
									<td>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalKredit)}</td>
								`;
								tableBody.appendChild(row);
							});

							document.getElementById("saldoDebit").innerHTML = `${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalSaldoDebit)}`;
							document.getElementById("saldoKredit").innerHTML = `${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalSaldoKredit)}`;
						})
						.catch(error => console.error('Error loading Jurnal entries:', error));
				})
				.catch(error => console.error('Error loading Data Akun:', error));
		}
	</script>
	<?php $this->load->view("template/footer.php") ?>
</body>

</html>