<?php
class StaffApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["staffs"=>Staff::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["staffs"=>Staff::pagination($page,$perpage),"total_records"=>Staff::count()]);
	}
	function find($data){
		echo json_encode(["staff"=>Staff::find($data["id"])]);
	}
	function delete($data){
		Staff::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$staff=new Staff();
		$staff->name=$data["name"];
		$staff->staff_role_id=$data["staff_role_id"];
		$staff->email=$data["email"];
		$staff->phone=$data["phone"];
		$staff->address=$data["address"];
		$staff->work_schedule_id=$data["work_schedule_id"];
		$staff->hired_date=$data["hired_date"];
		$staff->performance_score=$data["performance_score"];
		upload($file["image"],"../img/staff",$data["name"]);

		$staff->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		global $now;
		$staff=new Staff();
		$staff->id=$data["id"];
		$staff->name=$data["name"];
		$staff->staff_role_id=$data["staff_role_id"];
		$staff->email=$data["email"];
		$staff->phone=$data["phone"];
		$staff->address=$data["address"];
		$staff->work_schedule_id=$data["work_schedule_id"];
		$staff->hired_date=$data["hired_date"];
		$staff->performance_score=$data["performance_score"];
		$staff->updated_at=$now;

		$staff->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
