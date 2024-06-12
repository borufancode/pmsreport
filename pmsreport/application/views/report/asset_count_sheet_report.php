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
						<a class="btn btn-lg btn-danger" href="<?php echo base_url('asset-count-report-filter/'.$offciceID)?>"><i class="fa fa-backward"></i> Back Menu</a>
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
								<h3> Biiroo Maallaqa <Oromiyaa>
									Oromia Finance Bureau<br>
									Lakkaa’umsa Qabeenya Dhaabbii/<br>
									Fixed Asset count sheet(FACS)</h3>
							</center>

						</div>
						<div class="col col-12">
							<div class="card-body">
								<?php
								$offciceID = $this->input->get('id');
								//								echo $offciceID;

								$office = $this->input->get('office_name');
								$year = $this->input->get('year');
								$store = $this->input->get('store');
								$assetgroup = $this->input->get('asset_group');
								$assetsubgroup = $this->input->get('asset_sub_group');
								//	echo $assetsubgroup;
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
								<p> Maqaa Mana Hojii/Public body/Office__<u><?= $office ?>_</u>__</p>
								<p>Bara Baajataa/Fiscal year___<u><?= $queryOfficeYearName->name; ?>___</u>_</p>
								<p>Ramaddii Ijoo/Asset Group Name (code)
									__<u><?php if($queryAssetGroup ==''){ echo ''; } else { echo $queryAssetGroup->name . '/' . $queryAssetGroup->code; } ?></u>______</p>
								<p>Ramaddii Giduugaleessaa/ Asset sub-group Name (code) _____
									<u><?php if($queryAssetSubGroup == '' ){ echo ''; } else{ echo  $queryAssetSubGroup->name . '/' . $queryAssetSubGroup->code; } ?></u>__________
								</p>


								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
									<tr>
										<th>Lakk/No</th>
										<th>Maqaa Qabeenyaa</th>
										<th>Lakkofsa Adda Baasa</th>
										<th>Serial/Part No</th>
										<th>Lakk/No</th>
										<th>Guyyaa/Date</th>
										<th>Department</th>
										<th>Maqaa/User/employee</th>
										<th>Condition or status of asset</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$id = 0;
									$office = $this->input->get('office');
									$year = $this->input->get('year');
									$assetgroup = $this->input->get('asset_group');
									$assetsubgroup = $this->input->get('asset_sub_group');
									$assetCountson =
											$this->db->select('*,
											asset.name as assetname,
											asset_group.code as asgcode,
											asset_sub_group.code as assgcode,
											asset.code as assetcode,
											office_assets.created_at as oaca,
											transaction_record.reciept_number as  rid,
											asset_transaction.serial_number as  srn,
											fos_user.username as username,
											asset_status.name as asname')
													->from('office_assets,asset')
//									->join('asset', 'asset.id=office_assets.asset_id')
													->join('asset_sub_group', 'asset_sub_group.id=asset.asset_sub_group_id')
													->join('asset_group', 'asset_group.id=asset_sub_group.asset_group_id')
													->join('asset_transaction', 'asset_transaction.id=office_assets.asset_transactions_id')
													->join('asset_status', 'asset_status.id=asset_transaction.asset_status_id', 'left')
													->join('transaction_record', 'transaction_record.office_id=office_assets.office_id')
//													->join('fos_user', 'fos_user.office_id=transaction_record.office_id')
//									->join('office as of','of.id = office_assets.office_id','left')
													->where('office_assets.office_id', $office)
													->where('transaction_record.office_id', $office)
													->where('office_assets.year_id', $year)
													->where('asset_group.id', $assetgroup)
												->where('asset_sub_group.id', $assetsubgroup)

//													->limit(1000)
													->order_by('office_assets.id','assec')
												->get()->result();
									$sum = 0;
									foreach ($assetCountson as $assetCount):
										$id++;
										$sum = $sum + 1;
										?>
										<tr>
											<td><?= $id; ?></td>
											<td><?= $assetCount->assetname ?></td>
											<td><?php echo  $assetCount->asgcode .$assetCount->assgcode.$assetCount->assetcode  ?></td>
											<td><?= $assetCount->srn ?></td>
											<td><?= $assetCount->rid ?></td>
											<td><?= $assetCount->oaca; ?></td>
											<td><?= $queryOfficeName->abbreviation; ?></td>
											<td><?= $assetCount->username .' '. $assetCount->middle_name. ' '. $assetCount->last_name .'('.$assetCount->username.')'	 ?></td>
											<td><?= $assetCount->asname ?></td>
										</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
</div>



