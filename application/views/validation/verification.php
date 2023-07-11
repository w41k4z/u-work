<div class="main-panel">
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Code et validation</h4>
						<p class="card-description">
							Validation de <code>code</code>
						</p>
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Utilisateur</th>
										<th>Code</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php for ($i = 0; $i < count($pending_validations); $i++) { ?>
										<tr>
											<td><?= $pending_validations[$i]->user->name ?></td>
											<td><?= $pending_validations[$i]->code ?></td>
											<td class="d-flex justify-content-end">
												<a class="badge badge-warning text-white" href="<?= base_url('index.php/CodeController/validation/' . $pending_validations[$i]->id) ?>">Valider</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>