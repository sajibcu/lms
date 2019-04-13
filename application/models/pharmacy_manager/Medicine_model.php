<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Medicine_model extends CI_Model {

	private $table = 'medicines';

	public $units = array(
		"m" 	=> "Meter (M)",
		"Box" 	=> "Box",
		"pc" 	=> "Piece (Pc)",
		"Mg" 	=> "Milli Gram(mg)",
		"ml" 	=> "Milli liter(ml)",
		"Gm" 	=> "Gram",
		"kg" 	=> "Kilogram (Kg)",
	);

	public $taxes = array(
		"4.5" 	=> "4.5%",
		"11.5" 	=> "11.5%",
	);

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 
	public function read()
	{
		return $this->db->select("medicines.*, ha_category.name as category_name, medicine_types.name as type_name, manufacturer_information.manufacturer_name as manufacturer_fullname")
			->from($this->table)
			->join('ha_category', 'ha_category.id = medicines.category_id','left')
			->join('medicine_types', 'medicine_types.id = medicines.type_id','left')
			->join('manufacturer_information', 'manufacturer_information.manufacturer_id = medicines.manufacturer_id', 'left')
			->order_by('product_name','asc')
			->get()
			->result();
	} 
 
	public function read_by_id($id = null)
	{
		return $this->db->select("medicines.*, ha_category.name as category_name, medicine_types.name as type_name, manufacturer_information.manufacturer_name as manufacturer_fullname")
			->from($this->table)
			->join('ha_category', 'ha_category.id = medicines.category_id', 'left')
			->join('medicine_types', 'medicine_types.id = medicines.type_id', 'left')
			->join('manufacturer_information', 'manufacturer_information.manufacturer_id = medicines.manufacturer_id', 'left')
			->where('medicines.id',$id)
			->get()
			->row();
	}

	public function read_by_manufacturer_product($id, $manufacturer_id)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('id',$id)
			->where('manufacturer_id', $manufacturer_id)
			->get()
			->row();
	}

	public function read_by_product_id($id)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('id',$id)
			->get()
			->row();
	}
 
	public function update($data = [])
	{
		return $this->db->where('id',$data['id'])
			->update($this->table,$data); 
	} 
 
	public function delete($id = null)
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
				$list[$value->id] = $value->manufacturer_name; 
			}
			return $list;
		} else {
			return false;
		}
	}

	public function getManufacturerItemsList($manufacturer_id, $search)
	{
		$list = array();

		$query = $this->db->select("*")
			->from($this->table)
			->where('manufacturer_id', $manufacturer_id)
			->like('product_name', $search, 'both')
			->order_by('product_name','asc');

		if(!$search){
			$query->limit(10);
		}

		$result = $query->get()->result();

		if (!empty($result)) {
			foreach ($result as $item) {
				$list[] = array(
					'label' => $item->product_name,
					'value' => $item->id
				);
			}
		}
		return $list;
	}

	public function getItemsListBySearch($search, $limit= 20)
	{
		$list = array();

		$query = $this->db->select("*")
			->from($this->table)
			->like('product_name', $search, 'both')
			->limit($limit)
			->order_by('product_name','asc');

		$result = $query->get()->result();
		if (!empty($result)) {
			foreach ($result as $item) {
				$list[] = array(
					'label' => $item->product_name,
					'value' => $item->id
				);
			}
		}
		return $list;
	}
 }
