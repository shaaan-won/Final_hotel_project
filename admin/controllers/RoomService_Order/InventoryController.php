<?php
class InventoryController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("RoomService_Order");
	}
	public function create(){
		view("RoomService_Order");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["supplier_id"])){
		$errors["supplier_id"]="Invalid supplier_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["item_id"])){
		$errors["item_id"]="Invalid item_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["quantity"])){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["unit_price"])){
		$errors["unit_price"]="Invalid unit_price";
	}

*/		global $now;
		if(count($errors)==0){
			$inventory=new Inventory();
		$inventory->supplier_id=$data["supplier_id"];
		$inventory->item_id=$data["item_id"];
		$inventory->quantity=$data["quantity"];
		$inventory->unit_price=$data["unit_price"];
		$inventory->created_at=$now;
		$inventory->updated_at=$now;

			$inventory->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("RoomService_Order",Inventory::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["supplier_id"])){
		$errors["supplier_id"]="Invalid supplier_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["item_id"])){
		$errors["item_id"]="Invalid item_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["quantity"])){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["unit_price"])){
		$errors["unit_price"]="Invalid unit_price";
	}

*/		global $now;
		if(count($errors)==0){
			$inventory=new Inventory();
			$inventory->id=$data["id"];
		$inventory->supplier_id=$data["supplier_id"];
		$inventory->item_id=$data["item_id"];
		$inventory->quantity=$data["quantity"];
		$inventory->unit_price=$data["unit_price"];
		$inventory->created_at=$now;
		$inventory->updated_at=$now;

		$inventory->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("RoomService_Order");
	}
	public function delete($id){
		Inventory::delete($id);
		redirect();
	}
	public function show($id){
		view("RoomService_Order",Inventory::find($id));
	}
}
?>
