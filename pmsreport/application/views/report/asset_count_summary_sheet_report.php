
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" type="text/css">
<link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" type="text/css">
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
						<a class="btn btn-lg btn-danger" href="<?php echo base_url('fixed-asset-count-summary-report-filter/'.$offciceID)?>"><i class="fa fa-backward"></i> Back Menu</a>
					</div>
					<div class="col-sm-6">

						<h1 class="m-0">Fixed Asset count sheet(FACS)</h1>
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
								<h2> Biiroo Maallaqa Oromiyaa<br>
									Oromia Finance Bureau <br>
									Fixed asset count summery Sheet</h2>
							</center>
							<div class="content">
								<!--								Office logic start  here     -->
								<?php
								$offciceID = $this->input->get('id');
								//								echo $offciceID;

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
										->where('office_assets.office_id', $offciceID)
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


								$queryAssetSubGroup =
										$this->db->select('*')
												->from('office_assets')
												->where('office_assets.office_id', $offciceID)
												->join('asset', 'asset.id= office_assets.asset_id')
												->join('asset_sub_group', 'asset_sub_group.id= asset.asset_sub_group_id')
												->where('asset_sub_group.id', $assetsubgroup)
												->get()->row();
								?>
								<p> Maqaa Mana Hojii/Public body/Office____<u><?= $office ?></u>__________</p>
								<p>Bara Baajataa/Fiscal year________<u><?= $queryOfficeYearName->name; ?></u>__________
								<p>Ramaddii Ijoo/Asset Group Name (code)
									__<u><?php if($queryAssetGroup== ''){ echo ''; }else { echo  $queryAssetGroup->name . '/' . $queryAssetGroup->code;  }?></u>______</p>
								<p>Ramaddii Giduugaleessaa/ Asset sub-group Name (code) _____
									<u><?php if($queryAssetSubGroup == ''){ echo ' ';} else { echo  $queryAssetSubGroup->name . '/' . $queryAssetSubGroup->code; } ?></u>__________
								</p>

								<!--								Office logic end here     -->
							</div>
						</div>
						<div class="col col-12">

							<div class="card-body">
								<table class="table tabe-hover table-bordered" id="example">
									<thead>
									<tr>
										<th rowspan="2">Lakk/No</th>
										<th rowspan="2">Maqaa Qabeenyaa<br>/Asset Specific Name
										</th>
										<th colspan="2">Qabeenya Galmee /Quantity
											Registered
										</th>

										<th rowspan="2">Quantity by Asset condition/status
										</th>
										<th rowspan="2">Remark</th>
									</tr>
									<tr>
										<th>Bayyina</th>
										<th>Gatii</th>


									</tr>
									</thead>
									<tbody>
									<?php
									$id = 0;
									$office = $this->input->get('office');
									$year = $this->input->get('year');
									$store = $this->input->get('store');
									$assetgroup = $this->input->get('asset_group');
									$assetCountson =
										$this->db->select('*,
											asset.name as assetname,
											asset_transaction.unit_cost as ucst,
											asset_transaction.remarks as remark,
											office_assets.stock_out_cost as soutc,
											sum(office_assets.total_stock_out) as totalstockin,
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
											->where('office_assets.year_id', $year)
											->where('asset_group.id', $assetgroup)
											->where('asset_sub_group.id', $assetsubgroup)
//													->limit(100)
//													->order_by('ascount','desc')
											->group_by('office_assets.asset_id', 'assec')
											->get()->result();
									//									$assetsubgroup = $this->input->get('asset_sub_group');
									$sum = 0;
									$pricesum=0;
									foreach ($assetCountson

											 as $assetCount){
										$id++;

										$total_out = $assetCount->totalstockin;
										$prices = $assetCount->ucst;
										$totalpric = $total_out * $prices;
										$sum = $assetCount->totalstockin + $sum;
										$pricesum=$totalpric + $pricesum;

					if($assetCount->totalstockin > 0){
//
										?>

										<tr>
											<td><?php echo $id; ?></td>
											<td><?php echo $assetCount->assetname ?></td>
											<td><?php echo $assetCount->totalstockin ?></td>
											<td><?php echo number_format($totalpric,'2','.',',');; ?></td>

											<td><?php echo $assetCount->name ?></td>

											<td><?php echo $assetCount->remark;?></td>

										</tr>
									<?php  } } ?>

									</tbody>

									<tr>
										<td>--</td>
										<td>Ida'ama/Total</td>
										<td><?php echo $sum; ?></td>
										<td><?php echo number_format($pricesum,'2','.',',');?></td>
										<td>-</td>
										<td>-</td>

									</tr>
								</table>


							</div>
						</div>
					</div>
				</div>

