
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
						$office = $this->input->get('office_name');
						?>
						<a class="btn btn-lg btn-danger" href="<?php echo base_url('reportbyOrganization/'.$office)?>"><i class="fa fa-backward"></i> Back Menu</a>
					</div>
					<div class="col-sm-6">
						<h1 class="m-0">Report By Organization</h1>
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
								<?php
								$offciceID = $this->input->get('id');
								$office = $this->input->get('office_name');
								$year = $this->input->get('year');
								$assetgroup = $this->input->get('asset_group');
								$assetsubgroup = $this->input->get('asset_sub_group');

								// Get OfficeName;
								$queryOfficeName = $this->db->select('*')
									->from('office')
									->where('id', $office)
									->get()->row();
								// Budget Years
								$YearQuery = $this->db->select('*')
									->from('year')
									->where('id', $year)
									->get()->row();
								// AssetName
								$queryAssetName = $this->db->select('*')
									->from('asset')
									->where('asset.asset_sub_group_id', $assetsubgroup)
									->join('asset_sub_group', 'asset_sub_group.id= asset.asset_sub_group_id')
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
								<h2> <?php echo $queryOfficeName->name;?>
									<br>
									Fixed Asset Count Summery Sheet Report <br/>

								</h2>
							</center>

							<div class="content">
								<a style="margin-left: 1000px;" href="<?php echo base_url('generate-report-dashboard-by-office/'.$office)?>" type="submit"  class="btn btn-lg btn-warning"><i class="fa fa-chart-bar"></i>    Generate Report with Dashboard and Graphs</a>

								<table class="table table-striped table-bordered" id="example">
									<thead>
									<tr>
										<th>NO</th>
										<th>Specific Asset Name</th>
										<th>Amount</th>
										<th>Asset Group</th>
										<th>Asset Sub Group</th>
										<th>Year</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$this->db->select('*,asset.name as assetname,
									count(office_assets.asset_id) as assentcount,
									asset_group.name as assetgroupname,
									asset_group.code as assetgroupcode,
									asset_sub_group.name as assetsubgroupname,
									asset_sub_group.code as assetsubgroupcode,
									');
									$this->db->from('office_assets');
									$this->db->join('asset','asset.id = office_assets.asset_id');
									$this->db->join('asset_sub_group','asset_sub_group.id = asset.asset_sub_group_id');
									$this->db->join('asset_group','asset_group.id = asset_sub_group.asset_group_id');
//									$this->db->join('asset_transaction','asset_transaction.asset_id = office_assets.asset_id');
//									$this->db->join('asset_status','asset_status.id = asset_transaction.asset_status_id');
									$this->db->where('office_assets.office_id',$office);
									$this->db->where('office_assets.status=','outstock');
									$this->db->where('office_assets.year_id',$year);
									$this->db->where('asset_group.id',$assetgroup);
									$this->db->where('asset_sub_group.id',$assetsubgroup);
									$this->db->group_by('office_assets.asset_id');

//									$this->db->limit(10);
									$id=0;
									$AssetByOrganizationQuery=  $this->db->get()->result();
									foreach ($AssetByOrganizationQuery as $item) :
										$id++;

									?>
									<tr>
									<td><?php echo $id;?></td>
									<td><?php echo $item->assetname?></td>
									<td><?php echo $item->assentcount?></td>
									<td><?php echo $item->assetgroupname .'['.$item->assetgroupcode.']'?></td>
									<td><?php echo $item->assetsubgroupname .'['.$item->assetsubgroupcode.']'?></td>
									<td><?php echo $YearQuery->name?></td>
									</tr>
									<?php endforeach; ?>
									</tbody>

								</table>
							</div>
						</div>
					</div>
				</div>

