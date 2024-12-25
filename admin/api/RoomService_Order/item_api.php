<?php
class ItemApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["items"=>Item::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["items"=>Item::pagination($page,$perpage),"total_records"=>Item::count()]);
	}
	function find($data){
		echo json_encode(["item"=>Item::find($data["id"])]);
	}
	function delete($data){
		Item::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$item=new Item();
		$item->name=$data["name"];
		$item->description=$data["description"];

		$item->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$item=new Item();
		$item->id=$data["id"];
		$item->name=$data["name"];
		$item->description=$data["description"];
		$item->updated_at=$now;

		$item->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
