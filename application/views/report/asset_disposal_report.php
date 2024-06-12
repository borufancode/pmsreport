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
						<a class="btn btn-lg btn-primary" href="<?php echo base_url('asset-disposal-filter/'.$offciceID)?>"><i class="fa fa-backward"></i> Back Menu</a>
					</div>
					<div class="col-sm-6 text-right">
						<h1 class="m-0">Asset Disposal Report</h1>
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
								<h2> Biiroo Maallaqa Oromiyaa /
									Oromia Finance Bureau<br>
									Asset Disposal Report</h2>
							</center>
							<div class="content">
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
								<p> Maqaa Mana Hojii/Public body/Office____<?= $office ?>__________</p>
								<p>Bara Baajataa/Fiscal year________<?= $queryOfficeYearName->name; ?>__________</p>
								<p>Maqaa Istoorii/Store name/No._______<?= $queryStoreName->name ?>__________</p>
								<p>Ramaddii Ijoo/Asset Group Name (code)
									__<u><?php if($queryAssetGroup== ''){ echo ''; }else { echo  $queryAssetGroup->name . '/' . $queryAssetGroup->code;  }?></u>______</p>
								<p>Ramaddii Giduugaleessaa/ Asset sub-group Name (code) _____
									<u><?php if($queryAssetSubGroup == ''){ echo ' ';} else { echo  $queryAssetSubGroup->name . '/' . $queryAssetSubGroup->code; } ?></u>__________
								</p>
							</div>
						</div>
						<div class="col col-12">
							<div class="card-body">
								<table class="table table-striped table-bordered" id="example">
									<thead>
									<tr>
										<th>Lakk/No</th>
										<th>Maqaa Qabeenyaa
										</th>
										<th>Safartuu
										</th>
										<th>Bayyina
										</th>
										<th>Sababa ittin Dhabamsiisamu</th>
										<th>Disposed by
										</th>

										<th>Method of Disposal

										</th>
										<th>Maallaqa ittin Gurgurame</th>

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
											asset_transaction.unit_cost as asset_unit_cost,
											asset_status.name as asset_status_name,
											sum(office_assets.total_stock_out) as totaldisposed,
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
											->where('asset_status.name', 'disposed')
//													->limit(100)
//													->order_by('ascount','desc')
											->group_by('office_assets.asset_id', 'assec')
											->get()->result();
									//									$assetsubgroup = $this->input->get('asset_sub_group');
									$sum = 0;
									$pricesum=0;
									foreach ($assetCountson

									as $assetCount):
									$id++;

$sum=$sum + $assetCount->asset_unit_cost;


									//
									?>

									<tr>
										<td><?php echo $id;?></td>
										<td><?php echo $assetCount->assetname?></td>
										<td>Number</td>
										<td><?php echo $assetCount->totaldisposed?></td>
										<td><?php echo 'Kan hin Hojjenne'; ?></td>
										<td>BMO</td>
										<td>Maallaqatti gurguruun</td>
										<td><?php echo number_format($assetCount->asset_unit_cost,'2','.',',');?></td>




									</tr>
									<?php endforeach; ?>


									</tbody>
									<tr>
										<td colspan="7" style="text-align: end">Total amount in Bir</td>
										<td><?php echo number_format($sum,'2','.',',');; ?></td>
									</tr>

								</table>
								<div class="history">
									<p>Approved by stock clerk_____________________ </p>
									<p>Approved by PAO_____________________ </p>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
