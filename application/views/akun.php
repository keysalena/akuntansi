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
								<h3 class="card-title">Kelompok Akun</h3>
								<div class="btn-list ms-auto">
									<a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-akun">
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
											<th style="text-align: center;">Aksi</th>
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

	<!-- Modal for adding akun -->
	<div class="modal modal-blur fade" id="modal-akun" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Kelompok Akun</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="addAkunForm">
					<div class="modal-body">
						<div class="mb-3">
							<label class="form-label">Kode Kelompok Akun</label>
							<input type="text" class="form-control" name="kode" placeholder="Kode Akun" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Nama Kelompok Akun</label>
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
	<!-- Modal for editing akun -->
	<div class="modal modal-blur fade" id="modal-edit-akun" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Kelompok Akun</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="editAkunForm">
					<div class="modal-body">
						<input type="hidden" name="id_akun" id="edit-id-akun">
						<div class="mb-3">
							<label class="form-label">Kode Kelompok Akun</label>
							<input type="text" class="form-control" name="kode" id="edit-kode" placeholder="Kode Akun" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Nama Kelompok Akun</label>
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
					const akunData = data.data;
					document.getElementById("edit-id-akun").value = akunData.id_akun;
					document.getElementById("edit-kode").value = akunData.kode;
					document.getElementById("edit-nama").value = akunData.nama;

					const editModal = new bootstrap.Modal(document.getElementById('modal-edit-akun'));
					editModal.show();
				})
				.catch(error => console.error('Error:', error));
		}

		document.getElementById("editAkunForm").addEventListener("submit", function(e) {
			e.preventDefault();

			const id = document.getElementById("edit-id-akun").value;
			const kode = document.getElementById("edit-kode").value;
			const nama = document.getElementById("edit-nama").value;

			fetch(`${apiBaseUrl}/${id}`, {
					method: 'PUT',
					headers: {
						'Content-Type': 'application/json'
					},
					body: JSON.stringify({
						kode,
						nama
					})
				})
				.then(response => {
					if (!response.ok) {
						return response.json().then(errorData => {
							console.error('Validation errors:', errorData);
							throw new Error('Failed to update akun');
						});
					}
					return response.json();
				})
				.then(data => {
					alert("Akun updated successfully!");
					loadAkunData();

					const editModal = bootstrap.Modal.getInstance(document.getElementById('modal-edit-akun'));
					editModal.hide();
				})
				.catch(error => console.error('Error:', error));
		});
	</script>

	<script>
		const apiBaseUrl = 'http://api-akuntansi.test/api/akun';

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
						const modal = bootstrap.Modal.getInstance(document.getElementById('modal-akun'));
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
					const tableBody = document.getElementById("akun-table-body");
					tableBody.innerHTML = '';
					responseData.forEach(akun => {
						const row = document.createElement("tr");
						row.innerHTML = `
                    <td>${akun.kode}</td>
                    <td>${akun.nama}</td>
                    <td align="center">
                        <button onclick="editAkun('${akun.id_akun}')" class="btn btn-ghost-success">Ubah</button>
                        <button onclick="deleteAkun('${akun.id_akun}')" class="btn btn-ghost-danger">Hapus</button>
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