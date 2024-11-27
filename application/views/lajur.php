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
								<h3 class="card-title">Neraca Lajur</h3>
							</div>
							<div class="table-responsive">
								<table class="table card-table table-vcenter text-nowrap datatable">
									<thead>
										<tr>
											<th rowspan="2">Kode</th>
											<th rowspan="2">Akun</th>
											<th colspan="2" style="text-align: center;">Neraca Saldo</th>
											<th colspan="2" style="text-align: center;">Ayat Jurnal Penyesuaian</th>
											<th colspan="2" style="text-align: center;">Neraca Saldo Disesuaikan</th>
											<th colspan="2" style="text-align: center;">Laba Rugi</th>
											<th colspan="2" style="text-align: center;">Neraca</th>
										</tr>
										<tr>
											<th style="text-align: center;">Debit</th>
											<th style="text-align: center;">Kredit</th>
											<th style="text-align: center;">Debit</th>
											<th style="text-align: center;">Kredit</th>
											<th style="text-align: center;">Debit</th>
											<th style="text-align: center;">Kredit</th>
											<th style="text-align: center;">Debit</th>
											<th style="text-align: center;">Kredit</th>
											<th style="text-align: center;">Debit</th>
											<th style="text-align: center;">Kredit</th>
										</tr>
									</thead>
									<tbody id="akun-table-body">
										<!-- Dynamic table rows go here -->
									</tbody>
								</table>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view("template/footer.php") ?>
</body>

</html>