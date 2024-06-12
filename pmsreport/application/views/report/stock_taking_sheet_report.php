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
						$offciceID = $this->input->get('id');

						?>
						<a class="btn btn-lg btn-primary"
						   href="<?php echo base_url('stock-taking-sheet-filter/' . $offciceID) ?>"><i
								class="fa fa-backward"></i> Back Menu</a>
					</div>
					<div class="col-sm-6 text-right">
						<h1 class="m-0">Stock Taking Report</h1>
					</div>

					<!-- /.col -->
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
								<img src="<?php echo base_url() ?>assets/logo/logo.png"/>
								<h2>
									Biiroo Maallaqa Oromiyaa /
									Oromia Finance Bureau /<br>
									Lakka’umsa Meeshaa<br>
									Stock count Sheet/
									Stock Taking Sheet (STS)
								</h2>
							</center>
							<div class="content" style="font-family: Serif;">
								<?php
								//      echo $offciceID;
								$office = $this->input->get('office_name');
								$year = $this->input->get('year');
								$store = $this->input->get('store');
								$assetgroup = $this->input->get('asset_group');
								$assetsubgroup = $this->input->get('asset_sub_group');
								//								echo $assetsubgroup;
								$queryOfficeName = $this->db->select('*')
									->from('office_assets')
									->where('office_assets.office_id', $offciceID)
									->join('office', 'office.id= office_assets.office_id')
									->get()->row();
								// Budget Years
								$queryOfficeYearName = $this->db->select('*')
									->from('office_assets')
									->where('office_assets.office_id', $offciceID)
									->join('year', 'year.id= office_assets.year_id')
									->get()->row();

								// AssetName
								$queryAssetName = $this->db->select('*')
									->from('office_assets')
									->where('office_assets.created_by_id', $offciceID)
									->join('asset', 'asset.id= office_assets.asset_id')
									->get()->row();

								// Asset Group Name

								$queryAssetGroup = $this->db->select('*')
									->from('office_assets')
									->where('office_assets.office_id', $offciceID)
									->join('asset', 'asset.id= office_assets.asset_id')
									->join('asset_sub_group', 'asset_sub_group.id= asset.asset_sub_group_id')
									->join('asset_group', 'asset_group.id= asset_sub_group.asset_group_id')
									->where('asset_group.id', $assetgroup)
									->get()->row();
								//Store Name
								$queryStoreName = $this->db->select('*')
									->from('office_assets')
									->where('office_assets.office_id', $offciceID)
									->join('asset_transaction', 'asset_transaction.id= office_assets.asset_transactions_id')
									->join('store', 'store.id= asset_transaction.store_id')
									->get()->row();
								//Asset Name
								$queryAssetSubGroup =
									$this->db->select('*')
										->from('office_assets')
										->where('office_assets.office_id', $offciceID)
										->join('asset', 'asset.id= office_assets.asset_id')
										->join('asset_sub_group', 'asset_sub_group.id= asset.asset_sub_group_id')
										->where('asset_sub_group.id', $assetsubgroup)
										->get()->row();
								?>
								<hr>
								<div style="font-family: Serif; font-size: 20px">
									<p> Maqaa Mana Hojii/Public body/Office : <u> <b><?= $office ?></b></u></p>
									<p>Bara Baajataa/Fiscal year: <u> <b><?= $queryOfficeYearName->name; ?></b></u></p>
									<p>Maqaa Istoorii/Store name/No. :<u><b><?php
											if ($queryStoreName ==
												"NULL") {
												echo '';
											} else {
												echo $queryStoreName->name;

											}
											?></b></u></p>
									<p>Ramaddii Ijoo/Asset Group Name (code):
										<u> <b><?php if ($queryAssetGroup == "") {
												"";
											} else {
												echo $queryAssetGroup->name . '/' . $queryAssetGroup->code;
											} ?></b></u></p>
									<p>Ramaddii Giduugaleessaa/ Asset sub-group Name (code):
										<u> <b><?php if ($queryAssetSubGroup == "") {
												echo "";
											} else {
												echo $queryAssetSubGroup->name . '/' . $queryAssetSubGroup->code;
												} ?></b></u>
									</p>
									<!--									Query Start Here-->
								</div>
								<?php
								$id = 0;
								$office = $this->input->get('office');
								$year = $this->input->get('year');
								$store = $this->input->get('store');
								$assetgroup = $this->input->get('asset_group');
								$assetCountson =
									$this->db->select('*,
											asset.name as assetname,
											asset_transaction.remarks as remark,
											sum(office_assets.total_stock_in) as total_stock_ins,
											sum(office_assets.total_stock_out) as total_stock_outs,
																					
											')
										->from('office_assets')
										->join('asset', 'asset.id=office_assets.asset_id')
										->join('asset_sub_group', 'asset_sub_group.id=asset.asset_sub_group_id', 'left')
										->join('asset_group', 'asset_group.id=asset_sub_group.asset_group_id', 'left')
										->join('asset_transaction', 'asset_transaction.id=office_assets.asset_transactions_id', 'left')
										->join('asset_status', 'asset_status.id=asset_transaction.asset_status_id')
//													->join('transaction_record', 'transaction_record.id=office_assets.asset_transactions_id')
//													->join('fos_user', 'fos_user.id=transaction_record.reciever_id')
//									->join('office as of','of.id = office_assets.office_id','left')
										->where('office_assets.office_id', $office)
										->where('office_assets.status', 'instock')
										->where('office_assets.year_id', $year)
										->where('asset_group.id', $assetgroup)
										->where('asset_sub_group.id', $assetsubgroup)
//													->limit(100)
										->order_by('assetname', 'desc')
										->get()->result();
								$assetsubgroup = $this->input->get('asset_sub_group');

								?>
								<!--									Query End Here-->
							</div>
						</div>
						<div class="col col-12">
							<div class="card-body">
								<table id="example" class="table table-striped table-bordered">
									<thead>
									<tr>
										<th>Lakk/No</th>
										<th>Maqaa Qabeenyaa
										</th>
										<th>Hanga galee
										</th>
										<th>Hanga Bahee
										</th>
										<th>Hanga hafee
										</th>
										<th>Asset status
										</th>

										<th>Yaada/Remark
										</th>
										</th>
									</tr>

									</thead>
									<tbody>
									<?php
									$sum = 0;
									foreach ($assetCountson
											 as $assetCount):
										$id++;
//										$sum = $sum + 1;
										$currentbalance = abs($assetCount->total_stock_ins) - abs($assetCount->total_stock_outs);
										?>
										<tr>
											<td><?php echo $id ?></td>
											<td><?php echo $assetCount->assetname ?></td>
											<td><?php echo abs($assetCount->total_stock_ins); ?></td>
											<td><?php echo abs($assetCount->total_stock_outs); ?></td>
											<td><?php echo $currentbalance ?></td>
											<td><?php echo $assetCount->name ?></td>

											<td><?php echo $assetCount->remark; ?></td>
										</tr>
									<?php endforeach; ?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
