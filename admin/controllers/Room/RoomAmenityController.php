<?php
class RoomAmenityController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["amenity_id"])){
		$errors["amenity_id"]="Invalid amenity_id";
	}

*/		global $now;
		if(count($errors)==0){
			$roomamenity=new RoomAmenity();
		$roomamenity->room_id=$data["room_id"];
		$roomamenity->amenity_id=$data["amenity_id"];
		$roomamenity->created_at=$now;

			$roomamenity->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Room",RoomAmenity::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["room_id"])){
		$errors["room_id"]="Invalid room_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["amenity_id"])){
		$errors["amenity_id"]="Invalid amenity_id";
	}

*/		global $now;
		if(count($errors)==0){
			$roomamenity=new RoomAmenity();
			$roomamenity->id=$data["id"];
		$roomamenity->room_id=$data["room_id"];
		$roomamenity->amenity_id=$data["amenity_id"];
		$roomamenity->created_at=$now;

		$roomamenity->update();
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
		RoomAmenity::delete($id);
		redirect();
	}
	public function show($id){
		view("Room",RoomAmenity::find($id));
	}
}
?>
