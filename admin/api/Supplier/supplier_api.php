<?php
class SupplierApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["suppliers"=>Supplier::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["suppliers"=>Supplier::pagination($page,$perpage),"total_records"=>Supplier::count()]);
	}
	function find($data){
		echo json_encode(["supplier"=>Supplier::find($data["id"])]);
	}
	function delete($data){
		Supplier::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$supplier=new Supplier();
		$supplier->name=$data["name"];
		$supplier->contact_name=$data["contact_name"];
		$supplier->email=$data["email"];
		$supplier->phone=$data["phone"];
		$supplier->address=$data["address"];

		$supplier->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		global $now;
		$supplier=new Supplier();
		$supplier->id=$data["id"];
		$supplier->name=$data["name"];
		$supplier->contact_name=$data["contact_name"];
		$supplier->email=$data["email"];
		$supplier->phone=$data["phone"];
		$supplier->address=$data["address"];
		$supplier->updated_at=$now;

		$supplier->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
