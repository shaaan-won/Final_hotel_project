<?php
class StaffController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["staff_role_id"])){
		$errors["staff_role_id"]="Invalid staff_role_id";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$data["phone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!preg_match("/^[\s\S]+$/",$data["address"])){
		$errors["address"]="Invalid address";
	}
	if(!preg_match("/^[\s\S]+$/",$data["work_schedule_id"])){
		$errors["work_schedule_id"]="Invalid work_schedule_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["hired_date"])){
		$errors["hired_date"]="Invalid hired_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["performance_score"])){
		$errors["performance_score"]="Invalid performance_score";
	}

*/		global $now;
		if(count($errors)==0){
			$staff=new Staff();
		$staff->name=$data["name"];
		$staff->staff_role_id=$data["staff_role_id"];
		$staff->email=$data["email"];
		$staff->phone=$data["phone"];
		$staff->address=$data["address"];
		$staff->work_schedule_id=$data["work_schedule_id"];
		$staff->hired_date=$data["hired_date"];
		$staff->performance_score=$data["performance_score"];
		$staff->created_at=$now;
		$staff->updated_at=$now;

			$staff->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Staff",Staff::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["staff_role_id"])){
		$errors["staff_role_id"]="Invalid staff_role_id";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$data["phone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!preg_match("/^[\s\S]+$/",$data["address"])){
		$errors["address"]="Invalid address";
	}
	if(!preg_match("/^[\s\S]+$/",$data["work_schedule_id"])){
		$errors["work_schedule_id"]="Invalid work_schedule_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["hired_date"])){
		$errors["hired_date"]="Invalid hired_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["performance_score"])){
		$errors["performance_score"]="Invalid performance_score";
	}

*/		global $now;
		if(count($errors)==0){
			$staff=new Staff();
			$staff->id=$data["id"];
		$staff->name=$data["name"];
		$staff->staff_role_id=$data["staff_role_id"];
		$staff->email=$data["email"];
		$staff->phone=$data["phone"];
		$staff->address=$data["address"];
		$staff->work_schedule_id=$data["work_schedule_id"];
		$staff->hired_date=$data["hired_date"];
		$staff->performance_score=$data["performance_score"];
		$staff->created_at=$now;
		$staff->updated_at=$now;

		$staff->update();
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
		Staff::delete($id);
		redirect();
	}
	public function show($id){
		view("Staff",Staff::find($id));
	}
}
?>
