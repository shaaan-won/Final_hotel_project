<?php
class RoomMaintenanceController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["room_id"])){
		$errors["room_id"]="Invalid room_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["description"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status_id"])){
		$errors["status_id"]="Invalid status_id";
	}

*/		global $now;
		if(count($errors)==0){
			$roommaintenance=new RoomMaintenance();
		$roommaintenance->room_id=$data["room_id"];
		$roommaintenance->description=$data["description"];
		$roommaintenance->status_id=$data["status_id"];
		$roommaintenance->created_at=$now;
		$roommaintenance->updated_at=$now;

			$roommaintenance->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Room",RoomMaintenance::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["room_id"])){
		$errors["room_id"]="Invalid room_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["description"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status_id"])){
		$errors["status_id"]="Invalid status_id";
	}

*/			global $now;
		if(count($errors)==0){
			$roommaintenance=new RoomMaintenance();
			$roommaintenance->id=$data["id"];
		$roommaintenance->room_id=$data["room_id"];
		$roommaintenance->description=$data["description"];
		$roommaintenance->status_id=$data["status_id"];
		$roommaintenance->created_at=$now;
		$roommaintenance->updated_at=$now;

		$roommaintenance->update();
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
		RoomMaintenance::delete($id);
		redirect();
	}
	public function show($id){
		view("Room",RoomMaintenance::find($id));
	}
}
?>
