<?php
class HotelEventController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("Promotion_Event");
	}
	public function create(){
		view("Promotion_Event");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["event_date"])){
		$errors["event_date"]="Invalid event_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["event_time"])){
		$errors["event_time"]="Invalid event_time";
	}
	if(!preg_match("/^[\s\S]+$/",$data["location"])){
		$errors["location"]="Invalid location";
	}
	if(!preg_match("/^[\s\S]+$/",$data["attendees"])){
		$errors["attendees"]="Invalid attendees";
	}

*/			global $now;
		if(count($errors)==0){
			$hotelevent=new HotelEvent();
		$hotelevent->name=$data["name"];
		$hotelevent->customer_id=$data["customer_id"];
		$hotelevent->event_date=$data["event_date"];
		$hotelevent->event_time=$data["event_time"];
		$hotelevent->location=$data["location"];
		$hotelevent->attendees=$data["attendees"];
		$hotelevent->created_at=$now;
		$hotelevent->updated_at=$now;

			$hotelevent->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Promotion_Event",HotelEvent::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["event_date"])){
		$errors["event_date"]="Invalid event_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["event_time"])){
		$errors["event_time"]="Invalid event_time";
	}
	if(!preg_match("/^[\s\S]+$/",$data["location"])){
		$errors["location"]="Invalid location";
	}
	if(!preg_match("/^[\s\S]+$/",$data["attendees"])){
		$errors["attendees"]="Invalid attendees";
	}

*/			global $now;
		if(count($errors)==0){
			$hotelevent=new HotelEvent();
			$hotelevent->id=$data["id"];
		$hotelevent->name=$data["name"];
		$hotelevent->customer_id=$data["customer_id"];
		$hotelevent->event_date=$data["event_date"];
		$hotelevent->event_time=$data["event_time"];
		$hotelevent->location=$data["location"];
		$hotelevent->attendees=$data["attendees"];
		$hotelevent->created_at=$now;
		$hotelevent->updated_at=$now;

		$hotelevent->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("Promotion_Event");
	}
	public function delete($id){
		HotelEvent::delete($id);
		redirect();
	}
	public function show($id){
		view("Promotion_Event",HotelEvent::find($id));
	}
}
?>
