<?php
class RoomController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("Room");
	}
	public function create(){
		view("Room");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRoomNumber"])){
		$errors["room_number"]="Invalid room_number";
	}
	if(!preg_match("/^[\s\S]+$/",$data["room_type_id"])){
		$errors["room_type_id"]="Invalid room_type_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["price"])){
		$errors["price"]="Invalid price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["capacity"])){
		$errors["capacity"]="Invalid capacity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status_id"])){
		$errors["status_id"]="Invalid status_id";
	}

*/		global $now;
		if(count($errors)==0){
			$room=new Room();
		$room->room_number=$data["room_number"];
		$room->room_type_id=$data["room_type_id"];
		$room->price=$data["price"];
		$room->capacity=$data["capacity"];
		$room->status_id=$data["status_id"];
		$room->created_at=$now;
		$room->updated_at=$now;

			$room->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Room",Room::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRoomNumber"])){
		$errors["room_number"]="Invalid room_number";
	}
	if(!preg_match("/^[\s\S]+$/",$data["room_type_id"])){
		$errors["room_type_id"]="Invalid room_type_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["price"])){
		$errors["price"]="Invalid price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["capacity"])){
		$errors["capacity"]="Invalid capacity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status_id"])){
		$errors["status_id"]="Invalid status_id";
	}

*/		global $now;
		if(count($errors)==0){
			$room=new Room();
			$room->id=$data["id"];
		$room->room_number=$data["room_number"];
		$room->room_type_id=$data["room_type_id"];
		$room->price=$data["price"];
		$room->capacity=$data["capacity"];
		$room->status_id=$data["status_id"];
		$room->created_at=$now;
		$room->updated_at=$now;

		$room->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("Room");
	}
	public function delete($id){
		Room::delete($id);
		redirect();
	}
	public function show($id){
		view("Room",Room::find($id));
	}
}
?>
