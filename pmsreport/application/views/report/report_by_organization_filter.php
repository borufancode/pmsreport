<div class="wrapper">
	<div class="content-wrapper" style="min-height: 169.4px;">
		<div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="toast-body text-white">
			</div>
		</div>
		<div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6 text-left">
						<?php
						$offciceID = $this->uri->segment(2);
						// echo $offciceID;
						// $offciceID = $this->input->get('id');

						?>
						<a class="btn btn-lg btn-primary" href="<?php echo base_url('dashboard/' . $offciceID) ?>"><i
								class="fa fa-backward"></i> Back Menu</a>
					</div>
					<div class="col-sm-6 text-right">
						<h1 class="m-0">Fixed Asset Count Sheet</h1>
					</div><!-- /.col -->
				</div><!-- /.row -->
				<hr class="border-primary">
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="col-lg-12">
					<div class="card card-outline card-success">
						<div class="card-header">
							<center style="font-family: Serif;">
								<img src="<?php echo base_url()?>assets/logo/logo.png"/>
								<h3> Biiroo Maallaqa Oromiyaa /
									Oromia Finance Bureau<br>
									Lakkaa’umsa Qabeenya Dhaabbii/<br>
									Fixed Asset count sheet(FACS)</h3>
							</center>

						</div>
						<div class="col col-12">
							<div class="card-body">
								<form action="<?= base_url('summary-report-by-organization') ?>" method="get">
									<div class="row">
										<div class="col col-md-12">
											<label style="font-size: 26px;">Structure</label>
											<select required name="structure" id="structure" class="form-control">
												<option value="">--select Structure----</option>
												<?php foreach ($organizations as $organization): ?>
													<option
														value="<?php echo $organization->id ?>"><?php echo $organization->name ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="col col-md-6">
											<label style="font-size: 20px;">Bureau/Office</label>
											<select required name="office_name" id="office" class="form-control">

											</select>
										</div>
										<div class="col col-md-6">
											<label style="font-size: 20px;">Year</label>
											<select required name="year" class="form-control">
												<option value="">--select year--</option>
												<?php foreach ($years as $year) { ?>
													<option
														value="<?php echo $year->id ?>"><?php echo $year->name; ?></option>
												<?php } ?>
											</select>
										</div>

										<div class="col col-md-6">
											<label style="font-size: 20px;">Asset Group</label>
											<select required name="asset_group" id="assetgroup_id" class="form-control">
												<option value="">--select Asset Group--</option>
												<?php foreach ($assetgroups as $assetgroup) { ?>
													<option
														value="<?php echo $assetgroup->id ?>"><?php echo $assetgroup->name; ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col col-md-6">
											<label style="font-size: 20px;">Asset Sub Group</label>
											<select name="asset_sub_group" id="assetsubgroup_id" class="form-control">

											</select>
										</div>
										<div class="col col-md-12">
											<hr>
											<button type="submit" class="btn btn-lg btn-success"><i class="fa fa-file">   </i>Generate Maine Report</button>
										</div>
									</div>

								</form>
							</div>
						</div>
					</div><!--/. container-fluid -->
		</section>
		<!-- /.content -->
	</div>
</div>
<!--<link href="--><?php //echo base_url() ?><!--assets/js/select2.min.css" rel="stylesheet" />-->
<!--<script src="--><?php //echo base_url() ?><!--assets/jd/select2.min.js"></script>-->
<!--<script src="--><?php //echo base_url() ?><!--assets/js/jquery.min.js"></script>-->
<script>
	$(document).ready(function () {
		$("#structure").change(function () {
			var structure = $("#structure").val();
			alert(structure);
			$.ajax({
				url: '<?php echo base_url(); ?>ReportDashboard/getOfficeStructure',
				method: 'post',
				'data': {structure: structure},
				'type': 'JSON'
			}).done(function (office) {
				console.log(office);
				office = JSON.parse(office);
				$("#office").empty();
				office.forEach(function (office) {
					$("#office").append('<option value=' + office.id + '>' + office.name + '</option>' + '<option disabled> ---------------------------------------</option>');
				});
			});
		});
	});

	$(document).ready(function () {
		$("#assetgroup_id").change(function () {
			var ag_id = $("#assetgroup_id").val();
			alert(ag_id);
			$.ajax({
				url: '<?php echo base_url(); ?>ReportDashboard/GetAssetSuGroups',
				method: 'post',
				'data': {ag_id: ag_id},
				'type': 'JSON'
			}).done(function (assetsubgroup_id) {
				console.log(assetsubgroup_id);
				assetsubgroup_id = JSON.parse(assetsubgroup_id);
				$("#assetsubgroup_id").empty();
				assetsubgroup_id.forEach(function (assetsubgroup_id) {
					$("#assetsubgroup_id").append('<option value=' + assetsubgroup_id.id + '>' + assetsubgroup_id.name + '[' + assetsubgroup_id.code + ']' + '</option>' + '<option disabled> ---------------------------------------</option>');
				});
			});
		});
	});
</script>
