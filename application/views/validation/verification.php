<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="<?php echo base_url("assets/vendors/typicons.font/font/typicons.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/vendors/css/vendor.bundle.base.css")?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/css/vertical-layout-light/style.css")?>">
	<title>Verification du code</title>
</head>
<body>
	<div class="container-scroller">
		<div class="main-panel">
			<div class="content-wrapper">
				<div class="row">
					<div class="col-lg-6 grid-margin stretch-card">
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
											<th>Validation</th>
											</tr>
										</thead>
										<tbody>
											<tr>
											<td>Jacob</td>
											<td class="form-group">
												<select class="form-control">
												<option>214451001</option>
												<option>447502021</option>
												<option>787753601</option>
												</select>
											</td>
											<td><label class="badge badge-danger"><a href="#">Valider</a></label></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>