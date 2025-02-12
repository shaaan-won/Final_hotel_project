<?php
class RoomServiceRequestController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["room_id"])){
		$errors["room_id"]="Invalid room_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRequestType"])){
		$errors["request_type"]="Invalid request_type";
	}
	if(!preg_match("/^[\s\S]+$/",$data["request_description"])){
		$errors["request_description"]="Invalid request_description";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status_id"])){
		$errors["status_id"]="Invalid status_id";
	}

*/		global $now;
		if(count($errors)==0){
			$roomservicerequest=new RoomServiceRequest();
		$roomservicerequest->user_id=$data["user_id"];
		$roomservicerequest->room_id=$data["room_id"];
		$roomservicerequest->customer_id=$data["customer_id"];
		$roomservicerequest->request_type=$data["request_type"];
		$roomservicerequest->request_description=$data["request_description"];
		$roomservicerequest->status_id=$data["status_id"];
		$roomservicerequest->created_at=$now;
		$roomservicerequest->updated_at=$now;

			$roomservicerequest->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Room",RoomServiceRequest::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["room_id"])){
		$errors["room_id"]="Invalid room_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtRequestType"])){
		$errors["request_type"]="Invalid request_type";
	}
	if(!preg_match("/^[\s\S]+$/",$data["request_description"])){
		$errors["request_description"]="Invalid request_description";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status_id"])){
		$errors["status_id"]="Invalid status_id";
	}

*/		global $now;
		if(count($errors)==0){
			$roomservicerequest=new RoomServiceRequest();
			$roomservicerequest->id=$data["id"];
		$roomservicerequest->user_id=$data["user_id"];
		$roomservicerequest->room_id=$data["room_id"];
		$roomservicerequest->customer_id=$data["customer_id"];
		$roomservicerequest->request_type=$data["request_type"];
		$roomservicerequest->request_description=$data["request_description"];
		$roomservicerequest->status_id=$data["status_id"];
		$roomservicerequest->created_at=$now;
		$roomservicerequest->updated_at=$now;

		$roomservicerequest->update();
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
		RoomServiceRequest::delete($id);
		redirect();
	}
	public function show($id){
		view("Room",RoomServiceRequest::find($id));
	}
}
?>
