<?php
class OrderItemApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["order_items"=>OrderItem::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["order_items"=>OrderItem::pagination($page,$perpage),"total_records"=>OrderItem::count()]);
	}
	function find($data){
		echo json_encode(["orderitem"=>OrderItem::find($data["id"])]);
	}
	function delete($data){
		OrderItem::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$orderitem=new OrderItem();
		$orderitem->order_id=$data["order_id"];
		$orderitem->item_id=$data["item_id"];
		$orderitem->quantity=$data["quantity"];

		$orderitem->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		global $now;
		$orderitem=new OrderItem();
		$orderitem->id=$data["id"];
		$orderitem->order_id=$data["order_id"];
		$orderitem->item_id=$data["item_id"];
		$orderitem->quantity=$data["quantity"];
		$orderitem->updated_at=$now;

		$orderitem->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
