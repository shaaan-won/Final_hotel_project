<?php
class RoomAmenityDetailController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("RoomService_Order");
	}
	public function create(){
		view("RoomService_Order");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["room_amenity_id"])){
		$errors["room_amenity_id"]="Invalid room_amenity_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["room_id"])){
		$errors["room_id"]="Invalid room_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["amenity_id"])){
		$errors["amenity_id"]="Invalid amenity_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["quantity"])){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["price"])){
		$errors["price"]="Invalid price";
	}

*/		global $now;
		if(count($errors)==0){
			$roomamenitydetail=new RoomAmenityDetail();
		$roomamenitydetail->room_amenity_id=$data["room_amenity_id"];
		$roomamenitydetail->customer_id=$data["customer_id"];
		$roomamenitydetail->room_id=$data["room_id"];
		$roomamenitydetail->amenity_id=$data["amenity_id"];
		$roomamenitydetail->quantity=$data["quantity"];
		$roomamenitydetail->price=$data["price"];
		$roomamenitydetail->created_at=$now;
		$roomamenitydetail->updated_at=$now;

			$roomamenitydetail->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("RoomService_Order",RoomAmenityDetail::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["room_amenity_id"])){
		$errors["room_amenity_id"]="Invalid room_amenity_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["room_id"])){
		$errors["room_id"]="Invalid room_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["amenity_id"])){
		$errors["amenity_id"]="Invalid amenity_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["quantity"])){
		$errors["quantity"]="Invalid quantity";
	}
	if(!preg_match("/^[\s\S]+$/",$data["price"])){
		$errors["price"]="Invalid price";
	}

*/		global $now;
		if(count($errors)==0){
			$roomamenitydetail=new RoomAmenityDetail();
			$roomamenitydetail->id=$data["id"];
		$roomamenitydetail->room_amenity_id=$data["room_amenity_id"];
		$roomamenitydetail->customer_id=$data["customer_id"];
		$roomamenitydetail->room_id=$data["room_id"];
		$roomamenitydetail->amenity_id=$data["amenity_id"];
		$roomamenitydetail->quantity=$data["quantity"];
		$roomamenitydetail->price=$data["price"];
		$roomamenitydetail->created_at=$now;
		$roomamenitydetail->updated_at=$now;

		$roomamenitydetail->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("RoomService_Order");
	}
	public function delete($id){
		RoomAmenityDetail::delete($id);
		redirect();
	}
	public function show($id){
		view("RoomService_Order",RoomAmenityDetail::find($id));
	}
}
?>
