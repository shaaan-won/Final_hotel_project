<?php
class RoomAmenityApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["room_amenities"=>RoomAmenity::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["room_amenities"=>RoomAmenity::pagination($page,$perpage),"total_records"=>RoomAmenity::count()]);
	}
	function find($data){
		echo json_encode(["roomamenity"=>RoomAmenity::find($data["id"])]);
	}
	function delete($data){
		RoomAmenity::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$roomamenity=new RoomAmenity();
		$roomamenity->customer_id=$data["customer_id"];
		$roomamenity->room_id=$data["room_id"];
		$roomamenity->amenity_id=$data["amenity_id"];
		$roomamenity->quantity=$data["quantity"];

		$roomamenity->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$roomamenity=new RoomAmenity();
		$roomamenity->id=$data["id"];
		$roomamenity->customer_id=$data["customer_id"];
		$roomamenity->room_id=$data["room_id"];
		$roomamenity->amenity_id=$data["amenity_id"];
		$roomamenity->quantity=$data["quantity"];

		$roomamenity->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
