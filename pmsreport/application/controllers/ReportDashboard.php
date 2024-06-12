<?php

class ReportDashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ReportModel', 'rm');
	}


	public function index($id)
	{
		;
		$this->load->view('template/link');
		$this->load->view('template/sidemenu');
		$this->load->view('template/regional-dashboard');
		$this->load->view('template/footer');

	}

	public function AssetCountSheetReportFilter($id)
	{
//		$data['assetCounts']=$this->rm->getAssetCountSheetReport($id);
		$this->load->view('template/link');
		$this->load->view('template/sidemenu');
		$this->load->view('report/asset_count_sheet_report_filter');
		$this->load->view('template/footer');
	}

	public function AssetCountSummarySheetReportFilter($id)
	{
//		$data['assetCounts']=$this->rm->AssetCountSummarySheetReportFilter($id);
		$this->load->view('template/link');
		$this->load->view('template/sidemenu');
		$this->load->view('report/asset_count_summary_sheet_report_filter');
		$this->load->view('template/footer');
	}

	public function GetAssetSuGroups()
	{
		$result = $this->rm->GetAssetSuGroups();
		echo json_encode($result);
	}

	public function AllAssetCountSheetReport()
	{
		$data['assetCounts'] = $this->rm->getAllAssetCountSheetReport();
		$this->load->view('template/link');
		$this->load->view('template/sidemenu');
		$this->load->view('report/asset_count_sheet_report', $data);
		$this->load->view('template/footer');

	}

	public function AllAssetCountSummarySheetReport()
	{
		$data['assetCounts'] = $this->rm->AllAssetCountSummarySheetReport();
		$this->load->view('template/link');
		$this->load->view('template/sidemenu');
		$this->load->view('report/asset_count_summary_sheet_report', $data);
		$this->load->view('template/footer');

	}

	public function StockTackingSheetFilter($id)
	{
//		$data['assetCounts']=$this->rm->getAssetCountSheetReport($id);
		$this->load->view('template/link');
		$this->load->view('template/sidemenu');
		$this->load->view('report/stock_taking_sheet_report_filter');
		$this->load->view('template/footer');
	}

	public function AllStockTakingSheetReport()
	{
		$data['stockTakings'] = $this->rm->AllStockTakingSheetReport();
		$this->load->view('template/link');
		$this->load->view('template/sidemenu');
		$this->load->view('report/stock_taking_sheet_report', $data);
		$this->load->view('template/footer');
	}

	public function AssetDisposalReportFilter($id)
	{
//		$data['assetCounts']=$this->rm->getAssetCountSheetReport($id);
		$this->load->view('template/link');
		$this->load->view('template/sidemenu');
		$this->load->view('report/asset_disposal_filter');
		$this->load->view('template/footer');
	}

	public function AllAssetDisposalReport()
	{
		$data['assetDisposal'] = $this->rm->AllAssetDisposalReport();
		$this->load->view('template/link');
		$this->load->view('template/sidemenu');
		$this->load->view('report/asset_disposal_report', $data);
		$this->load->view('template/footer');
	}
	//Vehicles Summary Report
	public function VehicleSummaryReportFilter($id)
	{
//		$data['assetCounts']=$this->rm->getAssetCountSheetReport($id);
		$this->load->view('template/link');
		$this->load->view('template/sidemenu');
		$this->load->view('report/vehicle_summary_report_filter');
		$this->load->view('template/footer');
	}

	public function VehicleSummaryReport()
	{
		$data['assetDisposal'] = $this->rm->getVehicleSummaryReport();
		$this->load->view('template/link');
		$this->load->view('template/sidemenu');
		$this->load->view('report/vehicle_summary_report', $data);
		$this->load->view('template/footer');
	}
	//Asset Value Report
	public function AssetValueReportFilter($id)
	{
//		$data['assetCounts']=$this->rm->getAssetCountSheetReport($id);
		$this->load->view('template/link');
		$this->load->view('template/sidemenu');
		$this->load->view('report/asset_value_report_filter');
		$this->load->view('template/footer');
	}

	public function AssetValueReport()
	{
		$data['assetDisposal'] = $this->rm->getAssetValueReport();
		$this->load->view('template/link');
		$this->load->view('template/sidemenu');
		$this->load->view('report/asset_value_report', $data);
		$this->load->view('template/footer');
	}
	//Asset Value Report
	public function AssetValueSummaryReportFilter($id)
	{
//		$data['assetCounts']=$this->rm->getAssetCountSheetReport($id);
		$this->load->view('template/link');
		$this->load->view('template/sidemenu');
		$this->load->view('report/asset_value_summary_report_filter');
		$this->load->view('template/footer');
	}

	public function AssetValueSummaryReport()
	{
		$data['assetDisposal'] = $this->rm->getAssetValueSummaryReport();
		$this->load->view('template/link');
		$this->load->view('template/sidemenu');
		$this->load->view('report/asset_value_summary_report', $data);
		$this->load->view('template/footer');
	}

	public function ReportByOrganization($id){
		$data['years']=$this->rm->getYears();
		$data['assetgroups']=$this->rm->getGroup();
		$data['organizations'] = $this->rm->getOrganizationsStructure();
		$this->load->view('template/link');
		$this->load->view('template/sidemenu');
		$this->load->view('report/report_by_organization_filter',$data);
		$this->load->view('template/footer');
	}
	public function SummaryReportOrganization(){
		$this->load->view('template/link');
		$this->load->view('template/sidemenu');
		$this->load->view('report/asset_sumary_report_by_organization');
		$this->load->view('template/footer');
	}
	public function getOfficeStructure(){
		$result = $this->rm->getOfficeStructure();
		echo json_encode($result);
	}
	public function GenerateDashboardByOfficeReport($id){
		$this->load->view('template/link');
		$this->load->view('template/sidemenu');
		$this->load->view('template/regional_report_office_dashboard');
		$this->load->view('template/footer');
	}
}
