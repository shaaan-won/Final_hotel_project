<?php
class CustomerFeedbackController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("Report_Feedback");
	}
	public function create(){
		view("Report_Feedback");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["comments"])){
		$errors["comments"]="Invalid comments";
	}
	if(!preg_match("/^[\s\S]+$/",$data["rating"])){
		$errors["rating"]="Invalid rating";
	}

*/		global $now;
		if(count($errors)==0){
			$customerfeedback=new CustomerFeedback();
		$customerfeedback->user_id=$data["user_id"];
		$customerfeedback->comments=$data["comments"];
		$customerfeedback->rating=$data["rating"];
		$customerfeedback->created_at=$now;

			$customerfeedback->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Report_Feedback",CustomerFeedback::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["comments"])){
		$errors["comments"]="Invalid comments";
	}
	if(!preg_match("/^[\s\S]+$/",$data["rating"])){
		$errors["rating"]="Invalid rating";
	}

*/		global $now;
		if(count($errors)==0){
			$customerfeedback=new CustomerFeedback();
			$customerfeedback->id=$data["id"];
		$customerfeedback->user_id=$data["user_id"];
		$customerfeedback->comments=$data["comments"];
		$customerfeedback->rating=$data["rating"];
		$customerfeedback->created_at=$now;

		$customerfeedback->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("Report_Feedback");
	}
	public function delete($id){
		CustomerFeedback::delete($id);
		redirect();
	}
	public function show($id){
		view("Report_Feedback",CustomerFeedback::find($id));
	}
}
?>