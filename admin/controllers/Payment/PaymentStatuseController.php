<?php
class PaymentStatuseController extends Controller{
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
			$paymentstatuse=new PaymentStatuse();
		$paymentstatuse->name=$data["name"];
		$paymentstatuse->created_at=$now;

			$paymentstatuse->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Payment",PaymentStatuse::find($id));
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
			$paymentstatuse=new PaymentStatuse();
			$paymentstatuse->id=$data["id"];
		$paymentstatuse->name=$data["name"];
		$paymentstatuse->created_at=$now;

		$paymentstatuse->update();
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
		PaymentStatuse::delete($id);
		redirect();
	}
	public function show($id){
		view("Payment",PaymentStatuse::find($id));
	}
}
?>
