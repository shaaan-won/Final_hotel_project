<?php
class OrderApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["orders"=>Order::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["orders"=>Order::pagination($page,$perpage),"total_records"=>Order::count()]);
	}
	function find($data){
		echo json_encode(["order"=>Order::find($data["id"])]);
	}
	function delete($data){
		Order::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$order=new Order();
		$order->customer_id=$data["customer_id"];
		$order->order_date=$data["order_date"];
		$order->total_amount=$data["total_amount"];

		$order->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		global $now;
		$order=new Order();
		$order->id=$data["id"];
		$order->customer_id=$data["customer_id"];
		$order->order_date=$data["order_date"];
		$order->updated_at=$now;

		$order->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
