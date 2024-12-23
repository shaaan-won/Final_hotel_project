<?php
class CheckinCheckoutApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["checkin_checkouts"=>CheckinCheckout::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["checkin_checkouts"=>CheckinCheckout::pagination($page,$perpage),"total_records"=>CheckinCheckout::count()]);
	}
	function find($data){
		echo json_encode(["checkincheckout"=>CheckinCheckout::find($data["id"])]);
	}
	function delete($data){
		CheckinCheckout::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$checkincheckout=new CheckinCheckout();
		$checkincheckout->room_id=$data["room_id"];
		$checkincheckout->check_in_date=$data["check_in_date"];
		$checkincheckout->check_out_date=$data["check_out_date"];
		$checkincheckout->notes=$data["notes"];

		$checkincheckout->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		global $now;
		$checkincheckout=new CheckinCheckout();
		$checkincheckout->id=$data["id"];
		$checkincheckout->room_id=$data["room_id"];
		$checkincheckout->check_in_date=$data["check_in_date"];
		$checkincheckout->check_out_date=$data["check_out_date"];
		$checkincheckout->notes=$data["notes"];
		$checkincheckout->updated_at=$now;

		$checkincheckout->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
