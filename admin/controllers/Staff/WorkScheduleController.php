<?php
class WorkScheduleController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("Staff");
	}
	public function create(){
		view("Staff");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["staff_id"])){
		$errors["staff_id"]="Invalid staff_id";
	}

*/		global $now;
		if(count($errors)==0){
			$workschedule=new WorkSchedule();
		$workschedule->staff_id=$data["staff_id"];
		$workschedule->start_time=date("Y-m-d",strtotime($data["start_time"]));
		$workschedule->end_time=date("Y-m-d",strtotime($data["end_time"]));
		$workschedule->created_at=$now;

			$workschedule->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Staff",WorkSchedule::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["staff_id"])){
		$errors["staff_id"]="Invalid staff_id";
	}

*/		global $now;
		if(count($errors)==0){
			$workschedule=new WorkSchedule();
			$workschedule->id=$data["id"];
		$workschedule->staff_id=$data["staff_id"];
		$workschedule->start_time=date("Y-m-d",strtotime($data["start_time"]));
		$workschedule->end_time=date("Y-m-d",strtotime($data["end_time"]));
		$workschedule->created_at=$now;

		$workschedule->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("Staff");
	}
	public function delete($id){
		WorkSchedule::delete($id);
		redirect();
	}
	public function show($id){
		view("Staff",WorkSchedule::find($id));
	}
}
?>
