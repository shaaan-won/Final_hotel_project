<?php
class StaffPerformanceReviewController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("Staff");
	}
	public function create(){
		view("Staff");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["staff_id"])){
		$errors["staff_id"]="Invalid staff_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["review_date"])){
		$errors["review_date"]="Invalid review_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["review_score"])){
		$errors["review_score"]="Invalid review_score";
	}
	if(!preg_match("/^[\s\S]+$/",$data["review_comments"])){
		$errors["review_comments"]="Invalid review_comments";
	}

*/		global $now;
		if(count($errors)==0){
			$staffperformancereview=new StaffPerformanceReview();
		$staffperformancereview->staff_id=$data["staff_id"];
		$staffperformancereview->review_date=$data["review_date"];
		$staffperformancereview->review_score=$data["review_score"];
		$staffperformancereview->review_comments=$data["review_comments"];
		$staffperformancereview->created_at=$now;

			$staffperformancereview->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Staff",StaffPerformanceReview::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["staff_id"])){
		$errors["staff_id"]="Invalid staff_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["review_date"])){
		$errors["review_date"]="Invalid review_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["review_score"])){
		$errors["review_score"]="Invalid review_score";
	}
	if(!preg_match("/^[\s\S]+$/",$data["review_comments"])){
		$errors["review_comments"]="Invalid review_comments";
	}

*/		global $now;
		if(count($errors)==0){
			$staffperformancereview=new StaffPerformanceReview();
			$staffperformancereview->id=$data["id"];
		$staffperformancereview->staff_id=$data["staff_id"];
		$staffperformancereview->review_date=$data["review_date"];
		$staffperformancereview->review_score=$data["review_score"];
		$staffperformancereview->review_comments=$data["review_comments"];
		$staffperformancereview->created_at=$now;

		$staffperformancereview->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("Staff");
	}
	public function delete($id){
		StaffPerformanceReview::delete($id);
		redirect();
	}
	public function show($id){
		view("Staff",StaffPerformanceReview::find($id));
	}
}
?>
