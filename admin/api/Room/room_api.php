<?php
class RoomApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["rooms"=>Room::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["rooms"=>Room::pagination($page,$perpage),"total_records"=>Room::count()]);
	}
	function find($data){
		echo json_encode(["room"=>Room::find($data["id"])]);
	}
	function delete($data){
		Room::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$room=new Room();
		$room->room_number=$data["room_number"];
		$room->room_type_id=$data["room_type_id"];
		$room->capacity=$data["capacity"];
		$room->status_id=$data["status_id"];

		$room->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		global $now;
		$room=new Room();
		$room->id=$data["id"];
		$room->room_number=$data["room_number"];
		$room->room_type_id=$data["room_type_id"];
		$room->capacity=$data["capacity"];
		$room->status_id=$data["status_id"];
		$room->updated_at=$now;

		$room->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
