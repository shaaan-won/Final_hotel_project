<?php
class BookingApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["bookings"=>Booking::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["bookings"=>Booking::pagination($page,$perpage),"total_records"=>Booking::count()]);
	}
	function find($data){
		echo json_encode(["booking"=>Booking::find($data["customer_id"])]);
	}
	function find_by_customer($data){
		echo json_encode(["booking"=>Booking::find_by_customer($data["customer_id"])]);
	}
	function delete($data){
		Booking::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$booking=new Booking();
		$booking->customer_id=$data["customer_id"];
		$booking->room_id=$data["room_id"];
		$booking->check_in_date=$data["check_in_date"];
		$booking->check_out_date=$data["check_out_date"];
		$booking->status_id=$data["status_id"];

		$booking->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		global $now;
		$booking=new Booking();
		$booking->id=$data["id"];
		$booking->customer_id=$data["customer_id"];
		$booking->room_id=$data["room_id"];
		$booking->check_in_date=$data["check_in_date"];
		$booking->check_out_date=$data["check_out_date"];
		$booking->status_id=$data["status_id"];
		$booking->updated_at=$now;

		$booking->update();
		echo json_encode(["success" => "yes"]);
	}
	function check_availability($data){
		$capacity=$data["capacity"];
		$room_type=$data["room_type"];
		$checkin=$data["checkin"];
		$checkout=$data["checkout"];

		// echo json_encode(["available_rooms"=>Booking::check_availability($capacity,$room_type,$checkin,$checkout)]);
	}
}
?>
