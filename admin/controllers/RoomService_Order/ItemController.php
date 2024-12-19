<?php
class ItemController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("RoomService_Order");
	}
	public function create(){
		view("RoomService_Order");
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
	if(!preg_match("/^[\s\S]+$/",$data["price"])){
		$errors["price"]="Invalid price";
	}

*/		global $now;
		if(count($errors)==0){
			$item=new Item();
		$item->name=$data["name"];
		$item->description=$data["description"];
		$item->price=$data["price"];
		$item->created_at=$now;
		$item->updated_at=$now;

			$item->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("RoomService_Order",Item::find($id));
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
	if(!preg_match("/^[\s\S]+$/",$data["price"])){
		$errors["price"]="Invalid price";
	}

*/		global $now;
		if(count($errors)==0){
			$item=new Item();
			$item->id=$data["id"];
		$item->name=$data["name"];
		$item->description=$data["description"];
		$item->price=$data["price"];
		$item->created_at=$now;
		$item->updated_at=$now;

		$item->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("RoomService_Order");
	}
	public function delete($id){
		Item::delete($id);
		redirect();
	}
	public function show($id){
		view("RoomService_Order",Item::find($id));
	}
}
?>
