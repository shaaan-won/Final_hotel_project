<?php
class PaymentMethodController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("Payment");
	}
	public function create(){
		view("Payment");
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
			$paymentmethod=new PaymentMethod();
		$paymentmethod->name=$data["name"];
		$paymentmethod->created_at=$now;

			$paymentmethod->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Payment",PaymentMethod::find($id));
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
			$paymentmethod=new PaymentMethod();
			$paymentmethod->id=$data["id"];
		$paymentmethod->name=$data["name"];
		$paymentmethod->created_at=$now;

		$paymentmethod->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("Payment");
	}
	public function delete($id){
		PaymentMethod::delete($id);
		redirect();
	}
	public function show($id){
		view("Payment",PaymentMethod::find($id));
	}
}
?>
