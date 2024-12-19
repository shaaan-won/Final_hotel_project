<?php
class StaffRoleController extends Controller{
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

*/		global $now;
		if(count($errors)==0){
			$staffrole=new StaffRole();
		$staffrole->name=$data["name"];
		$staffrole->created_at=$now;

			$staffrole->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Staff",StaffRole::find($id));
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
			$staffrole=new StaffRole();
			$staffrole->id=$data["id"];
		$staffrole->name=$data["name"];
		$staffrole->created_at=$now;

		$staffrole->update();
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
		StaffRole::delete($id);
		redirect();
	}
	public function show($id){
		view("Staff",StaffRole::find($id));
	}
}
?>
