<?php
class RoomAmenityDetailApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["room_amenity_details"=>RoomAmenityDetail::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["room_amenity_details"=>RoomAmenityDetail::pagination($page,$perpage),"total_records"=>RoomAmenityDetail::count()]);
	}
	function find($data){
		echo json_encode(["roomamenitydetail"=>RoomAmenityDetail::find($data["id"])]);
	}
	function delete($data){
		RoomAmenityDetail::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$roomamenitydetail=new RoomAmenityDetail();
		$roomamenitydetail->room_amenity_id=$data["room_amenity_id"];
		$roomamenitydetail->customer_id=$data["customer_id"];
		$roomamenitydetail->room_id=$data["room_id"];
		$roomamenitydetail->amenity_id=$data["amenity_id"];
		$roomamenitydetail->quantity=$data["quantity"];

		$roomamenitydetail->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		global $now;
		$roomamenitydetail=new RoomAmenityDetail();
		$roomamenitydetail->id=$data["id"];
		$roomamenitydetail->room_amenity_id=$data["room_amenity_id"];
		$roomamenitydetail->customer_id=$data["customer_id"];
		$roomamenitydetail->room_id=$data["room_id"];
		$roomamenitydetail->amenity_id=$data["amenity_id"];
		$roomamenitydetail->quantity=$data["quantity"];
		$roomamenitydetail->updated_at=$now;

		$roomamenitydetail->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
