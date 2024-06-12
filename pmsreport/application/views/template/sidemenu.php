<aside class="main-sidebar sidebar-dark-primary elevation-4"  style="background-color: #2A3F54 !important; font-family: Serif;">
	<div class="sidebar">
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu"
				data-accordion="false">
				<li class="nav-item dropdown">
					<?php
					$UserId=$this->uri->segment(2);
					?>
					<a href="<?php echo base_url('dashboard/'.$UserId	)?>" class="nav-link nav-home">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>

							Dashboard
						</p>
					</a>
				</li>
				<hr>
				<li class='nav-item active'>
					<a href="#" class="nav-link nav-edit_user">
						<i class="nav-icon fas fa-folder-open"></i>
						<p>
							Main Report
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url('stock-taking-sheet-filter/'.$UserId) ?>"
							   class="nav-link nav-new_user tree-item">
								<i class="fas fa-angle-right nav-icon"></i>
								<p>Stocking Sheet Report </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('asset-count-report-filter/'.$UserId) ?>" class="nav-link nav-user_list tree-item">
								<i class="fas fa-angle-right nav-icon"></i>
								<p>Fixed Asset Count Sheet </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('fixed-asset-count-summary-report-filter/'.$UserId) ?>"
							   class="nav-link nav-user_list tree-item">
								<i class="fas fa-angle-right nav-icon"></i>
								<p>Fixed Asset Count Sheet Summery </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('asset-disposal-filter/'.$UserId) ?>"
							   class="nav-link nav-user_list tree-item">
								<i class="fas fa-angle-right nav-icon"></i>
								<p>Asset Disposal Report </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('vehicles-summary-filter/'.$UserId) ?>"
							   class="nav-link nav-user_list tree-item">
								<i class="fas fa-angle-right nav-icon"></i>
								<p>Vehicle Summary Report</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('asset-value-report-filter/'.$UserId) ?>"
							   class="nav-link nav-user_list tree-item">
								<i class="fas fa-angle-right nav-icon"></i>
								<p>Report By Asset Value </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('asset-value-summary-report-filter/'.$UserId) ?>"
							   class="nav-link nav-user_list tree-item">
								<i class="fas fa-angle-right nav-icon"></i>
								<p>Asset Value Summary Report</p>
							</a>
						</li>
					</ul>
				<li class='nav-item active'>
					<a href="#" class="nav-link nav-edit_user">
						<i class="nav-icon fas fa-sitemap"></i>
						<p>
							General Report
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url('/dashboard/'.$UserId) ?>"
							   class="nav-link nav-new_user tree-item">
								<i class="fas fa-angle-right nav-icon"></i>
								<p>Dashboard Regional Report </p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('/reportbyOrganization/'.$UserId) ?>"
							   class="nav-link nav-new_user tree-item">
								<i class="fas fa-angle-right nav-icon"></i>
								<p>Report By Organization </p>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</aside>
