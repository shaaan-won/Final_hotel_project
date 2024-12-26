<?php
class RoomAmenityController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["room_id"])){
		$errors["room_id"]="Invalid room_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}

*/		global $now;
		if(count($errors)==0){
			$roomamenity=new RoomAmenity();
		$roomamenity->customer_id=$data["customer_id"];
		$roomamenity->room_id=$data["room_id"];
		$roomamenity->request_date=date("Y-m-d",strtotime($data["request_date"]));
		$roomamenity->total_amount=$data["total_amount"];
		$roomamenity->created_at=$now;
		$roomamenity->updated_at=$now;

			$roomamenity->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("RoomService_Order",RoomAmenity::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["room_id"])){
		$errors["room_id"]="Invalid room_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}

*/		global $now;
		if(count($errors)==0){
			$roomamenity=new RoomAmenity();
			$roomamenity->id=$data["id"];
		$roomamenity->customer_id=$data["customer_id"];
		$roomamenity->room_id=$data["room_id"];
		$roomamenity->request_date=date("Y-m-d",strtotime($data["request_date"]));
		$roomamenity->total_amount=$data["total_amount"];
		$roomamenity->created_at=$now;
		$roomamenity->updated_at=$now;

		$roomamenity->update();
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
		RoomAmenity::delete($id);
		redirect();
	}
	public function show($id){
		view("RoomService_Order",RoomAmenity::find($id));
	}
}
?>
