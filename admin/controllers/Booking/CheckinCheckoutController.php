<?php
class CheckinCheckoutController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["booking_id"])){
		$errors["booking_id"]="Invalid booking_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["notes"])){
		$errors["notes"]="Invalid notes";
	}

*/global $now;
		if(count($errors)==0){
			$checkincheckout=new CheckinCheckout();
		$checkincheckout->booking_id=$data["booking_id"];
		$checkincheckout->check_in_date=date("Y-m-d",strtotime($data["check_in_date"]));
		$checkincheckout->check_out_date=date("Y-m-d",strtotime($data["check_out_date"]));
		$checkincheckout->notes=$data["notes"];
		$checkincheckout->created_at=$now;
		$checkincheckout->updated_at=$now;

			$checkincheckout->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Booking",CheckinCheckout::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["booking_id"])){
		$errors["booking_id"]="Invalid booking_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["notes"])){
		$errors["notes"]="Invalid notes";
	}

*/	global $now;
		if(count($errors)==0){
			$checkincheckout=new CheckinCheckout();
			$checkincheckout->id=$data["id"];
		$checkincheckout->booking_id=$data["booking_id"];
		$checkincheckout->check_in_date=date("Y-m-d",strtotime($data["check_in_date"]));
		$checkincheckout->check_out_date=date("Y-m-d",strtotime($data["check_out_date"]));
		$checkincheckout->notes=$data["notes"];
		$checkincheckout->created_at=$now;
		$checkincheckout->updated_at=$now;

		$checkincheckout->update();
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
		CheckinCheckout::delete($id);
		redirect();
	}
	public function show($id){
		view("Booking",CheckinCheckout::find($id));
	}
}
?>
