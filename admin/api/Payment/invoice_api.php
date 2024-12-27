<?php
class InvoiceApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["invoices"=>Invoice::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["invoices"=>Invoice::pagination($page,$perpage),"total_records"=>Invoice::count()]);
	}
	function find($data){
		echo json_encode(["invoice"=>Invoice::find($data["id"])]);
	}
	function delete($data){
		Invoice::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$invoice=new Invoice();
		$invoice->customer_id=$data["customer_id"];
		$invoice->booking_id=$data["booking_id"];
		$invoice->order_id=$data["order_id"];
		$invoice->room_amenitie_id=$data["room_amenitie_id"];
		$invoice->total_amount=$data["total_amount"];
		$invoice->discount=$data["discount"];
		$invoice->tax=$data["tax"];
		$invoice->service_charges=$data["service_charges"];
		$invoice->cleaning_charges=$data["cleaning_charges"];
		$invoice->payment_status_id=$data["payment_status_id"];
		$invoice->amount_due=$data["amount_due"];

		$invoice->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		global $now;
		$invoice=new Invoice();
		$invoice->id=$data["id"];
		$invoice->customer_id=$data["customer_id"];
		$invoice->booking_id=$data["booking_id"];
		$invoice->order_id=$data["order_id"];
		$invoice->total_amount=$data["total_amount"];
		$invoice->discount=$data["discount"];
		$invoice->tax=$data["tax"];
		$invoice->room_amenitie_id=$data["room_amenitie_id"];
		$invoice->service_charges=$data["service_charges"];
		$invoice->cleaning_charges=$data["cleaning_charges"];
		$invoice->payment_status_id=$data["payment_status_id"];
		$invoice->amount_due=$data["amount_due"];
		$invoice->updated_at=$now;

		$invoice->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
