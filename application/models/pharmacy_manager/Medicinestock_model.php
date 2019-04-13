<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Medicinestock_model extends CI_Model {

	private $table = 'view_m_total_batch_stock';
	private $table_qty = 'view_k_stock_batch_qty';
	private $table_product = 'view_m_total_product_stock';

	public function create($data = [])
	{	 
		return $this->db->insert($this->table,$data);
	}
 

	public function read()
	{
		$selects = array(
			"main.*",
			"m.product_name",
			"m.price as sell_price",
			"m.buy_price as buy_price",
			"c.name as category_name",
			"t.name as type_name",
			"sum(main.sell) as sold",
			"sum(main.Purchase) as purchase",
			"sum(main.Purchase) + sum(main.sell) as total_qty",
			"sum(main.Purchase) - sum(main.sell) as stock",
		);

		$result = $this->db->select(implode(",", $selects))
			->from($this->table_qty. ' main')
			->join('medicines m', 'm.id = main.product_id','left')
			->join('ha_category c', 'c.id = m.category_id', 'left')
			->join('medicine_types t', 't.id = m.type_id', 'left')
			->group_by('main.product_id')
			->get()
			->result();
		return $result;
	}

	public function out_of_stock( $alert = 10 )
	{
		$selects = array(
			"main.*",
			"m.product_name",
			"m.unit",
			"t.name as type_name",
			"sum(main.sell) as sold",
			"sum(main.Purchase) - sum(main.sell) as stock",
		);

		$result = $this->db->select(implode(",", $selects))
			->from($this->table_qty. ' main')
			->join('medicines m', 'm.id = main.product_id','left')
			->join('ha_category c', 'c.id = m.category_id', 'left')
			->join('medicine_types t', 't.id = m.type_id', 'left')
			->having('(sum(main.Purchase) - sum(main.sell)) <', $alert)
			->group_by('main.product_id')
			->get()
			->result();
		return $result;
	}

	public function expired_stock()
	{
		$selects = array(
			"main.*",
			"m.product_name",
			"m.unit",
			"t.name as type_name",
			"main.batch_id",
			"main.stock",
		);

		$result = $this->db->select(implode(",", $selects))
			->from($this->table_product. ' main')
			->join('medicines m', 'm.id = main.product_id','left')
			->join('ha_category c', 'c.id = m.category_id', 'left')
			->join('medicine_types t', 't.id = m.type_id', 'left')
			->having('expeire_date <', date('Y-m-d'))
			->group_by('main.product_id')
			->group_by('main.batch_id')
			->get()
			->result();
		return $result;
	}

	public function cout_out_of_stock( $alert = 10 )
	{
		$selects = array(
			"count( main.product_id ) as total",
		);

		$row = $this->db->select(implode(",", $selects))
			->from($this->table_qty. ' main')
			->having('(sum(main.Purchase) - sum(main.sell)) <', $alert)
			->group_by('main.product_id')
			->get()
			->row();
		
		if($row){
			return $row->total;
		}
		
		return 0;
	}

	public function cout_expired_stock()
	{
		$selects = array(
			"count( main.product_id ) as total",
		);

		$row = $this->db->select(implode(",", $selects))
			->from($this->table_product. ' main')
			->where('main.expeire_date < ', date('Y-m-d'))
			// ->group_by('main.product_id')
			->get()
			->row();
		
		if($row){
			return $row->total;
		}
		
		return 0;
	}

	public function get_batch_info($batch_id)
	{
		$result = $this->db->select("expeire_date, stock")
			->from($this->table)
			->where('batch_id', $batch_id)
			->get()
			->row();

		$list = array();
		if (!empty($result)) {
			$list = array(
				"total_product" => $result->stock,
				"expire_date" => $result->expeire_date,
			);
		}
		return $list;
	}

	public function list_batch_by_product_id($product_id, $includeKey = false)
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
				if($includeKey){
					$list[$value->batch_id] = $value->batch_id; 
				}else{
					$list[] = $value->batch_id; 
				}
			}
		}
		return $list;
	}
	
 }
