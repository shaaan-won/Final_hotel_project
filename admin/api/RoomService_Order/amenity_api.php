<?php
class AmenityApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["amenities"=>Amenity::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["amenities"=>Amenity::pagination($page,$perpage),"total_records"=>Amenity::count()]);
	}
	function find($data){
		echo json_encode(["amenity"=>Amenity::find($data["id"])]);
	}
	function delete($data){
		Amenity::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$amenity=new Amenity();
		$amenity->name=$data["name"];
		$amenity->description=$data["description"];

		$amenity->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$amenity=new Amenity();
		$amenity->id=$data["id"];
		$amenity->name=$data["name"];
		$amenity->description=$data["description"];

		$amenity->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
