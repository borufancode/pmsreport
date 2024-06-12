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
						<a class="btn btn-lg btn-danger" href="<?php echo base_url('vehicles-summary-filter/'.$offciceID)?>"><i class="fa fa-backward"></i> Back Menu</a>
					</div>

					<div class="col-sm-6">
						<h1 class="m-0">Vehicle Summary Report</h1>
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
									Vehicle Summary Report</h2>
							</center>
							<div class="content">
								<?php
								$offciceID = $this->input->get('id');
								//								echo $offciceID;

								$office = $this->input->get('office_name');
								$year = $this->input->get('year');
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
									__<u><?php if ($queryAssetGroup == '') {
											echo '';
										} else {
											echo $queryAssetGroup->name . '/' . $queryAssetGroup->code;
										} ?></u>______</p>
								<p>Ramaddii Giduugaleessaa/ Asset sub-group Name (code) _____
									<u><?php if ($queryAssetSubGroup == '') {
											echo '';
										} else {
											echo $queryAssetSubGroup->name . '/' . $queryAssetSubGroup->code;
										} ?></u>__________
								</p>
							</div>
						</div>
						<div class="col col-12">
							<div class="card-body">
								<table class="table tabe-hover table-bordered" id="example">
									<thead>
									<tr>
										<th>Lakk</th>
										<th>Maqaa Qabeenyaa<br>/Asset Specific Name
										</th>
										<th>Gosa Konkolaataa /Ttpes Of Car
										</th>
										<th>Lakk Adda Baasa PIN/Bar code
										</th>
										<th>Lakk gabatee /Plate No
										</th>
										<th>Lakk Shaansi/ Chassis No
										</th>

										<th>Lakk. Mootoraa/ Engine No</th>
										<th>Moodeela/ Model</th>
										<th>Biraandii/ Brand</th>
										<th>Condition of vehicle</th>
										<th>Gained by</th>
										<th>Cost</th>
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
											asset_profile.platenumber as platenumber,
											asset_profile.chasis_number as chasis_number,
											asset_profile.engine_number as engine_number,
											asset_profile.model as model,
											asset_profile.location as location,
											asset_profile.brand_name as brand_name,
											asset_profile.purchase_price as assetpurchase_price,
											asset_profile.pin as pin,
											asset_transaction.brand as assetbrand,
											asset_profile_type.name as assetProfileName,
											
											
											')
											->from('asset_profile')
											->join('asset', 'asset.id = asset_profile.asset_id')
											->join('office_assets', 'office_assets.asset_id = asset_profile.asset_id')
											->join('asset_sub_group', 'asset_sub_group.id=asset.asset_sub_group_id')
											->join('asset_group', 'asset_group.id=asset_sub_group.asset_group_id')
											->join('asset_transaction', 'asset_profile.asset_id=asset_transaction.asset_id')
											->join('asset_status', 'asset_status.id = asset_transaction.asset_status_id')
											->join('asset_profile_type','asset_profile_type.id = asset_profile.asset_profile_type_id')
											->where('asset_profile.office_id', $office)
											->where('office_assets.year_id =', $year)
											->where('asset_group.id =', $assetgroup)
											->where('asset.asset_sub_group_id =', $assetsubgroup)
											->limit(1000)
											->group_by('asset_profile.asset_id')
//											->order_by('asset.id', 'assec')
											->get()->result();
									$sum = 0;
									foreach ($assetCountson as $assetCount):
										$id++;
										$sum = $sum + 1;
										?>
										<tr>
											<td><?php echo $id; ?></td>
											<td><?php echo $assetCount->assetname ?></td>
											<td><?php echo $assetCount->assetbrand ?></td>
											<!--										Asset Profile jala kan galma'ee waan hin jirreef data baasuun nama rakkisa.-->
											<td><?php echo $assetCount->pin; ?></td>
											<td><?php echo $assetCount->platenumber ?></td>
											<td><?php echo $assetCount->chasis_number ?></td>
											<td><?php echo $assetCount->engine_number ?></td>
											<td><?php echo $assetCount->model ?></td>
											<td><?php echo $assetCount->brand_name ?></td>
											<td><?php echo $assetCount->assetProfileName; ?></td>
											<td><?php echo $assetCount->location; ?></td>
											<td><?php echo $assetCount->assetpurchase_price; ?></td>
										</tr>
									<?php endforeach; ?>

									</tbody>
								</table>


							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
