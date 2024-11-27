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
								<h3 class="card-title">Role</h3>
								<div class="btn-list ms-auto">
									<a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-role">
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
											<th>Role</th>
											<th style="text-align: center;">Aksi</th>
										</tr>
									</thead>
									<tbody id="role-table-body">
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal for adding role -->
	<div class="modal modal-blur fade" id="modal-role" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Role</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="addTipeJurnalForm">
					<div class="modal-body">
						<div class="mb-3">
							<label class="form-label">Role</label>
							<input type="text" class="form-control" name="role" placeholder="Role TipeJurnal" required>
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
	<!-- Modal for editing role -->
	<div class="modal modal-blur fade" id="modal-edit-role" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Role</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="editTipeJurnalForm">
					<div class="modal-body">
						<input type="hidden" name="id_role" id="edit-id-role">
						<div class="mb-3">
							<label class="form-label">Role</label>
							<input type="text" class="form-control" name="role" id="edit-role" placeholder="Role TipeJurnal" required>
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
					const roleData = data.data;
					document.getElementById("edit-id-role").value = roleData.id_role;
					document.getElementById("edit-role").value = roleData.role;

					const editModal = new bootstrap.Modal(document.getElementById('modal-edit-role'));
					editModal.show();
				})
				.catch(error => console.error('Error:', error));
		}

		document.getElementById("editTipeJurnalForm").addEventListener("submit", function(e) {
			e.preventDefault();

			const id = document.getElementById("edit-id-role").value;
			const role = document.getElementById("edit-role").value;

			fetch(`${apiBaseUrl}/${id}`, {
					method: 'PUT',
					headers: {
						'Content-Type': 'application/json'
					},
					body: JSON.stringify({
						role
					})
				})
				.then(response => {
					if (!response.ok) {
						return response.json().then(errorData => {
							console.error('Validation errors:', errorData);
							throw new Error('Failed to update role');
						});
					}
					return response.json();
				})
				.then(data => {
					alert("TipeJurnal updated successfully!");
					loadTipeJurnalData(); 

					const editModal = bootstrap.Modal.getInstance(document.getElementById('modal-edit-role'));
					editModal.hide();
				})
				.catch(error => console.error('Error:', error));
		});

		const apiBaseUrl = 'http://api-akuntansi.test/api/role';

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
						const modal = bootstrap.Modal.getInstance(document.getElementById('modal-role'));
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
					const tableBody = document.getElementById("role-table-body");
					tableBody.innerHTML = '';
					responseData.forEach(role => {
						const row = document.createElement("tr");
						row.innerHTML = `
                    <td>${no++}</td>
                    <td>${role.role}</td>
                    <td align="center">
                        <button onclick="editTipeJurnal('${role.id_role}')" class="btn btn-ghost-success">Ubah</button>
                        <button onclick="deleteTipeJurnal('${role.id_role}')" class="btn btn-ghost-danger">Hapus</button>
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