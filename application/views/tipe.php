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
								<h3 class="card-title">Tipe Jurnal</h3>
								<div class="btn-list ms-auto">
									<a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-tipe_jurnal">
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
											<th style="text-align: center;">Aksi</th>
										</tr>
									</thead>
									<tbody id="tipe_jurnal-table-body">
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal for adding tipe_jurnal -->
	<div class="modal modal-blur fade" id="modal-tipe_jurnal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Tipe Jurnal</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="addTipeJurnalForm">
					<div class="modal-body">
						<div class="mb-3">
							<label class="form-label">Nama</label>
							<input type="text" class="form-control" name="nama" placeholder="Nama TipeJurnal" required>
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
	<!-- Modal for editing tipe_jurnal -->
	<div class="modal modal-blur fade" id="modal-edit-tipe_jurnal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Tipe Jurnal</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="editTipeJurnalForm">
					<div class="modal-body">
						<input type="hidden" name="id_tipe_jurnal" id="edit-id-tipe_jurnal">
						<div class="mb-3">
							<label class="form-label">Nama</label>
							<input type="text" class="form-control" name="nama" id="edit-nama" placeholder="Nama TipeJurnal" required>
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
		function editTipeJurnal(id) {
			fetch(`${apiBaseUrl}/${id}`)
				.then(response => response.json())
				.then(data => {
					const tipe_jurnalData = data.data;
					document.getElementById("edit-id-tipe_jurnal").value = tipe_jurnalData.id_tipe_jurnal;
					document.getElementById("edit-nama").value = tipe_jurnalData.nama;

					const editModal = new bootstrap.Modal(document.getElementById('modal-edit-tipe_jurnal'));
					editModal.show();
				})
				.catch(error => console.error('Error:', error));
		}

		document.getElementById("editTipeJurnalForm").addEventListener("submit", function(e) {
			e.preventDefault();

			const id = document.getElementById("edit-id-tipe_jurnal").value;
			const nama = document.getElementById("edit-nama").value;

			fetch(`${apiBaseUrl}/${id}`, {
					method: 'PUT',
					headers: {
						'Content-Type': 'application/json'
					},
					body: JSON.stringify({
						nama
					})
				})
				.then(response => {
					if (!response.ok) {
						return response.json().then(errorData => {
							console.error('Validation errors:', errorData);
							throw new Error('Failed to update tipe_jurnal');
						});
					}
					return response.json();
				})
				.then(data => {
					alert("TipeJurnal updated successfully!");
					loadTipeJurnalData(); 

					const editModal = bootstrap.Modal.getInstance(document.getElementById('modal-edit-tipe_jurnal'));
					editModal.hide();
				})
				.catch(error => console.error('Error:', error));
		});

		const apiBaseUrl = 'http://api-akuntansi.test/api/tipe_jurnal';

		document.addEventListener("DOMContentLoaded", () => {
			loadTipeJurnalData();

			document.getElementById("addTipeJurnalForm").addEventListener("submit", function(e) {
				e.preventDefault();
				const formData = new FormData(this);
				fetch(apiBaseUrl, {
						method: 'POST',
						body: formData
					})
					.then(response => response.json())
					.then(data => {
						alert("TipeJurnal added successfully!");
						loadTipeJurnalData();
						this.reset();
						const modal = bootstrap.Modal.getInstance(document.getElementById('modal-tipe_jurnal'));
						modal.hide();
					})
					.catch(error => console.error('Error:', error));
			});
		});

		function loadTipeJurnalData() {
			fetch(apiBaseUrl)
				.then(response => response.json())
				.then(data => {
					const responseData = data.data.data;
					let no = 1;
					const tableBody = document.getElementById("tipe_jurnal-table-body");
					tableBody.innerHTML = '';
					responseData.forEach(tipe_jurnal => {
						const row = document.createElement("tr");
						row.innerHTML = `
                    <td>${no++}</td>
                    <td>${tipe_jurnal.nama}</td>
                    <td align="center">
                        <button onclick="editTipeJurnal('${tipe_jurnal.id_tipe_jurnal}')" class="btn btn-ghost-success">Ubah</button>
                        <button onclick="deleteTipeJurnal('${tipe_jurnal.id_tipe_jurnal}')" class="btn btn-ghost-danger">Hapus</button>
                    </td>`;
						tableBody.appendChild(row);
					});
				})
				.catch(error => console.error('Error:', error));
		}


		function deleteTipeJurnal(id) {
			if (confirm("Are you sure you want to delete this account?")) {
				fetch(`${apiBaseUrl}/${id}`, {
						method: 'DELETE',
					})
					.then(response => response.json())
					.then(data => {
						alert("TipeJurnal deleted successfully!");
						loadTipeJurnalData();
					})
					.catch(error => console.error('Error:', error));
			}
		}
	</script>

	<?php $this->load->view("templates/footer.php") ?>
</body>

</html>