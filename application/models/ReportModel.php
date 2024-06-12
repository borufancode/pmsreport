<?php

class ReportModel extends CI_Model
{
	public function getAssetCountSheetReport($id)
	{
		$this->db->select('*');
		$this->db->from('office_assets');
		$this->db->join('asset', 'asset.id = office_assets.asset_id');
		$this->db->join('asset_sub_group', 'asset_sub_group.id = asset.asset_sub_group_id');
		$this->db->join('asset_group as ag', 'ag.id = asset_sub_group.asset_group_id');
		$this->db->join('fos_user', 'fos_user.id=office_assets.created_by_id', 'left');
		$this->db->join('asset_transaction', 'asset_transaction.id=office_assets.asset_transactions_id');
		$this->db->join('transaction_record', 'transaction_record.id=office_assets.transaction_records_id', 'left');
		$this->db->join('transaction_record as trf', 'trf.reciever_id=fos_user.id');
		$this->db->where('ag.asset_type_id = 1');
		$this->db->where('office_assets.created_by_id', $id);
//		$this->db->where('transaction_record.?reciever_id !=',"NULL");

		$this->db->limit(1000);

		$query = $this->db->get();
		return $query->result();

	}

	public function getYears()
	{
		return $this->db->get('year')->result();
	}

	public function getGroup()
	{
		return $this->db->get('asset_group')->result();
	}

	public function getFixedAssetGroup()
	{
		$this->db->select('*');
		$this->db->from('asset_group');
		$this->db->where('
		code = 4521
		 or code =4522 
		 or code =4523
		 or code = 4524 
		 or code = 4525
		 or code = 4526
		 or code = 4527 
		 or code =4528 
		 or code = 4529
		 or code=4530 
		 or code= 4531 
		 or code= 4532');
		$this->db->order_by('name','assec');
		return $this->db->get()->result();

	}
	public function fetch_year($id){
		$this->db->select('office_assets.year_id');
		$this->db->from('office_assets');
		$this->db->group_by('office_assets.year_id');
		$this->db->order_by('year_id', 'DESC');
		return $this->db->get();
	}

	public function getVehiclesAssetGroup()
	{
		$this->db->select('*');
		$this->db->from('asset_group');
		$this->db->where('id', 56);
		return $this->db->get()->result();

	}

	public function getStore($id)
	{
		$this->db->select('*');
		$this->db->from('store');
		$this->db->where('store.office_id', $id);
		return $this->db->get()->result();
	}
	public function getOrganizationsStructure(){
		$this->db->select('*');
		$this->db->from('organization');
		$this->db->where('id = 3 or id= 8 or id = 9 or id = 11 or id = 10');
		return $this->db->get()->result();
	}
	public function getOfficeStructure(){
		$this->db->select('*');
		$this->db->from('office');
		$this->db->where('organization_id',$this->input->post('structure'));
		return $this->db->get()->result();
	}

	public function GetAssetSuGroups()
	{
		$this->db->select('*');
		$this->db->from('asset_sub_group');
		$this->db->where('asset_group_id', $this->input->post('ag_id'));
		$query = $this->db->get();
		if ($query) {
			return $query->result();
		}
	}

	public function AllAssetCountSummarySheetReport()
	{

	}

	public function getAllAssetCountSheetReport()
	{
		$office = $this->input->get('office');
		$year = $this->input->get('year');
		$store = $this->input->get('store');
		$assetgroup = $this->input->get('asset_group');
		$assetsubgroup = $this->input->get('asset_sub_group');


		$this->db->select('*');
		$this->db->from('office_assets');
		$this->db->join('asset', 'asset.id=office_assets.asset_id');
		$this->db->join('asset_sub_group', 'asset_sub_group.id=asset.asset_sub_group_id');
		$this->db->join('asset_group', 'asset_group.id=asset_sub_group.asset_group_id');
		$this->db->join('transaction_record', 'transaction_record.id=office_assets.transaction_records_id', 'left');
		$this->db->join('asset_transaction', 'asset_transaction.id=office_assets.asset_transactions_id', 'left');
		$this->db->join('fos_user', 'fos_user.id=office_assets.created_by_id', 'left');
		$this->db->join('office as office_name', 'office_name.id = office_assets.office_id', 'left');
		$this->db->where('office_assets.office_id', $office);
		$this->db->where('office_assets.year_id', $year);
		$this->db->where('asset_group.id', $assetgroup);
		$this->db->where('asset_sub_group.id', $assetsubgroup);
		return $this->db->get()->result();

	}

	public function AllStockTakingSheetReport()
	{

	}

// Asset Disposal Report
	public function AllAssetDisposalReport()
	{

	}

// Vehicle Summary Report
	public function getVehicleSummaryReport()
	{

	}

	// Asset Value Report
	public function getAssetValueReport()
	{

	}

	// Asset Value Summary Report
	public function getAssetValueSummaryReport()
	{

	}

}
