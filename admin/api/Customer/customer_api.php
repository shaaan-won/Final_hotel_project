<?php
class CustomerApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["customers"=>Customer::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["customers"=>Customer::pagination($page,$perpage),"total_records"=>Customer::count()]);
	}
	function find($data){
		echo json_encode(["customer"=>Customer::find($data["id"])]);
	}
	function delete($data){
		Customer::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$customer=new Customer();
		$customer->name=$data["name"];
		$customer->first_name=$data["first_name"];
		$customer->last_name=$data["last_name"];
		$customer->email=$data["email"];
		$customer->phone=$data["phone"];
		$customer->id_card_type_id=$data["id_card_type_id"];
		$customer->id_card_number=$data["id_card_number"];
		$customer->address=$data["address"];
		$customer->created_at=$data["created_at"];
		$customer->updated_at=$data["updated_at"];

		$customer->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$customer=new Customer();
		$customer->id=$data["id"];
		$customer->name=$data["name"];
		$customer->first_name=$data["first_name"];
		$customer->last_name=$data["last_name"];
		$customer->email=$data["email"];
		$customer->phone=$data["phone"];
		$customer->id_card_type_id=$data["id_card_type_id"];
		$customer->id_card_number=$data["id_card_number"];
		$customer->address=$data["address"];
		$customer->created_at=$data["created_at"];
		$customer->updated_at=$data["updated_at"];

		$customer->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
