<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Product_model extends CI_Model{
	public function get_products(){
		$productQuery = $this->db->get('product');
		return $productQuery->result_array();
	}

	public function getSpecificProduct($id){
		$this->db->where('id',$id);
		$productQuery = $this->db->get('product');
		return $productQuery->result_array();
	}

	public function getSpecificProductImage($id){
		$this->db->where('product_id',$id);
		$productQuery = $this->db->get('product_image');
		return $productQuery->result_array();
	}

	public function updateProduct($id,$dataArray){
		$this->db->where('id',$id);
		$this->db->update('product',$dataArray);
		return true;
	}

	public function deleteProduct($id){
		$this->db->where('id',$id);
		$this->db->delete('product');
		return true;
	}

	public function saveProduct($dataArray){
		$this->db->insert('product',$dataArray);
		$last_insert_id = $this->db->insert_id();
		return $last_insert_id;
	}

	public function insertImage($dataArray){
		$this->db->insert_batch('product_image',$dataArray);
		return true;
	}
}
?>