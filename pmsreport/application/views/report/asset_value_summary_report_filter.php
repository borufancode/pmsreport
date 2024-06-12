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
					<div class="col-sm-6">
						<h1 class="m-0">Asset Value summery Report </h1>
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
							<center>
								<h3> Biiroo Maallaqa Oromiyaa /
									Oromia Finance Bureau<br>
									Asset Value summery Report
								</h3>
							</center>

						</div>
						<div class="col col-12">
							<div class="card-body">
								<?php
								$offciceID = $this->uri->segment(2);
								$queryOfficeName = $this->db->select('*')
										->from('office_assets')
										->where('office_assets.office_id', $offciceID)
										->join('office', 'office.id= office_assets.office_id')
										->get()->row();
								?>
								<form action="<?= base_url('all-asset-value-summary-report')?>" method="get">
									<label>Office</label>

									<input name="id" type="hidden" value="<?= $offciceID?>" readonly class="form-control">
									<input name="office" type="hidden" value="<?= $queryOfficeName->id?>" readonly class="form-control">
									<input name="office_name" type="text" value="<?= $queryOfficeName->name?>"  readonly class="form-control">
									<label>Year</label>
									<select required class="form-control" name="year">
										<option value="">--select year--</option>
										<?php foreach ($this->rm->getYears() as  $year){ ?>
												<option value="<?= $year->id?>"><?= $year->name?></option>
										<?php } ?>
									</select>

									<br>
									<button type="submit" class="btn btn-sm btn-success">Filter</button>
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
					$("#assetsubgroup_id").append('<option value=' + assetsubgroup_id.id + '>' + assetsubgroup_id.name + '['+assetsubgroup_id.code + ']'+'</option>' + '<option disabled> ---------------------------------------</option>');
				});
			});
		});
	});

</script>
