<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand navbar-primary navbar-dark"
		 style="background-color: #b2bbc3; color: red !important;">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
			</li>
			<li>
				<a class="nav-link text-primary" href="#" role="button">
					<large><b style="font-size: 25px; font-family: 'Roboto', sans-serif">PMS Reporting System</b>
					</large>
				</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" data-widget="fullscreen" href="#" role="button">
					<i class="fas fa-expand-arrows-alt"></i>
				</a>
			</li>
		</ul>
	</nav>
	<!-- /.navbar -->
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
			<div class="toast-body text-white">
			</div>
		</div>
		<div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<hr>
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">Dashboard</h1>

					</div><!-- /.col -->

				</div><!-- /.row -->
				<hr class="border-primary">
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-lg-3 col-6">
					<div class="small-box bg-info">
						<div class="inner">
							<p style="font-size: 43px !important;	 font-family: Serif !important; color: black;">
								<?php
								$this->db->select('asset_id,count(office_assets.id)as vhecnt');
								$this->db->from('office_assets');
								$this->db->join('asset', 'asset.id = office_assets.asset_id');
								$this->db->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$this->db->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$this->db->where('asset_group.id', 56);
								$queryv = $this->db->get()->row();
								echo $queryv->vhecnt;
								?>
							</p>
							<p style="font-size: 23px;font-family: Serif">Total Vehicles</p>
						</div>
						<div class="icon">
							<i class="fa fa-car"></i>
						</div>
						<a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="small-box bg-success">
						<div class="inner">
							<p style="font-size: 43px !important;	 font-family: Serif !important; color: red;">
								<?php
								$this->db->select('asset_id,count(office_assets.id)as officeEqu');
								$this->db->from('office_assets');
								$this->db->join('asset', 'asset.id = office_assets.asset_id');
								$this->db->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$this->db->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$this->db->where('asset_group.id', 54);
								$queryv = $this->db->get()->row();
								echo $queryv->officeEqu;
								?>
							</p>
							<p style="font-size: 23px;font-family: Serif">Total Office Equipment</p>
						</div>
						<div class="icon">
							<i class="fas fa-chair ion-stats-bars"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="small-box bg-warning">
						<div class="inner">
							<p style="font-size: 43px !important;	 font-family: Serif !important; color: black;">

								<?php
								$this->db->select('asset_id,count(office_assets.id)as assetInstock');
								$this->db->from('office_assets');
								$this->db->join('asset', 'asset.id = office_assets.asset_id');
								$this->db->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$this->db->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$this->db->where('office_assets.status', 'instock');
								$queryv = $this->db->get()->row();
								echo $queryv->assetInstock;
								?>
							</p>
							<p style="font-size: 23px;font-family: Serif;color: black;">Total Stock In Asset</p>
						</div>
						<div class="icon">
							<i class="fas fa-store-alt fa-2x"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="small-box bg-danger">
						<div class="inner">
							<p style="font-size: 43px !important; font-family: Serif !important; color: white;">
								<?php
								$this->db->select('asset_id,count(office_assets.asset_id)as assetOutstock');
								$this->db->from('office_assets');
								$this->db->join('asset', 'asset.id = office_assets.asset_id');
								$this->db->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$this->db->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$this->db->where('
								asset_group.code = 4521
								 or asset_group.code =4522 
								 or asset_group.code =4523
								 or asset_group.code = 4524 
								 or asset_group.code = 4525
								 or asset_group.code = 4526
								 or asset_group.code = 4527 
								 or asset_group.code =4528 
								 or asset_group.code = 4529
								 or asset_group.code=4530 
								 or asset_group.code= 4531 
								 or asset_group.code= 4532
								');
								$this->db->where('office_assets.status', 'outstock');

								$queryv = $this->db->get()->row();
								echo $queryv->assetOutstock;
								?>
							</p>
							<p style="font-size: 23px;font-family: Serif">Total Fixed Asset</p>
						</div>
						<div class="icon">
							<i class="fas fa-desktop"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col col-md-6">
					<div class="card">
						<div class="card-header bg-indigo">

							<h3>Vehicle Summary Report</h3>
						</div>
						<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th>No</th>
								<th>Vehicle Name</th>
								<th>Amount</th>
							</tr>
							</thead>
							<tbody class="table-group-divider">
							<?php
							$this->db->select('*,
								asset.name as assetname,
								count(office_assets.asset_id) as assetcount,
								');

							$this->db->from('office_assets');

							$this->db->join('asset', 'asset.id = office_assets.asset_id');
							$this->db->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
							$this->db->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
//							$this->db->join('asset_transaction', 'asset_transaction.asset_id = office_assets.asset_id');
							$this->db->where('asset_group.id = 56');
							$this->db->group_by('office_assets.asset_id');
							$this->db->order_by('assetcount', 'desc');
							$queryVehicleSummary = $this->db->get()->result();
							$id = 0;
							$sum = 0;
							foreach ($queryVehicleSummary as $vhsumary):
								$id++;

									$sum = $sum + $vhsumary->assetcount;
									?>
									<tr>
										<td><?php echo $id; ?></td>
										<td><?php echo $vhsumary->assetname ?></td>
										<td><?php echo $vhsumary->assetcount; ?></td>
									</tr>
								<?php  endforeach; ?>
							<tr>
								<td colspan="3" class="text-right">Total</td>
								<td><?php echo number_format($sum, '0', '.', ','); ?></td>
							</tr>
							</tbody>

						</table>
					</div>
				</div>
				<div class="col col-md-6" style="background-color: aliceblue;">
					<div class="card">
						<div class="card-header bg-info">
							<h3>Oromia PMS Report By Chart</h3>
						</div>
						<div class="card-body">
							<canvas id="pie-chart" width="300" height="auto"></canvas>
							<hr>
							<canvas id="bar-chart" width="400" height="auto"></canvas>
						</div>
					</div>
					<div class="col col-md-12">
						<div class="card">
							<div class="card-header bg-info">
								<h3>Top Ten Office Have Many Asset</h3>
							</div>
							<table class="table table-striped table-bordered">
								<thead>
								<tr>
									<th>No</th>
									<th>Office/Bureau</th>
									<th>Asset Type</th>
									<th>Amount</th>
								</tr>
								</thead>
								<tbody class="table-group-divider">
								<?php
								$this->db->select('*,
							count(office_assets.asset_id) as assetcount,
							office.name as officename,
							asset_group.name as assettypename,
							asset_group.code as assetcode,
						
							');
								$this->db->from('office_assets');
								$this->db->join('asset', 'asset.id = office_assets.asset_id');
								$this->db->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$this->db->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$this->db->join('office', 'office_assets.office_id= office.id');
//								$this->db->where('asset_group.asset_type_id = 1');
								$this->db->where('asset_group.id = 56');
								$this->db->group_by('office_assets.office_id');
								$this->db->order_by('assetcount', 'desc');
								$this->db->limit(10);
								$queryOfficeAsset = $this->db->get()->result();

								$id = 0;
								foreach ($queryOfficeAsset as $ofasset):
									$id++;
									?>

									<tr>
										<td><?php echo $id; ?></td>
										<td><?php echo $ofasset->officename ?></td>
										<td><?php echo $ofasset->assettypename . '[' . $ofasset->assetcode . ']'; ?></td>
										<td><?php echo $ofasset->assetcount; ?></td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>


			</div>
			<div class="row">

				<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

				<?php
				$this->db->select('*,
								asset.name as assetname,
								count(office_assets.asset_id) as assetcount,
								');
				$this->db->from('office_assets');
				$this->db->join('asset', 'asset.id = office_assets.asset_id');
				$this->db->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
				$this->db->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
				//							$this->db->join('asset_transaction', 'asset_transaction.office_id = office_assets.office_id');
				$this->db->where('asset_group.id = 56');
				$this->db->group_by('office_assets.asset_id');
//				$this->db->where('office_assets.office_id',$officeID);
				$this->db->order_by('assetcount', 'desc');
				$this->db->limit(5);
				$querycharp = $this->db->get()->result();
				?>
				<script>
					new Chart(document.getElementById("pie-chart"), {
						type: 'pie',
						data: {
							labels: [<?php foreach ($querycharp as $item) {
								$result_str[] = '"'. $item->assetname.'"';
							}
								echo  implode(",",$result_str);
								?>],
							datasets: [{
								label: "TOTAL",
								backgroundColor: [<?php for ($i=0; $i <= count($querycharp); $i++) { ?>"#<?php echo str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);?>", <?php } ?>],
								data: [<?php foreach ($querycharp as $items){
									$result_strs[] = $items->assetcount;
								}
									echo implode(",",$result_strs);
									?>]
							}]
						},
						options: {
							title: {
								display: true,
								text: 'OROMIA VEHICLES REPORT BY PIE CHART'
							}
						}
					});
				</script>


				<?php
				$this->db->select('*,
					count(office_assets.asset_id) as assetvehiclecount
					');
				$this->db->from('office_assets');
				$this->db->join('asset', 'asset.id=office_assets.asset_id');
				$this->db->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
				$this->db->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
				//					$this->db->join('asset_transaction','asset_transaction.asset_id = office_assets.asset_id');
				$this->db->where('asset_group.id = 56');
				$this->db->where('office_assets.status', 'outstock');
				$queryVehicle = $this->db->get()->row();

				//Office Equipment
				$this->db->select('*,
					count(office_assets.asset_id) as officeEqCount
					');
				$this->db->from('office_assets');
				$this->db->join('asset', 'asset.id=office_assets.asset_id');
				$this->db->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
				$this->db->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
				//					$this->db->join('asset_transaction','asset_transaction.asset_id = office_assets.asset_id');
				$this->db->where('asset_group.id = 54');
				$officeEquipQuery = $this->db->get()->row();

				// Asset in Stock

				$this->db->select('*,
					count(office_assets.asset_id) as assetInstock
					');
				$this->db->from('office_assets');
				$this->db->join('asset', 'asset.id=office_assets.asset_id');
				$this->db->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
				$this->db->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
				//					$this->db->join('asset_transaction','asset_transaction.asset_id = office_assets.asset_id');
				$this->db->where('office_assets.status', 'instock');
				$InstockAssetQuery = $this->db->get()->row();


				?>


				<script>
					new Chart(document.getElementById("bar-chart"), {
						type: 'bar',
						data: {
							labels: ["Vehicles and Transportation", "Office Equipment", "Asset In Stock"],
							datasets: [
								{
									label: "TOTAL: ",
									backgroundColor: ["#B7DBC9", "#108508", "#4F2F33"],
									data: [<?php echo $queryVehicle->assetvehiclecount?>,<?php echo $officeEquipQuery->officeEqCount;?>,<?php echo $InstockAssetQuery->assetInstock;?>]
								}
							]
						},
						options: {
							legend: {display: false},
							title: {
								display: true,
								text: 'PMS REPORT BY BAR CHART'
							}
						}
					});
				</script>
			</div>


		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
