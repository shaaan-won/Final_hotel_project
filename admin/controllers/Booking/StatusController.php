<?php
class StatusController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}

*/		global $now;
		if(count($errors)==0){
			$status=new Status();
		$status->name=$data["name"];
		$status->created_at=$now;

			$status->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Booking",Status::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}

*/		global $now;
		if(count($errors)==0){
			$status=new Status();
			$status->id=$data["id"];
		$status->name=$data["name"];
		$status->created_at=$now;

		$status->update();
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
		Status::delete($id);
		redirect();
	}
	public function show($id){
		view("Booking",Status::find($id));
	}
}
?>
