<?php
class RoomTypeApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["room_types"=>RoomType::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["room_types"=>RoomType::pagination($page,$perpage),"total_records"=>RoomType::count()]);
	}
	function find($data){
		echo json_encode(["roomtype"=>RoomType::find($data["id"])]);
	}
	function delete($data){
		RoomType::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$roomtype=new RoomType();
		$roomtype->name=$data["name"];
		$roomtype->description=$data["description"];
		$roomtype->photo=upload($file["photo"], "../img",$data["name"]);

		$roomtype->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$roomtype=new RoomType();
		$roomtype->id=$data["id"];
		$roomtype->name=$data["name"];
		$roomtype->description=$data["description"];
		if(isset($file["photo"]["name"])){
			$roomtype->photo=upload($file["photo"], "../img",$data["name"]);
		}else{
			$roomtype->photo=RoomType::find($data["id"])->photo;
		}

		$roomtype->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
