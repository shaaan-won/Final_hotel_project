<?php
class PaymentController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["booking_id"])){
		$errors["booking_id"]="Invalid booking_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["amount"])){
		$errors["amount"]="Invalid amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_method_id"])){
		$errors["payment_method_id"]="Invalid payment_method_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_statuse_id"])){
		$errors["payment_statuse_id"]="Invalid payment_statuse_id";
	}

*/		global $now;
		if(count($errors)==0){
			$payment=new Payment();
		$payment->customer_id=$data["customer_id"];
		$payment->booking_id=$data["booking_id"];
		$payment->amount=$data["amount"];
		$payment->payment_method_id=$data["payment_method_id"];
		$payment->payment_statuse_id=$data["payment_statuse_id"];
		$payment->created_at=$now;

			$payment->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Payment",Payment::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["booking_id"])){
		$errors["booking_id"]="Invalid booking_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["amount"])){
		$errors["amount"]="Invalid amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_method_id"])){
		$errors["payment_method_id"]="Invalid payment_method_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_statuse_id"])){
		$errors["payment_statuse_id"]="Invalid payment_statuse_id";
	}

*/		global $now;
		if(count($errors)==0){
			$payment=new Payment();
			$payment->id=$data["id"];
		$payment->customer_id=$data["customer_id"];
		$payment->booking_id=$data["booking_id"];
		$payment->amount=$data["amount"];
		$payment->payment_method_id=$data["payment_method_id"];
		$payment->payment_statuse_id=$data["payment_statuse_id"];
		$payment->created_at=$now;

		$payment->update();
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
		Payment::delete($id);
		redirect();
	}
	public function show($id){
		view("Payment",Payment::find($id));
	}
}
?>
