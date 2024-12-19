<?php
class RoomTypeController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["photo"])){
		$errors["photo"]="Invalid photo";
	}

*/		global $now;
		if(count($errors)==0){
			$roomtype=new RoomType();
		$roomtype->name=$data["name"];
		$roomtype->description=$data["description"];
		$roomtype->photo=File::upload($file["photo"], "img",$data["id"]);
		$roomtype->created_at=$now;

			$roomtype->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Room",RoomType::find($id));
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
	if(!preg_match("/^[\s\S]+$/",$data["photo"])){
		$errors["photo"]="Invalid photo";
	}

*/		global $now;
		if(count($errors)==0){
			$roomtype=new RoomType();
			$roomtype->id=$data["id"];
		$roomtype->name=$data["name"];
		$roomtype->description=$data["description"];
		if($file["photo"]["name"]!=""){
			$roomtype->photo=File::upload($file["photo"], "img",$data["id"]);
		}else{
			$roomtype->photo=RoomType::find($data["id"])->photo;
		}
		$roomtype->created_at=$now;

		$roomtype->update();
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
		RoomType::delete($id);
		redirect();
	}
	public function show($id){
		view("Room",RoomType::find($id));
	}
}
?>
