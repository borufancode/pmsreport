<div class="wrapper">
	<div class="content-wrapper" style="min-height: 169.4px;">
		<div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6 text-left">
						<?php
						$offciceID = $this->input->get('id');

						?>
						<a class="btn btn-lg btn-danger" href="<?php echo base_url('asset-value-report-filter/'.$offciceID)?>"><i class="fa fa-backward"></i> Back Menu</a>
					</div>
					<div class="col-sm-6">
						<h1 class="m-0">Asset Value Report</h1>
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
								<h2> Biiroo Maallaqa Oromiyaa
									Oromia Finance Bureau<br>
									Report By Asset Value</h2>
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
								<p>Ramaddii Ijoo/Asset Group Name (code)
									__<u><?= $queryAssetGroup->name . '/' . $queryAssetGroup->code ?></u>______</p>
								<p>Ramaddii Giduugaleessaa/ Asset sub-group Name (code) _____
									<u><?= $queryAssetSubGroup->name . '/' . $queryAssetSubGroup->code ?></u>__________
								</p>
							</div>
						</div>
						<div class="col col-12">
							<div class="card-body">
								<table class="table table-hover table-bordered" id="example">
									<thead>
									<tr>
										<th> LakK /No</th>
										<th>Maqaa Qabeenyaa /Asset Specific Name</th>
										<th>Lakkofsa Adda Baasa / Pin Bar-code</th>
										<th>Gatii /Cost</th>
										<th>Hirrifama Duluumaa Waggaa /Depreciation Year</th>
										<th>Hirrifama Duluumaa Kuufame/ Accumulated Depreciation</th>
										<th>Gatii Galmee /Book value</th>
										<th>Yaada /Remark</th>

									</tr>
									</thead>
									<tbody>
									<?php
									$id = 0;
									$office = $this->input->get('office');
									//									echo $office;
									$year = $this->input->get('year');
									//									echo $year;
									$assetgroup = $this->input->get('asset_group');
									$assetsubgroup = $this->input->get('asset_sub_group');
									//									echo $assetgroup;
									$assetCountson =
										$this->db->select('*,
											asset.name as assetname,
											asset_profile.pin as aspin,
											asset_transaction.remarks as remark,
											
											
											')
											->from('asset_profile')
											->join('asset', 'asset.id = asset_profile.asset_id')
											->join('office_assets', 'office_assets.asset_id = asset_profile.asset_id')
											->join('asset_sub_group', 'asset_sub_group.id=asset.asset_sub_group_id')
											->join('asset_group', 'asset_group.id=asset_sub_group.asset_group_id')
											->join('asset_transaction', 'asset_profile.asset_id=asset_transaction.asset_id')

											->where('asset_profile.office_id', $office)
											->where('office_assets.year_id =', $year)
											->where('asset_group.id =', $assetgroup)
											->where('asset.asset_sub_group_id =', $assetsubgroup)
											->limit(1000)
											->group_by('asset_profile.asset_id')
//											->order_by('asset.id', 'assec')
											->get()->result();
									$sumpup = 0;
									$sumhd = 0;
									foreach ($assetCountson as $assetCount):
									$id++;

									$puchasedPr= $assetCount->purchase_price;
									$accV= $puchasedPr - (10/100 *$puchasedPr);
									$yes = $assetCount->year_of_service;
									$accD=$accV / $yes;
									$bookvalue=$puchasedPr - $accD;
//									echo $accD;
										$sumpup = $sumpup + $puchasedPr;
										$sumhd = $sumhd + $bookvalue;

									?>

									<tr>
										<td><?php echo $id; ?></td>
										<td><?php echo $assetCount->assetname; ?></td>
										<td><?php echo $assetCount->aspin; ?></td>
										<td><?php echo $assetCount->purchase_price; ?></td>
										<td><?php echo $assetCount->date;?></td>
										<td><?php echo $accD;?></td>
										<td><?php echo $bookvalue; ?></td>
										<td><?php echo $assetCount->remark?></td>
									</tr>

									<?php endforeach; ?>
									</tbody>

									<tr>
										<td colspan="3" style="text-align:right">Total</td>
										<td><?php echo $sumpup?></td>
										<td></td>
										<td></td>
										<td ><?php echo $sumhd; ?></td>
										<td></td>
									</tr>

								</table>


							</div>
						</div>
					</div>
				</div>

			</div>
		</section>
	</div>
</div>

