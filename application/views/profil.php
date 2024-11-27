<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("templates/head.php") ?>
	<style>
		.btn:hover .icon {
			stroke: white;
		}
	</style>
</head>

<body>
	<?php $this->load->view("templates/sidebar.php") ?>

	<div class="page-wrapper">
		<div class="page-body">
			<div class="container-xl">
				<div class="row row-cards">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header d-flex justify-content-between align-items-center">
								<h3 class="card-title">Profil</h3>
								<div class="btn-list ms-auto">
									<a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-profil">
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
											<th>No.</th>
											<th>Nama</th>
											<th>Username</th>
											<th>Role</th>
											<th style="text-align: center;">Aksi</th>
										</tr>
									</thead>
									<tbody id="profil-table-body">

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal for adding profil -->
	<div class="modal modal-blur fade" id="modal-profil" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Kelompok Akun</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="addAkunForm">
					<div class="modal-body">
						<div class="mb-3">
							<label class="form-label">Nama Kelompok Akun</label>
							<select class="form-control" name="id_role" id="id_role" required>
								<option value="" disabled selected>Pilih Kelompok Akun</option>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Nama Kelompok Sub Akun</label>
							<input type="text" class="form-control" name="nama" placeholder="Nama Akun" required>
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
	<!-- Modal for editing profil -->
	<div class="modal modal-blur fade" id="modal-edit-profil" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Kelompok Akun</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="editAkunForm">
					<div class="modal-body">
						<input type="hidden" name="id_profil" id="edit-id-profil">
						<div class="mb-3">
							<label class="form-label">Nama Kelompok Akun</label>
							<select class="form-control" name="id_role" id="edit-id_role" required>
								<option value="" disabled selected>Pilih Kelompok Akun</option>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Nama Kelompok Sub Akun</label>
							<input type="text" class="form-control" name="nama" id="edit-nama" placeholder="Nama Akun" required>
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
					const profilData = data.data;

					document.getElementById("edit-id-profil").value = profilData.id_profil;
					document.getElementById("edit-nama").value = profilData.nama;

					const editIdAkunSelect = document.getElementById("edit-id_role");
					editIdAkunSelect.value = profilData.akun.id_role;

					const editModal = new bootstrap.Modal(document.getElementById('modal-edit-profil'));
					editModal.show();
				})
				.catch(error => console.error('Error:', error));
		}


		function loadAkunOptions() {
			fetch('http://api-akuntansi.test/api/akun') 
				.then(response => response.json())
				.then(data => {
					const akunOptions = data.data.data;
					const idAkunSelect = document.getElementById("id_role");
					const editIdAkunSelect = document.getElementById("edit-id_role");

					idAkunSelect.innerHTML = '<option value="" disabled selected>Pilih Kelompok Akun</option>';
					editIdAkunSelect.innerHTML = '<option value="" disabled selected>Pilih Kelompok Akun</option>';

					akunOptions.forEach(akun => {
						const option = document.createElement("option");
						option.value = akun.id_role;
						option.textContent = `${akun.kode} - ${akun.nama}`;
						idAkunSelect.appendChild(option);

						const editOption = option.cloneNode(true);
						editIdAkunSelect.appendChild(editOption);
					});
				})
				.catch(error => console.error('Error loading akun options:', error));
		}

		document.addEventListener("DOMContentLoaded", () => {
			loadAkunData();
			loadAkunOptions();
		});

		document.getElementById("editAkunForm").addEventListener("submit", function(e) {
			e.preventDefault();

			const id = document.getElementById("edit-id-profil").value;
			const id_role = document.getElementById("edit-id_role").value;
			const nama = document.getElementById("edit-nama").value;

			fetch(`${apiBaseUrl}/${id}`, {
					method: 'PUT',
					headers: {
						'Content-Type': 'application/json'
					},
					body: JSON.stringify({
						id_role,
						nama
					})
				})
				.then(response => {
					if (!response.ok) {
						return response.json().then(errorData => {
							console.error('Validation errors:', errorData);
							throw new Error('Failed to update profil');
						});
					}
					return response.json();
				})
				.then(data => {
					alert("Akun updated successfully!");
					loadAkunData();

					const editModal = bootstrap.Modal.getInstance(document.getElementById('modal-edit-profil'));
					editModal.hide();
				})
				.catch(error => console.error('Error:', error));
		});

		const apiBaseUrl = 'http://api-akuntansi.test/api/profil';

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
						const modal = bootstrap.Modal.getInstance(document.getElementById('modal-profil'));
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
					let no = 1;
					const tableBody = document.getElementById("profil-table-body");
					tableBody.innerHTML = '';
					responseData.forEach(profil => {
						const row = document.createElement("tr");
						row.innerHTML = `
					<td>${no++}</td>
					<td>${profil.nama}</td>
					<td>${profil.username}</td>
                    <td>${profil.role.role}</td>
                    <td align="center">
                        <button onclick="editAkun('${profil.id_profil}')" class="btn btn-ghost-success">Ubah</button>
                        <button onclick="deleteAkun('${profil.id_profil}')" class="btn btn-ghost-danger">Hapus</button>
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

	<?php $this->load->view("templates/footer.php") ?>
</body>

</html>