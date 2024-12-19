<?php
class CustomerController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtFirstName"])){
		$errors["first_name"]="Invalid first_name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtLastName"])){
		$errors["last_name"]="Invalid last_name";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$data["phone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!preg_match("/^[\s\S]+$/",$data["id_card_type_id"])){
		$errors["id_card_type_id"]="Invalid id_card_type_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["id_card_number"])){
		$errors["id_card_number"]="Invalid id_card_number";
	}
	if(!preg_match("/^[\s\S]+$/",$data["address"])){
		$errors["address"]="Invalid address";
	}

*/	global $now;
		if(count($errors)==0){
			$customer=new Customer();
		$customer->name=$data["name"];
		$customer->first_name=$data["first_name"];
		$customer->last_name=$data["last_name"];
		$customer->email=$data["email"];
		$customer->phone=$data["phone"];
		$customer->id_card_type_id=$data["id_card_type_id"];
		$customer->id_card_number=$data["id_card_number"];
		$customer->address=$data["address"];
		$customer->created_at=$now;
		$customer->updated_at=$now;

			$customer->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Customer",Customer::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtFirstName"])){
		$errors["first_name"]="Invalid first_name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtLastName"])){
		$errors["last_name"]="Invalid last_name";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$data["phone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!preg_match("/^[\s\S]+$/",$data["id_card_type_id"])){
		$errors["id_card_type_id"]="Invalid id_card_type_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["id_card_number"])){
		$errors["id_card_number"]="Invalid id_card_number";
	}
	if(!preg_match("/^[\s\S]+$/",$data["address"])){
		$errors["address"]="Invalid address";
	}

*/	global $now;
		if(count($errors)==0){
			$customer=new Customer();
			$customer->id=$data["id"];
		$customer->name=$data["name"];
		$customer->first_name=$data["first_name"];
		$customer->last_name=$data["last_name"];
		$customer->email=$data["email"];
		$customer->phone=$data["phone"];
		$customer->id_card_type_id=$data["id_card_type_id"];
		$customer->id_card_number=$data["id_card_number"];
		$customer->address=$data["address"];
		$customer->created_at=$now;
		$customer->updated_at=$now;

		$customer->update();
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
		Customer::delete($id);
		redirect();
	}
	public function show($id){
		view("Customer",Customer::find($id));
	}
}
?>
