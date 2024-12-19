<?php
class OrderItemController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["order_id"])){
		$errors["order_id"]="Invalid order_id";
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
			$orderitem=new OrderItem();
		$orderitem->order_id=$data["order_id"];
		$orderitem->item_id=$data["item_id"];
		$orderitem->quantity=$data["quantity"];
		$orderitem->unit_price=$data["unit_price"];
		$orderitem->created_at=$now;
		$orderitem->updated_at=$now;

			$orderitem->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("RoomService_Order",OrderItem::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["order_id"])){
		$errors["order_id"]="Invalid order_id";
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
			$orderitem=new OrderItem();
			$orderitem->id=$data["id"];
		$orderitem->order_id=$data["order_id"];
		$orderitem->item_id=$data["item_id"];
		$orderitem->quantity=$data["quantity"];
		$orderitem->unit_price=$data["unit_price"];
		$orderitem->created_at=$now;
		$orderitem->updated_at=$now;

		$orderitem->update();
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
		OrderItem::delete($id);
		redirect();
	}
	public function show($id){
		view("RoomService_Order",OrderItem::find($id));
	}
}
?>
