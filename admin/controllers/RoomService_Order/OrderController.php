<?php
class OrderController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["order_date"])){
		$errors["order_date"]="Invalid order_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}

*/		global $now;
		if(count($errors)==0){
			$order=new Order();
		$order->customer_id=$data["customer_id"];
		$order->order_date=$data["order_date"];
		$order->total_amount=$data["total_amount"];
		$order->created_at=$now;
		$order->updated_at=$now;

			$order->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("RoomService_Order",Order::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["order_date"])){
		$errors["order_date"]="Invalid order_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}

*/		global $now;
		if(count($errors)==0){
			$order=new Order();
			$order->id=$data["id"];
		$order->customer_id=$data["customer_id"];
		$order->order_date=$data["order_date"];
		$order->total_amount=$data["total_amount"];
		$order->created_at=$now;
		$order->updated_at=$now;

		$order->update();
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
		Order::delete($id);
		redirect();
	}
	public function show($id){
		view("RoomService_Order",Order::find($id));
	}
}
?>
