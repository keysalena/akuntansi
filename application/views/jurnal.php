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
								<h3 class="card-title">Jurnal</h3>
								<div class="btn-list ms-auto">
									<a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-jurnal">
										<svg xmlns="http://www.w3.org/2000/svg" class="icon" style="margin: 0;" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<path d="M12 5l0 14" />
											<path d="M5 12l14 0" />
										</svg>
									</a>
								</div>
							</div>
							<div class="table-responsive">
								<table class="table card-table table-vcenter text-nowrap datatable">
									<thead>
										<tr>
											<th>Tanggal</th>
											<th>Tipe Jurnal</th>
											<th>Nama Transaksi</th>
											<th>Nominal</th>
											<th>Debit</th>
											<th>Kredit</th>
											<th style="text-align: center;">Aksi</th>
										</tr>
									</thead>
									<tbody id="jurnal-table-body">

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal for adding jurnal -->
	<div class="modal modal-blur fade" id="modal-jurnal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Jurnal</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="addAkunForm">
					<input type="hidden" class="form-control" name="id_profil" id="profilDisplay">
					<script>
						const idProfil = localStorage.getItem('id_profil');
						document.getElementById('profilDisplay').value = idProfil;
					</script>
					<div class="modal-body">
						<div class="mb-3">
							<label class="form-label">Tanggal</label>
							<input type="date" class="form-control" name="tanggal" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Tipe Jurnal</label>
							<select class="form-select" name="id_tipe_jurnal" id="id_tipe_jurnal" required>
								<option value="" disabled selected>Pilih Tipe Jurnal</option>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Nama Transaksi</label>
							<input type="text" class="form-control" name="nama_transaksi" placeholder="Nama Transaksi" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Nominal</label>
							<input type="number" class="form-control" name="nominal" required value="0">
						</div>
						<div class="mb-3">
							<label class="form-label">Debit</label>
							<select class="form-control" name="id_debit" id="id_debit" required>
								<option value="" disabled selected>Pilih Debit</option>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Kredit</label>
							<select class="form-control" name="id_kredit" id="id_kredit" required>
								<option value="" disabled selected>Pilih Kredit</option>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal for editing jurnal -->
	<div class="modal modal-blur fade" id="modal-edit-jurnal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Jurnal</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="editAkunForm">
					<div class="modal-body">
						<input type="hidden" name="id_jurnal" id="edit-id-jurnal">
						<div class="mb-3">
							<label class="form-label">Tanggal</label>
							<input type="date" class="form-control" name="tanggal" id="edit-tanggal" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Tipe Jurnal</label>
							<select class="form-select" name="id_tipe_jurnal" id="edit-id_tipe_jurnal" required>
								<option value="" disabled selected>Pilih Tipe Jurnal</option>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Nama Transaksi</label>
							<input type="text" class="form-control" name="nama_transaksi" id="edit-nama_transaksi" placeholder="Nama Transaksi" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Nominal</label>
							<input type="number" class="form-control" name="nominal" id="edit-nominal" required value="0">
						</div>
						<div class="mb-3">
							<label class="form-label">Debit</label>
							<select class="form-control" name="id_debit" id="edit-id_debit" required>
								<option value="" disabled selected>Pilih Debit</option>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Kredit</label>
							<select class="form-control" name="id_kredit" id="edit-id_kredit" required>
								<option value="" disabled selected>Pilih Kredit</option>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
		function editAkun(id) {
			fetch(`${apiBaseUrl}/${id}`)
				.then(response => response.json())
				.then(data => {
					const jurnalData = data.data;

					document.getElementById("edit-id-jurnal").value = jurnalData.id_jurnal;
					document.getElementById("edit-nama_transaksi").value = jurnalData.nama_transaksi;
					document.getElementById("edit-nominal").value = jurnalData.nominal;
					document.getElementById("edit-tanggal").value = jurnalData.tanggal;

					const editIdAkunSelect = document.getElementById("edit-id_tipe_jurnal");
					editIdAkunSelect.value = jurnalData.id_tipe_jurnal;
					const editDebitSelect = document.getElementById("edit-id_debit");
					editDebitSelect.value = jurnalData.id_debit;
					const editKreditSelect = document.getElementById("edit-id_kredit");
					editKreditSelect.value = jurnalData.id_kredit;

					const editModal = new bootstrap.Modal(document.getElementById('modal-edit-jurnal'));
					editModal.show();
				})
				.catch(error => console.error('Error:', error));
		}


		function loadDebitOptions() {
			fetch('http://api-akuntansi.test/api/data_akun')
				.then(response => response.json())
				.then(data => {
					const akunOptions = data.data.data;
					const idAkunSelect = document.getElementById("id_debit");
					const editIdAkunSelect = document.getElementById("edit-id_debit");

					idAkunSelect.innerHTML = '<option value="" disabled selected>Pilih Debit</option>';
					editIdAkunSelect.innerHTML = '<option value="" disabled selected>Pilih Debit</option>';

					akunOptions.forEach(data_akun => {
						const option = document.createElement("option");
						option.value = data_akun.id_data_akun;
						option.textContent = `${data_akun.kode} - ${data_akun.nama}`;
						idAkunSelect.appendChild(option);

						const editOption = option.cloneNode(true);
						editIdAkunSelect.appendChild(editOption);
					});
				})
				.catch(error => console.error('Error loading data_akun options:', error));
		}

		function loadKreditOptions() {
			fetch('http://api-akuntansi.test/api/data_akun')
				.then(response => response.json())
				.then(data => {
					const akunOptions = data.data.data;
					const idAkunSelect = document.getElementById("id_kredit");
					const editIdAkunSelect = document.getElementById("edit-id_kredit");

					idAkunSelect.innerHTML = '<option value="" disabled selected>Pilih Kredit</option>';
					editIdAkunSelect.innerHTML = '<option value="" disabled selected>Pilih Kredit</option>';

					akunOptions.forEach(data_akun => {
						const option = document.createElement("option");
						option.value = data_akun.id_data_akun;
						option.textContent = `${data_akun.kode} - ${data_akun.nama}`;
						idAkunSelect.appendChild(option);

						const editOption = option.cloneNode(true);
						editIdAkunSelect.appendChild(editOption);
					});
				})
				.catch(error => console.error('Error loading data_akun options:', error));
		}

		function loadJurnalOptions() {
			fetch('http://api-akuntansi.test/api/tipe_jurnal')
				.then(response => response.json())
				.then(data => {
					const akunOptions = data.data.data;
					const idJurnalSelect = document.getElementById("id_tipe_jurnal");
					const editIdJurnalSelect = document.getElementById("edit-id_tipe_jurnal");

					idJurnalSelect.innerHTML = '<option value="" disabled selected>Pilih Tipe Jurnal</option>';
					editIdJurnalSelect.innerHTML = '<option value="" disabled selected>Pilih Tipe Jurnal</option>';

					akunOptions.forEach(tipe_jurnal => {
						const option = document.createElement("option");
						option.value = tipe_jurnal.id_tipe_jurnal;
						option.textContent = tipe_jurnal.nama;
						idJurnalSelect.appendChild(option);

						const editOption = option.cloneNode(true);
						editIdJurnalSelect.appendChild(editOption);
					});
				})
				.catch(error => console.error('Error loading tipe_jurnal options:', error));
		}

		document.addEventListener("DOMContentLoaded", () => {
			loadAkunData();
			loadKreditOptions();
			loadDebitOptions();
			loadJurnalOptions()
		});

		document.getElementById("editAkunForm").addEventListener("submit", function(e) {
			e.preventDefault();

			const id = document.getElementById("edit-id-jurnal").value;
			const id_tipe_jurnal = document.getElementById("edit-id_tipe_jurnal").value;
			const nama_transaksi = document.getElementById("edit-nama_transaksi").value;
			const nominal = document.getElementById("edit-nominal").value;
			const tanggal = document.getElementById("edit-tanggal").value;
			const id_debit = document.getElementById("edit-id_debit").value;
			const id_kredit = document.getElementById("edit-id_kredit").value;

			fetch(`${apiBaseUrl}/${id}`, {
					method: 'PUT',
					headers: {
						'Content-Type': 'application/json'
					},
					body: JSON.stringify({
						id_tipe_jurnal,
						nama_transaksi,
						id_debit,
						id_kredit,
						nominal,
						tanggal
					})
				})
				.then(response => {
					if (!response.ok) {
						return response.json().then(errorData => {
							console.error('Validation errors:', errorData);
							throw new Error('Failed to update jurnal');
						});
					}
					return response.json();
				})
				.then(data => {
					alert("Akun updated successfully!");
					loadAkunData();

					const editModal = bootstrap.Modal.getInstance(document.getElementById('modal-edit-jurnal'));
					editModal.hide();
				})
				.catch(error => console.error('Error:', error));
		});

		const apiBaseUrl = 'http://api-akuntansi.test/api/jurnal';

		document.addEventListener("DOMContentLoaded", () => {
			loadAkunData();

			document.getElementById("addAkunForm").addEventListener("submit", function(e) {
				e.preventDefault();
				const formData = new FormData(this);
				fetch(apiBaseUrl, {
						method: 'POST',
						body: formData
					})
					.then(response => response.json())
					.then(data => {
						alert("Akun added successfully!");
						loadAkunData();
						this.reset();
						const modal = bootstrap.Modal.getInstance(document.getElementById('modal-jurnal'));
						modal.hide();
					})
					.catch(error => {
						console.error('Error:', error);
						alert('An error occurred: ' + error.message); 
					});
			});

		});

		function loadAkunData() {
			fetch(apiBaseUrl)
				.then(response => response.json())
				.then(data => {
					const responseData = data.data;
					const tableBody = document.getElementById("jurnal-table-body");
					tableBody.innerHTML = '';
					responseData.forEach(jurnal => {
						const formattedDate = new Intl.DateTimeFormat('id-ID', {
							day: 'numeric',
							month: 'long',
							year: 'numeric'
						}).format(new Date(jurnal.tanggal));
						const row = document.createElement("tr");
						row.innerHTML = `
					<td>${formattedDate}</td>
					<td>${jurnal.tipe_jurnal.nama}</td>
					<td>${jurnal.nama_transaksi}</td>
					<td>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(jurnal.nominal)}</td>
					<td>${jurnal.debit_account.nama}</td>
					<td>${jurnal.kredit_account.nama}</td>
                    <td align="center">
                        <button onclick="editAkun('${jurnal.id_jurnal}')" class="btn btn-ghost-success">Ubah</button>
                        <button onclick="deleteAkun('${jurnal.id_jurnal}')" class="btn btn-ghost-danger">Hapus</button>
                    </td>`;
						tableBody.appendChild(row);
					});
				})
				.catch(error => console.error('Error:', error));
		}


		function deleteAkun(id) {
			if (confirm("Are you sure you want to delete this account?")) {
				fetch(`${apiBaseUrl}/${id}`, {
						method: 'DELETE',
					})
					.then(response => response.json())
					.then(data => {
						alert("Akun deleted successfully!");
						loadAkunData();
					})
					.catch(error => console.error('Error:', error));
			}
		}
	</script>

	<?php $this->load->view("template/footer.php") ?>
</body>

</html>