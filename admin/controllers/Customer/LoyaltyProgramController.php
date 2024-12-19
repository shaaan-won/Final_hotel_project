<?php
class LoyaltyProgramController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("Customer");
	}
	public function create(){
		view("Customer");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["points"])){
		$errors["points"]="Invalid points";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtMembershipLevel"])){
		$errors["membership_level"]="Invalid membership_level";
	}

*/		global $now;
		if(count($errors)==0){
			$loyaltyprogram=new LoyaltyProgram();
		$loyaltyprogram->customer_id=$data["customer_id"];
		$loyaltyprogram->points=$data["points"];
		$loyaltyprogram->membership_level=$data["membership_level"];
		$loyaltyprogram->created_at=$now;
		$loyaltyprogram->updated_at=$now;

			$loyaltyprogram->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Customer",LoyaltyProgram::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["points"])){
		$errors["points"]="Invalid points";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtMembershipLevel"])){
		$errors["membership_level"]="Invalid membership_level";
	}

*/		global $now;
		if(count($errors)==0){
			$loyaltyprogram=new LoyaltyProgram();
			$loyaltyprogram->id=$data["id"];
		$loyaltyprogram->customer_id=$data["customer_id"];
		$loyaltyprogram->points=$data["points"];
		$loyaltyprogram->membership_level=$data["membership_level"];
		$loyaltyprogram->created_at=$now;
		$loyaltyprogram->updated_at=$now;

		$loyaltyprogram->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("Customer");
	}
	public function delete($id){
		LoyaltyProgram::delete($id);
		redirect();
	}
	public function show($id){
		view("Customer",LoyaltyProgram::find($id));
	}
}
?>
