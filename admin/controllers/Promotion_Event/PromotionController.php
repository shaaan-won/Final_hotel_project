<?php
class PromotionController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("Promotion_Event");
	}
	public function create(){
		view("Promotion_Event");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["description"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount_percentage"])){
		$errors["discount_percentage"]="Invalid discount_percentage";
	}
	if(!preg_match("/^[\s\S]+$/",$data["start_date"])){
		$errors["start_date"]="Invalid start_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["end_date"])){
		$errors["end_date"]="Invalid end_date";
	}

*/		global $now;
		if(count($errors)==0){
			$promotion=new Promotion();
		$promotion->name=$data["name"];
		$promotion->description=$data["description"];
		$promotion->discount_percentage=$data["discount_percentage"];
		$promotion->start_date=$data["start_date"];
		$promotion->end_date=$data["end_date"];
		$promotion->created_at=$now;
		$promotion->updated_at=$now;

			$promotion->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Promotion_Event",Promotion::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$data["description"])){
		$errors["description"]="Invalid description";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount_percentage"])){
		$errors["discount_percentage"]="Invalid discount_percentage";
	}
	if(!preg_match("/^[\s\S]+$/",$data["start_date"])){
		$errors["start_date"]="Invalid start_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["end_date"])){
		$errors["end_date"]="Invalid end_date";
	}

*/		global $now;
		if(count($errors)==0){
			$promotion=new Promotion();
			$promotion->id=$data["id"];
		$promotion->name=$data["name"];
		$promotion->description=$data["description"];
		$promotion->discount_percentage=$data["discount_percentage"];
		$promotion->start_date=$data["start_date"];
		$promotion->end_date=$data["end_date"];
		$promotion->created_at=$now;
		$promotion->updated_at=$now;

		$promotion->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("Promotion_Event");
	}
	public function delete($id){
		Promotion::delete($id);
		redirect();
	}
	public function show($id){
		view("Promotion_Event",Promotion::find($id));
	}
}
?>
