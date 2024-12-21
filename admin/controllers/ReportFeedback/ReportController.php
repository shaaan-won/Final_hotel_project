<?php
class ReportController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("ReportFeedback");
	}
	public function create(){
		view("ReportFeedback");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtReportType"])){
		$errors["report_type"]="Invalid report_type";
	}
	if(!preg_match("/^[\s\S]+$/",$data["report_description"])){
		$errors["report_description"]="Invalid report_description";
	}

*/	    global $now;
		if(count($errors)==0){
			$report=new Report();
		$report->user_id=$data["user_id"];
		$report->report_type=$data["report_type"];
		$report->report_description=$data["report_description"];
		$report->created_at=$now;
		$report->updated_at=$now;

			$report->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("ReportFeedback",Report::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtReportType"])){
		$errors["report_type"]="Invalid report_type";
	}
	if(!preg_match("/^[\s\S]+$/",$data["report_description"])){
		$errors["report_description"]="Invalid report_description";
	}

*/	    global $now;
		if(count($errors)==0){
			$report=new Report();
			$report->id=$data["id"];
		$report->user_id=$data["user_id"];
		$report->report_type=$data["report_type"];
		$report->report_description=$data["report_description"];
		$report->created_at=$now;
		$report->updated_at=$now;

		$report->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("ReportFeedback");
	}
	public function delete($id){
		Report::delete($id);
		redirect();
	}
	public function show($id){
		view("ReportFeedback",Report::find($id));
	}
}
?>
