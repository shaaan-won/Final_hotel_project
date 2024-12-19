<?php
class InvoiceController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_status_id"])){
		$errors["payment_status_id"]="Invalid payment_status_id";
	}

*/	global $now;
		if(count($errors)==0){
			$invoice=new Invoice();
		$invoice->customer_id=$data["customer_id"];
		$invoice->booking_id=$data["booking_id"];
		$invoice->total_amount=$data["total_amount"];
		$invoice->payment_status_id=$data["payment_status_id"];
		$invoice->created_at=$now;
		$invoice->updated_at=$now;

			$invoice->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Payment",Invoice::find($id));
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
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_status_id"])){
		$errors["payment_status_id"]="Invalid payment_status_id";
	}

*/	global $now;
		if(count($errors)==0){
			$invoice=new Invoice();
			$invoice->id=$data["id"];
		$invoice->customer_id=$data["customer_id"];
		$invoice->booking_id=$data["booking_id"];
		$invoice->total_amount=$data["total_amount"];
		$invoice->payment_status_id=$data["payment_status_id"];
		$invoice->created_at=$now;
		$invoice->updated_at=$now;

		$invoice->update();
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
		Invoice::delete($id);
		redirect();
	}
	public function show($id){
		view("Payment",Invoice::find($id));
	}
}
?>
