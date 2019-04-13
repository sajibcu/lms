<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Purchasedetail_model extends CI_Model {

	private $table = 'medicine_purchase_details';

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 
	public function read()
	{
		return $this->db->select("medicine_purchase_details.*, medicines.product_name")
			->from($this->table)
			->join('medicines', 'medicines.id = medicine_purchase_details.product_id','left')
			->order_by('medicine_purchase_details.purchase_id','asc')
			->get()
			->result();
	} 
 
	public function read_by_id($id = null)
	{
		return $this->db->select("medicine_purchase_details.*, medicines.product_name")
			->from($this->table)
			->join('medicines', 'medicines.id = medicine_purchase_details.product_id','left')
			->where('medicine_purchase_details.id',$id)
			->get()
			->row();
	}

	public function read_by_purchase_detail_id($id = null)
	{
		return $this->db->select("medicine_purchase_details.*, medicines.product_name")
			->from($this->table)
			->join('medicines', 'medicines.id = medicine_purchase_details.product_id','left')
			->where('medicine_purchase_details.purchase_detail_id',$id)
			->get()
			->row();
	}

	public function getPurchaseItems($purchaseID, $isPositive = true, $all = false)
	{
		$query = $this->db->select("medicine_purchase_details.*, medicines.product_name")
			->from($this->table)
			->join('medicines', 'medicines.id = medicine_purchase_details.product_id','left')
			->where('medicine_purchase_details.purchase_id', $purchaseID)
			->order_by('medicine_purchase_details.id','asc');
			
		if ( $isPositive && !$all ) $query->where('quantity >', 0);
		if ( !$isPositive && !$all ) $query->where('quantity <', 0);
		return $query->get()->result();
	}

	public function deletePurchaseItems($purchase_id, $isPositive = true, $all = false)
	{
		$query = $this->db->where('purchase_id',$purchase_id);
		if ( $isPositive && !$all ) $query->where('quantity >', 0);
		if ( !$isPositive && !$all ) $query->where('quantity <', 0);
		$query->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
 
	public function update($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update($this->table,$data); 
	} 
 
	public function delete($id = null, $isPositive = true, $all = false)
	{
		$this->db->where('id',$id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	} 

	public function manufacturer_list()
	{
		$result = $this->db->select("*")
			->from($this->table)
			->get()
			->result();

		$list[''] = 'Select Manufacturer';
		if (!empty($result)) {
			foreach ($result as $value) {
				$list[$value->manufacturer_id] = $value->manufacturer_name; 
			}
			return $list;
		} else {
			return false;
		}
	}

	public function get_batch_info($batch_id)
	{
		$result = $this->db->select("expeire_date, quantity")
			->from($this->table)
			->where('batch_id', $batch_id)
			->get()
			->row();

		$list = array();
		if (!empty($result)) {
			$list = array(
				"total_product" => $result->quantity,
				"expire_date" => $result->expeire_date,
			);
		}
		return $list;
	}

	public function list_batch_by_product_id($product_id)
	{
		$result = $this->db->select("batch_id")
			->from($this->table)
			->where('product_id', $product_id)
			->order_by('batch_id')
			->get()
			->result();

		$list = array();
		if (!empty($result)) {
			foreach ($result as $value) {
				$list[] = $value->batch_id; 
			}
		}
		return $list;
	}
	
 }
