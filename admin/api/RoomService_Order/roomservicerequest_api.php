<?php
class RoomServiceRequestApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["room_service_requests"=>RoomServiceRequest::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["room_service_requests"=>RoomServiceRequest::pagination($page,$perpage),"total_records"=>RoomServiceRequest::count()]);
	}
	function find($data){
		echo json_encode(["roomservicerequest"=>RoomServiceRequest::find($data["id"])]);
	}
	function delete($data){
		RoomServiceRequest::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$roomservicerequest=new RoomServiceRequest();
		$roomservicerequest->user_id=$data["user_id"];
		$roomservicerequest->room_id=$data["room_id"];
		$roomservicerequest->customer_id=$data["customer_id"];
		$roomservicerequest->request_type=$data["request_type"];
		$roomservicerequest->request_description=$data["request_description"];
		$roomservicerequest->status_id=$data["status_id"];

		$roomservicerequest->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		global $now;
		$roomservicerequest=new RoomServiceRequest();
		$roomservicerequest->id=$data["id"];
		$roomservicerequest->user_id=$data["user_id"];
		$roomservicerequest->room_id=$data["room_id"];
		$roomservicerequest->customer_id=$data["customer_id"];
		$roomservicerequest->request_type=$data["request_type"];
		$roomservicerequest->request_description=$data["request_description"];
		$roomservicerequest->status_id=$data["status_id"];
		$roomservicerequest->updated_at=$now;

		$roomservicerequest->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
