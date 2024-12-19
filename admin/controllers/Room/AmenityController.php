<?php
class AmenityController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("Room");
	}
	public function create(){
		view("Room");
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

*/		global $now;
		if(count($errors)==0){
			$amenity=new Amenity();
		$amenity->name=$data["name"];
		$amenity->description=$data["description"];
		$amenity->created_at=$now;

			$amenity->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Room",Amenity::find($id));
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

*/		global $now;
		if(count($errors)==0){
			$amenity=new Amenity();
			$amenity->id=$data["id"];
		$amenity->name=$data["name"];
		$amenity->description=$data["description"];
		$amenity->created_at=$now;

		$amenity->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("Room");
	}
	public function delete($id){
		Amenity::delete($id);
		redirect();
	}
	public function show($id){
		view("Room",Amenity::find($id));
	}
}
?>
