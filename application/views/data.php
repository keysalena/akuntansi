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
								<h3 class="card-title">Data Akun</h3>
								<div class="btn-list ms-auto">
									<a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-data_akun">
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
											<th>Kode</th>
											<th>Kelompok Akun</th>
											<th>Kode</th>
											<th>Sub-Kelompok Akun</th>
											<th>Kode</th>
											<th>Nama Akun</th>
											<th>Saldo Awal Debit</th>
											<th>Saldo Awal Kredit</th>
											<th style="text-align: center;">Aksi</th>
										</tr>
									</thead>
									<tbody id="data_akun-table-body">

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal for adding data_akun -->
	<div class="modal modal-blur fade" id="modal-data_akun" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Data Akun</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="addAkunForm">
					<div class="modal-body">
						<div class="mb-3">
							<label class="form-label">Nama Kelompok Akun</label>
							<select class="form-control" name="id_sub_akun" id="id_sub_akun" required>
								<option value="" disabled selected>Pilih Kelompok Akun</option>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Nama Akun</label>
							<input type="text" class="form-control" name="nama" placeholder="Nama Akun" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Saldo Awal Debit</label>
							<input type="number" class="form-control" name="debit" placeholder="Saldo Awal Debit" required value="0">
						</div>
						<div class="mb-3">
							<label class="form-label">Saldo Awal Kredit</label>
							<input type="number" class="form-control" name="kredit" placeholder="Saldo Awal Kredit" required value="0">
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
	<!-- Modal for editing data_akun -->
	<div class="modal modal-blur fade" id="modal-edit-data_akun" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Data Akun</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="editAkunForm">
					<div class="modal-body">
						<input type="hidden" name="id_data_akun" id="edit-id-data_akun">
						<div class="mb-3">
							<label class="form-label">Nama Kelompok Akun</label>
							<select class="form-control" name="id_sub_akun" id="edit-id_sub_akun" required>
								<option value="" disabled selected>Pilih Kelompok Akun</option>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Nama Akun</label>
							<input type="text" class="form-control" name="nama" id="edit-nama" placeholder="Nama Akun" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Saldo Awal Debit</label>
							<input type="text" class="form-control" name="debit" id="edit-debit" placeholder="Saldo Awal Debit" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Saldo Awal Kredit</label>
							<input type="text" class="form-control" name="kredit" id="edit-kredit" placeholder="Saldo Awal Kredit" required>
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
					const data_akunData = data.data;

					document.getElementById("edit-id-data_akun").value = data_akunData.id_data_akun;
					document.getElementById("edit-nama").value = data_akunData.nama;
					document.getElementById("edit-nama").value = data_akunData.nama;
					document.getElementById("edit-debit").value = data_akunData.debit;
					document.getElementById("edit-kredit").value = data_akunData.kredit;

					const editIdAkunSelect = document.getElementById("edit-id_sub_akun");
					editIdAkunSelect.value = data_akunData.id_sub_akun;

					const editModal = new bootstrap.Modal(document.getElementById('modal-edit-data_akun'));
					editModal.show();
				})
				.catch(error => console.error('Error:', error));
		}


		function loadAkunOptions() {
			fetch('http://api-akuntansi.test/api/sub_akun')
				.then(response => response.json())
				.then(data => {
					const akunOptions = data.data.data;
					const idAkunSelect = document.getElementById("id_sub_akun");
					const editIdAkunSelect = document.getElementById("edit-id_sub_akun");

					idAkunSelect.innerHTML = '<option value="" disabled selected>Pilih Kelompok Akun</option>';
					editIdAkunSelect.innerHTML = '<option value="" disabled selected>Pilih Kelompok Akun</option>';

					akunOptions.forEach(sub_akun => {
						const option = document.createElement("option");
						option.value = sub_akun.id_sub_akun;
						option.textContent = `${sub_akun.kode} - ${sub_akun.nama}`;
						idAkunSelect.appendChild(option);

						const editOption = option.cloneNode(true);
						editIdAkunSelect.appendChild(editOption);
					});
				})
				.catch(error => console.error('Error loading sub_akun options:', error));
		}

		document.addEventListener("DOMContentLoaded", () => {
			loadAkunData();
			loadAkunOptions();
		});

		document.getElementById("editAkunForm").addEventListener("submit", function(e) {
			e.preventDefault();

			const id = document.getElementById("edit-id-data_akun").value;
			const id_sub_akun = document.getElementById("edit-id_sub_akun").value;
			const nama = document.getElementById("edit-nama").value;
			const debit = document.getElementById("edit-debit").value;
			const kredit = document.getElementById("edit-kredit").value;

			fetch(`${apiBaseUrl}/${id}`, {
					method: 'PUT',
					headers: {
						'Content-Type': 'application/json'
					},
					body: JSON.stringify({
						id_sub_akun,
						nama,
						debit,
						kredit
					})
				})
				.then(response => {
					if (!response.ok) {
						return response.json().then(errorData => {
							console.error('Validation errors:', errorData);
							throw new Error('Failed to update data_akun');
						});
					}
					return response.json();
				})
				.then(data => {
					alert("Akun updated successfully!");
					loadAkunData();

					const editModal = bootstrap.Modal.getInstance(document.getElementById('modal-edit-data_akun'));
					editModal.hide();
				})
				.catch(error => console.error('Error:', error));
		});

		const apiBaseUrl = 'http://api-akuntansi.test/api/data_akun';

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
						const modal = bootstrap.Modal.getInstance(document.getElementById('modal-data_akun'));
						modal.hide();
					})
					.catch(error => console.error('Error:', error));
			});
		});

		function loadAkunData() {
			fetch(apiBaseUrl)
				.then(response => response.json())
				.then(data => {
					const responseData = data.data.data;
					const tableBody = document.getElementById("data_akun-table-body");
					tableBody.innerHTML = '';
					responseData.forEach(data_akun => {
						const row = document.createElement("tr");
						row.innerHTML = `
					<td>${data_akun.sub_akun.akun.kode}</td>
					<td>${data_akun.sub_akun.akun.nama}</td>
					<td>${data_akun.sub_akun.kode}</td>
					<td>${data_akun.sub_akun.nama}</td>
                    <td>${data_akun.kode}</td>
                    <td>${data_akun.nama}</td>
					<td>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(data_akun.debit)}</td>
					<td>${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(data_akun.kredit)}</td>
                    <td align="center">
                        <button onclick="editAkun('${data_akun.id_data_akun}')" class="btn btn-ghost-success">Ubah</button>
                        <button onclick="deleteAkun('${data_akun.id_data_akun}')" class="btn btn-ghost-danger">Hapus</button>
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