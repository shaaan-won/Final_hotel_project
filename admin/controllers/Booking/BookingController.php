<?php
class BookingController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("Booking");
	}
	public function create(){
		view("Booking");
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
	if(!preg_match("/^[\s\S]+$/",$data["status_id"])){
		$errors["status_id"]="Invalid status_id";
	}
		
*/		global $now;
		if(count($errors)==0){
			$booking=new Booking();
		$booking->customer_id=$data["customer_id"];
		$booking->room_id=$data["room_id"];
		$booking->check_in_date=date("Y-m-d",strtotime($data["check_in_date"]));
		$booking->check_out_date=date("Y-m-d",strtotime($data["check_out_date"]));
		$booking->status_id=$data["status_id"];
		$booking->created_at=$now;
		$booking->updated_at=$now;

			$booking->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Booking",Booking::find($id));
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
	if(!preg_match("/^[\s\S]+$/",$data["status_id"])){
		$errors["status_id"]="Invalid status_id";
	}

*/		global $now;
		if(count($errors)==0){
			$booking=new Booking();
			$booking->id=$data["id"];
		$booking->customer_id=$data["customer_id"];
		$booking->room_id=$data["room_id"];
		$booking->check_in_date=date("Y-m-d",strtotime($data["check_in_date"]));
		$booking->check_out_date=date("Y-m-d",strtotime($data["check_out_date"]));
		$booking->status_id=$data["status_id"];
		$booking->created_at=$now;
		$booking->updated_at=$now;

		$booking->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("Booking");
	}
	public function delete($id){
		Booking::delete($id);
		redirect();
	}
	public function show($id){
		view("Booking",Booking::find($id));
	}
}
?>
