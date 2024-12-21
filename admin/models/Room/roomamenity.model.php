<?php
class RoomAmenity extends Model implements JsonSerializable{
	public $id;
	public $room_id;
	public $amenity_id;
	public $created_at;

	public function __construct(){
	}
	public function set($id,$room_id,$amenity_id,$created_at){
		$this->id=$id;
		$this->room_id=$room_id;
		$this->amenity_id=$amenity_id;
		$this->created_at=$created_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}room_amenities(room_id,amenity_id,created_at)values('$this->room_id','$this->amenity_id','$this->created_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}room_amenities set room_id='$this->room_id',amenity_id='$this->amenity_id',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}room_amenities where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,room_id,amenity_id,created_at from {$tx}room_amenities");
		$data=[];
		while($roomamenity=$result->fetch_object()){
			$data[]=$roomamenity;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,room_id,amenity_id,created_at from {$tx}room_amenities $criteria limit $top,$perpage");
		$data=[];
		while($roomamenity=$result->fetch_object()){
			$data[]=$roomamenity;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}room_amenities $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,room_id,amenity_id,created_at from {$tx}room_amenities where id='$id'");
		$roomamenity=$result->fetch_object();
			return $roomamenity;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}room_amenities");
		$roomamenity =$result->fetch_object();
		return $roomamenity->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Room Id:$this->room_id<br> 
		Amenity Id:$this->amenity_id<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbRoomAmenity"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}room_amenities");
		while($roomamenity=$result->fetch_object()){
			$html.="<option value ='$roomamenity->id'>$roomamenity->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}room_amenities $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,room_id,amenity_id,created_at from {$tx}room_amenities $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"roomamenity/create","text"=>"New RoomAmenity"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Room Id</th><th>Amenity</th><th>Created At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Room Id</th><th>Amenity Id</th><th>Created At</th></tr>";
		}
		while($roomamenity=$result->fetch_object()){
			$action_buttons = "";
			$amenity = Amenity::find($roomamenity->amenity_id);
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"roomamenity/show/$roomamenity->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"roomamenity/edit/$roomamenity->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"roomamenity/confirm/$roomamenity->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$roomamenity->id</td><td>$roomamenity->room_id</td><td>$amenity->name</td><td>$roomamenity->created_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,room_id,amenity_id,created_at from {$tx}room_amenities where id={$id}");
		$roomamenity=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">RoomAmenity Show</th></tr>";
		$html.="<tr><th>Id</th><td>$roomamenity->id</td></tr>";
		$html.="<tr><th>Room Id</th><td>$roomamenity->room_id</td></tr>";
		$html.="<tr><th>Amenity Id</th><td>$roomamenity->amenity_id</td></tr>";
		$html.="<tr><th>Created At</th><td>$roomamenity->created_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
