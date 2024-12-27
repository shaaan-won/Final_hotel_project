<?php
class InventoryApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["inventorys"=>Inventory::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["inventorys"=>Inventory::pagination($page,$perpage),"total_records"=>Inventory::count()]);
	}
	function find($data){
		echo json_encode(["inventory"=>Inventory::find($data["id"])]);
	}
	function delete($data){
		Inventory::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$inventory=new Inventory();
		$inventory->supplier_id=$data["supplier_id"];
		$inventory->item_id=$data["item_id"];
		$inventory->quantity=$data["quantity"];

		$inventory->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		global $now;
		$inventory=new Inventory();
		$inventory->id=$data["id"];
		$inventory->supplier_id=$data["supplier_id"];
		$inventory->item_id=$data["item_id"];
		$inventory->quantity=$data["quantity"];
		$inventory->updated_at=$now;

		$inventory->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
