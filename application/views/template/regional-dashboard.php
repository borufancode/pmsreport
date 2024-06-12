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
								$dbb = $this->load->database('default', true);
								$dbcity = $this->load->database('db2', true);
								$dbcl1 = $this->load->database('db3', true);
								$dbcl2 = $this->load->database('db4', true);
								$dbcl3 = $this->load->database('db5', true);
								$dbcl5 = $this->load->database('db6', true);
								$dbcl6 = $this->load->database('db7', true);

								// bureau vehicle count start here....

								$dbb->select('asset_id,count(office_assets.id)as vhecntbureau');
								$dbb->from('office_assets');
								$dbb->join('asset', 'asset.id = office_assets.asset_id');
								$dbb->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbb->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbb->where('asset_group.id', 56);
								$queryvbureau = $dbb->get()->row();
								$bureauVehicleCount = $queryvbureau->vhecntbureau;

								// city vehicle count start here.......
								$dbcity->select('asset_id,count(office_assets.id)as vhecntcity');
								$dbcity->from('office_assets');
								$dbcity->join('asset', 'asset.id = office_assets.asset_id');
								$dbcity->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcity->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcity->where('asset_group.id', 56);
								$queryvcity = $dbcity->get()->row();
								$cityVehicleCount = $queryvcity->vhecntcity;

								// Cluster 1 vehicle count start here.......
								$dbcl1->select('asset_id,count(office_assets.id)as vhecntcluster1');
								$dbcl1->from('office_assets');
								$dbcl1->join('asset', 'asset.id = office_assets.asset_id');
								$dbcl1->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcl1->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcl1->where('asset_group.id', 56);
								$queryvcluster1 = $dbcl1->get()->row();
								$cluster1VehicleCount = $queryvcluster1->vhecntcluster1;

								// Cluster 2 vehicle count start here.......
								$dbcl2->select('asset_id,count(office_assets.id)as vhecntcluster2');
								$dbcl2->from('office_assets');
								$dbcl2->join('asset', 'asset.id = office_assets.asset_id');
								$dbcl2->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcl2->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcl2->where('asset_group.id', 56);
								$queryvcluster2 = $dbcl2->get()->row();
								$cluster2VehicleCount = $queryvcluster2->vhecntcluster2;

								// Cluster 3 vehicle count start here.......
								$dbcl3->select('asset_id,count(office_assets.id)as vhecntcluster3');
								$dbcl3->from('office_assets');
								$dbcl3->join('asset', 'asset.id = office_assets.asset_id');
								$dbcl3->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcl3->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcl3->where('asset_group.id', 56);
								$queryvcluster3 = $dbcl3->get()->row();
								$cluster3VehicleCount = $queryvcluster3->vhecntcluster3;

								// Cluster 5 vehicle count start here.......
								$dbcl5->select('asset_id,count(office_assets.id)as vhecntcluster5');
								$dbcl5->from('office_assets');
								$dbcl5->join('asset', 'asset.id = office_assets.asset_id');
								$dbcl5->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcl5->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcl5->where('asset_group.id', 56);
								$queryvcluster5 = $dbcl5->get()->row();
								$cluster5VehicleCount = $queryvcluster5->vhecntcluster5;

								// Cluster 6 vehicle count start here.......
								$dbcl6->select('asset_id,count(office_assets.id)as vhecntcluster6');
								$dbcl6->from('office_assets');
								$dbcl6->join('asset', 'asset.id = office_assets.asset_id');
								$dbcl6->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcl6->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcl6->where('asset_group.id', 56);
								$queryvcluster6 = $dbcl6->get()->row();
								$cluster6VehicleCount = $queryvcluster6->vhecntcluster6;

								$totalVehicle = $bureauVehicleCount + $cityVehicleCount +
									$cluster1VehicleCount + $cluster2VehicleCount + $cluster3VehicleCount +
									$cluster5VehicleCount + $cluster6VehicleCount;
								echo $totalVehicle;

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

								//								bureau Office Ofice Equiepment Count

								$dbb->select('asset_id,count(office_assets.id)as bereauofficeEqu');
								$dbb->from('office_assets');
								$dbb->join('asset', 'asset.id = office_assets.asset_id');
								$dbb->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbb->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbb->where('asset_group.id', 54);
								$bereauqueryv = $dbb->get()->row();
								$officeEquipmentBureau = $bereauqueryv->bereauofficeEqu;

								// city office equipment count
								$dbcity->select('asset_id,count(office_assets.id)as cityofficeEqu');
								$dbcity->from('office_assets');
								$dbcity->join('asset', 'asset.id = office_assets.asset_id');
								$dbcity->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcity->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcity->where('asset_group.id', 54);
								$cityqueryofficeEquip = $dbcity->get()->row();
								$officeEquipmentCity = $cityqueryofficeEquip->cityofficeEqu;

								// cluster 1 office equipment count
								$dbcl1->select('asset_id,count(office_assets.id)as cl1officeEqu');
								$dbcl1->from('office_assets');
								$dbcl1->join('asset', 'asset.id = office_assets.asset_id');
								$dbcl1->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcl1->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcl1->where('asset_group.id', 54);
								$cl1queryofficeEquip = $dbcl1->get()->row();
								$officeEquipmentCl1 = $cl1queryofficeEquip->cl1officeEqu;

								// cluster 2 office equipment count
								$dbcl2->select('asset_id,count(office_assets.id)as cl2officeEqu');
								$dbcl2->from('office_assets');
								$dbcl2->join('asset', 'asset.id = office_assets.asset_id');
								$dbcl2->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcl2->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcl2->where('asset_group.id', 54);
								$cl2queryOfficeEquip = $dbcl2->get()->row();
								$officeEquipmentCl2 = $cl2queryOfficeEquip->cl2officeEqu;

								// cluster 3 office equipment count
								$dbcl3->select('asset_id,count(office_assets.id)as cl3officeEqu');
								$dbcl3->from('office_assets');
								$dbcl3->join('asset', 'asset.id = office_assets.asset_id');
								$dbcl3->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcl3->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcl3->where('asset_group.id', 54);
								$cl3queryOfficeEquip = $dbcl3->get()->row();
								$officeEquipmentCl3 = $cl3queryOfficeEquip->cl3officeEqu;

								// cluster 5 office equipment count
								$dbcl5->select('asset_id,count(office_assets.id)as cl5officeEqu');
								$dbcl5->from('office_assets');
								$dbcl5->join('asset', 'asset.id = office_assets.asset_id');
								$dbcl5->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcl5->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcl5->where('asset_group.id', 54);
								$cl5queryOfficeEquip = $dbcl5->get()->row();
								$officeEquipmentCl5 = $cl5queryOfficeEquip->cl5officeEqu;

								// cluster 6 office equipment count
								$dbcl6->select('asset_id,count(office_assets.id)as cl6officeEqu');
								$dbcl6->from('office_assets');
								$dbcl6->join('asset', 'asset.id = office_assets.asset_id');
								$dbcl6->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcl6->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcl6->where('asset_group.id', 54);
								$cl6queryOfficeEquip = $dbcl6->get()->row();
								$officeEquipmentCl6 = $cl6queryOfficeEquip->cl6officeEqu;

								$totalOfficeEquipments = $officeEquipmentBureau + $officeEquipmentBureau
									+ $officeEquipmentCl1 + $officeEquipmentCl2 + $officeEquipmentCl3
									+ $officeEquipmentCl5 + $officeEquipmentCl6;
								echo $totalOfficeEquipments;
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
								// Office Assets in Stock count
								$dbb->select('asset_id,count(office_assets.id)as assetInstockBureau');
								$dbb->from('office_assets');
								$dbb->join('asset', 'asset.id = office_assets.asset_id');
								$dbb->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbb->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbb->where('office_assets.status', 'instock');
								$queryvbureauInstock = $dbb->get()->row();
								$totalCountInstockAssetBureau = $queryvbureauInstock->assetInstockBureau;

								// City Assets in Stock count
								$dbcity->select('asset_id,count(office_assets.id)as assetInstockCity');
								$dbcity->from('office_assets');
								$dbcity->join('asset', 'asset.id = office_assets.asset_id');
								$dbcity->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcity->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcity->where('office_assets.status', 'instock');
								$queryvcityInstock = $dbcity->get()->row();
								$totalCountInstockAssetCity = $queryvcityInstock->assetInstockCity;

								// cluster 1 Assets in Stock count
								$dbcl1->select('asset_id,count(office_assets.id)as assetInstockcl1');
								$dbcl1->from('office_assets');
								$dbcl1->join('asset', 'asset.id = office_assets.asset_id');
								$dbcl1->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcity->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcl1->where('office_assets.status', 'instock');
								$queryvcl1Instock = $dbcl1->get()->row();
								$totalCountInstockAssetC1 = $queryvcl1Instock->assetInstockcl1;

								// cluster 2 Assets in Stock count
								$dbcl2->select('asset_id,count(office_assets.id)as assetInstockcl2');
								$dbcl2->from('office_assets');
								$dbcl2->join('asset', 'asset.id = office_assets.asset_id');
								$dbcl2->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcl2->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcl2->where('office_assets.status', 'instock');
								$queryvcl2Instock = $dbcl2->get()->row();
								$totalCountInstockAssetC2 = $queryvcl2Instock->assetInstockcl2;

								// cluster 3 Assets in Stock count
								$dbcl3->select('asset_id,count(office_assets.id)as assetInstockcl3');
								$dbcl3->from('office_assets');
								$dbcl3->join('asset', 'asset.id = office_assets.asset_id');
								$dbcl3->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcl3->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcl3->where('office_assets.status', 'instock');
								$queryvcl3Instock = $dbcl3->get()->row();
								$totalCountInstockAssetC3 = $queryvcl3Instock->assetInstockcl3;

								// cluster 5 Assets in Stock count
								$dbcl5->select('asset_id,count(office_assets.id)as assetInstockcl5');
								$dbcl5->from('office_assets');
								$dbcl5->join('asset', 'asset.id = office_assets.asset_id');
								$dbcl5->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcl5->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcl5->where('office_assets.status', 'instock');
								$queryvcl5Instock = $dbcl5->get()->row();
								$totalCountInstockAssetCl5 = $queryvcl5Instock->assetInstockcl5;

								// cluster 6 Assets in Stock count
								$dbcl6->select('asset_id,count(office_assets.id)as assetInstockcl6');
								$dbcl6->from('office_assets');
								$dbcl6->join('asset', 'asset.id = office_assets.asset_id');
								$dbcl6->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcl6->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcl6->where('office_assets.status', 'instock');
								$queryvcl6Instock = $dbcl6->get()->row();
								$totalCountInstockAssetCl6 = $queryvcl6Instock->assetInstockcl6;
								echo $totalCountInstockAssetCity + $totalCountInstockAssetBureau + $totalCountInstockAssetC1
									+ $totalCountInstockAssetC2 + $totalCountInstockAssetC3 + $totalCountInstockAssetCl5
									+ $totalCountInstockAssetCl6;
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
								$assetGroupArray =
									array('4521', '4522', '4523', '4524', '4525', '4526', '4527', '4528', '4529',
										'4530', '4531', '4532');

								// Total Fixed assets of Bureua
								$dbb->select('asset_id,count(office_assets.asset_id)as assetOutstockBureau');
								$dbb->from('office_assets');
								$dbb->join('asset', 'asset.id = office_assets.asset_id');
								$dbb->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbb->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbb->where_in('asset_group.code', $assetGroupArray);
								$dbb->where('office_assets.status', 'outstock');
								$queryvofficeassetbureau = $dbb->get()->row();
								$totalBureauFixedAsset = $queryvofficeassetbureau->assetOutstockBureau;

								// Total Fixed assets of City
								$dbcct = $this->load->database('db2', true);

								$dbcct->select('asset_id,count(office_assets.asset_id)as assetOutstockCity');
								$dbcct->from('office_assets');
								$dbcct->join('asset', 'asset.id = office_assets.asset_id');
								$dbcct->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcct->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcct->where_in('asset_group.code', $assetGroupArray);
								$dbcct->where('office_assets.status', 'outstock');
								$queryvofficeassetcity = $dbcct->get()->row();
								$totalCityFixedAsset = $queryvofficeassetcity->assetOutstockCity;

								//								total office asset for cluster 1
								$dbcl1->select('asset_id,count(office_assets.asset_id)as assetOutstockCluster1');
								$dbcl1->from('office_assets');
								$dbcl1->join('asset', 'asset.id = office_assets.asset_id');
								$dbcl1->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcl1->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcl1->where_in('asset_group.code', $assetGroupArray);
								$dbcl1->where('office_assets.status', 'outstock');
								$queryvofficeassetcl1 = $dbcl1->get()->row();
								$totalCluster1FixedAsset = $queryvofficeassetcl1->assetOutstockCluster1;


								//total office asset for cluster 2
								$dbcl2->select('asset_id,count(office_assets.asset_id)as assetOutstockCluster2');
								$dbcl2->from('office_assets');
								$dbcl2->join('asset', 'asset.id = office_assets.asset_id');
								$dbcl2->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcl2->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcl2->where_in('asset_group.code', $assetGroupArray);
								$dbcl2->where('office_assets.status', 'outstock');
								$queryvofficeassetcl2 = $dbcl2->get()->row();
								$totalCluster2FixedAsset = $queryvofficeassetcl2->assetOutstockCluster2;

								//total office asset for cluster 3
								$dbcl3->select('asset_id,count(office_assets.asset_id)as assetOutstockCluster3');
								$dbcl3->from('office_assets');
								$dbcl3->join('asset', 'asset.id = office_assets.asset_id');
								$dbcl3->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcl3->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcl3->where_in('asset_group.code', $assetGroupArray);
								$dbcl3->where('office_assets.status', 'outstock');
								$queryvofficeassetcl3 = $dbcl3->get()->row();
								$totalCluster3FixedAsset = $queryvofficeassetcl3->assetOutstockCluster3;

								//total office asset for cluster 5
								$dbcl5->select('asset_id,count(office_assets.asset_id)as assetOutstockCluster5');
								$dbcl5->from('office_assets');
								$dbcl5->join('asset', 'asset.id = office_assets.asset_id');
								$dbcl5->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcl5->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcl5->where_in('asset_group.code', $assetGroupArray);
								$dbcl5->where('office_assets.status', 'outstock');
								$queryvofficeassetcl5 = $dbcl5->get()->row();
								$totalCluster5FixedAsset = $queryvofficeassetcl5->assetOutstockCluster5;


								//total office asset for cluster 6
								$dbcl6->select('asset_id,count(office_assets.asset_id)as assetOutstockCluster6');
								$dbcl6->from('office_assets');
								$dbcl6->join('asset', 'asset.id = office_assets.asset_id');
								$dbcl6->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
								$dbcl6->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
								$dbcl6->where_in('asset_group.code', $assetGroupArray);
								$dbcl6->where('office_assets.status', 'outstock');
								$queryvofficeassetcl6 = $dbcl6->get()->row();
								$totalCluster6FixedAsset = $queryvofficeassetcl6->assetOutstockCluster6;

								echo $totalBureauFixedAsset + $totalCluster1FixedAsset + $totalCluster2FixedAsset
									+ $totalCluster3FixedAsset + $totalCluster5FixedAsset + $totalCluster6FixedAsset + $totalCityFixedAsset;

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
							$id = $this->uri->segment('3');
							//							echo $id .'iiiiiiiiiiiiiiiiiiiiiiiiii';
							// Cluster sadarkaa naannoo irraa jiru// pmsbereau_db
							$dbb->select('*,
								asset.name as assetname,
								count(office_assets.asset_id) as assetcount,
								');
							$dbb->from('office_assets');
							$dbb->join('asset', 'asset.id = office_assets.asset_id');
							$dbb->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
							$dbb->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
							//							$this->db->join('asset_transaction', 'asset_transaction.asset_id = office_assets.asset_id');
							$dbb->where('asset_group.id = 56');
							$dbb->group_by('office_assets.asset_id');
							$dbb->order_by('assetcount', 'desc');
							$queryVehicleSummary = $dbb->get()->result();

							// total count = 914

							// Cluster sadarkaa BM/city administration irraa jiru// pmscity
							$dbcct->select('*,
								asset.name as assetname,
								count(office_assets.asset_id) as assetcount,
								');
							$dbcct->from('office_assets');
							$dbcct->join('asset', 'asset.id = office_assets.asset_id');
							$dbcct->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
							$dbcct->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
							//							$this->db->join('asset_transaction', 'asset_transaction.asset_id = office_assets.asset_id');
							$dbcct->where('asset_group.id = 56');
							$dbcct->group_by('office_assets.asset_id');
							$dbcct->order_by('assetcount', 'desc');
							$queryVehicleCitySummary = $dbcct->get()->result();

							// total count = 59;


							// Cluster sadarkaa cluster 1/CLuster 1 administration irraa jiru// pmscluster1
							$dbcl1->select('*,
								asset.name as assetname,
								count(office_assets.asset_id) as assetcount,
								');
							$dbcl1->from('office_assets');
							$dbcl1->join('asset', 'asset.id = office_assets.asset_id');
							$dbcl1->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
							$dbcl1->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
							//							$this->db->join('asset_transaction', 'asset_transaction.asset_id = office_assets.asset_id');
							$dbcl1->where('asset_group.id = 56');
							$dbcl1->group_by('office_assets.asset_id');
							$dbcl1->order_by('assetcount', 'desc');
							$queryVehicleCluster1Summary = $dbcl1->get()->result();

							// total count = 59;

							// Cluster sadarkaa cluster 2/CLuster 2 administration irraa jiru// pmscluster2
							$dbcl2->select('*,
								asset.name as assetname,
								count(office_assets.asset_id) as assetcount,
								');
							$dbcl2->from('office_assets');
							$dbcl2->join('asset', 'asset.id = office_assets.asset_id');
							$dbcl2->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
							$dbcl2->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
							//							$this->db->join('asset_transaction', 'asset_transaction.asset_id = office_assets.asset_id');
							$dbcl2->where('asset_group.id = 56');
							$dbcl2->where('asset_group.id = 56');
							$dbcl2->group_by('office_assets.asset_id');
							$dbcl2->order_by('assetcount', 'desc');
							$queryVehicleCluster2Summary = $dbcl2->get()->result();

							// total count = 1,583;

							// Cluster sadarkaa cluster 3/CLuster 3 administration irraa jiru// pmscluster3
							$dbcl3->select('*,
								asset.name as assetname,
								count(office_assets.asset_id) as assetcount,
								');
							$dbcl3->from('office_assets');
							$dbcl3->join('asset', 'asset.id = office_assets.asset_id');
							$dbcl3->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
							$dbcl3->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
							//							$this->db->join('asset_transaction', 'asset_transaction.asset_id = office_assets.asset_id');
							$dbcl3->where('asset_group.id = 56');
							$dbcl3->group_by('office_assets.asset_id');
							$dbcl3->order_by('assetcount', 'desc');
							$queryVehicleCluster3Summary = $dbcl3->get()->result();

							// total count = 338;

							// Cluster sadarkaa cluster 4/CLuster 4 administration irraa jiru// pmscluster5
							$dbcl5->select('*,
								asset.name as assetname,
								count(office_assets.asset_id) as assetcount,
								');
							$dbcl5->from('office_assets');
							$dbcl5->join('asset', 'asset.id = office_assets.asset_id');
							$dbcl5->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
							$dbcl5->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
							//							$this->db->join('asset_transaction', 'asset_transaction.asset_id = office_assets.asset_id');
							$dbcl5->where('asset_group.id = 56');
							$dbcl5->group_by('office_assets.asset_id');
							$dbcl5->order_by('assetcount', 'desc');
							$queryVehicleCluster5Summary = $dbcl5->get()->result();

							// total count = 119;


							// Cluster sadarkaa cluster 6/CLuster 6 administration irraa jiru// pmscluster6
							$dbcl6->select('
								asset.name as assetname,
								count(office_assets.asset_id) as assetcount,
								');
							$dbcl6->from('office_assets');
							$dbcl6->join('asset', 'asset.id = office_assets.asset_id');
							$dbcl6->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
							$dbcl6->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
							//							$this->db->join('asset_transaction', 'asset_transaction.asset_id = office_assets.asset_id');
							$dbcl6->where('asset_group.id = 56');
							$dbcl6->group_by('office_assets.asset_id');
							$dbcl6->order_by('assetcount', 'desc');
							$queryVehicleCluster6Summary = $dbcl6->get()->result();
							// total count = 163;
							$newArray = array_merge($queryVehicleSummary, $queryVehicleCitySummary, $queryVehicleCluster2Summary, $queryVehicleCluster5Summary, $queryVehicleCluster6Summary, $queryVehicleCluster1Summary, $queryVehicleCluster3Summary);

							$id = 0;
							$sum = 0;


							// Merged array
							$mergedArray = array();

							// Combine arrays
							foreach (array($queryVehicleSummary, $queryVehicleCitySummary, $queryVehicleCluster2Summary,
										 $queryVehicleCluster5Summary,
										 $queryVehicleCluster6Summary, $queryVehicleCluster1Summary,
										 $queryVehicleCluster3Summary) as $arr) {
								foreach ($arr as $key => $value) {
									$mergedArray["item-$id"] = $value;
//									var_dump($value);


									$id++;
								}
							}

							foreach ($mergedArray as $vhsumary):
								$id++;

								$sum = $sum + $vhsumary->assetcount;
								?>
								<?php if ($vhsumary->assetcount > 2) { ?>
								<tr>
									<td><?php echo $id; ?></td>
									<td><?php echo $vhsumary->assetname ?></td>
									<td><?php echo $vhsumary->assetcount; ?></td>
								</tr>

							<?php } endforeach; ?>
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
				</div>


			</div>
			<div class="row">

				<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

				<?php

				$dbb->select('*,asset.name as assetname,
								count(office_assets.asset_id)
								 as assetcount,
								');
				$dbb->from('office_assets');
				$dbb->join('asset', 'asset.id = office_assets.asset_id');
				$dbb->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
				$dbb->join('asset_group', 'asset_group.id = asset_sub_group.asset_group_id');
				//							$this->db->join('asset_transaction', 'asset_transaction.office_id = office_assets.office_id');
				$dbb->where('asset_group.id = 56');
				$dbb->group_by('office_assets.asset_id');
				//				$this->db->where('office_assets.office_id',$officeID);
				$dbb->order_by('assetcount', 'desc');
				$dbb->limit(5);
				$querycharp = $dbb->get()->result();
				?>
				<script>
					new Chart(document.getElementById("pie-chart"), {
						type: 'pie',
						data: {
							labels: [<?php foreach ($querycharp as $item) {
								$result_str[] = '"' . $item->assetname . '"';
							}
								echo implode(",", $result_str);
								?>],
							datasets: [{
								label: "TOTAL",
								backgroundColor: [<?php for ($i = 0; $i <= count($querycharp); $i++) { ?>"#<?php echo str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);?>", <?php } ?>],
								data: [<?php foreach ($querycharp as $items) {
									$result_strs[] = $items->assetcount;
								}
									echo implode(",", $result_strs);
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
