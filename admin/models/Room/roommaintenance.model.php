<?php
class RoomMaintenance extends Model implements JsonSerializable{
	public $id;
	public $room_id;
	public $description;
	public $status_id;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$room_id,$description,$status_id,$created_at,$updated_at){
		$this->id=$id;
		$this->room_id=$room_id;
		$this->description=$description;
		$this->status_id=$status_id;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}room_maintenance(room_id,description,status_id,created_at,updated_at)values('$this->room_id','$this->description','$this->status_id','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}room_maintenance set room_id='$this->room_id',description='$this->description',status_id='$this->status_id',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}room_maintenance where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,room_id,description,status_id,created_at,updated_at from {$tx}room_maintenance");
		$data=[];
		while($roommaintenance=$result->fetch_object()){
			$data[]=$roommaintenance;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,room_id,description,status_id,created_at,updated_at from {$tx}room_maintenance $criteria limit $top,$perpage");
		$data=[];
		while($roommaintenance=$result->fetch_object()){
			$data[]=$roommaintenance;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}room_maintenance $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,room_id,description,status_id,created_at,updated_at from {$tx}room_maintenance where id='$id'");
		$roommaintenance=$result->fetch_object();
			return $roommaintenance;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}room_maintenance");
		$roommaintenance =$result->fetch_object();
		return $roommaintenance->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Room Id:$this->room_id<br> 
		Description:$this->description<br> 
		Status Id:$this->status_id<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbRoomMaintenance"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}room_maintenance");
		while($roommaintenance=$result->fetch_object()){
			$html.="<option value ='$roommaintenance->id'>$roommaintenance->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}room_maintenance $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,room_id,description,status_id,created_at,updated_at from {$tx}room_maintenance $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"roommaintenance/create","text"=>"New RoomMaintenance"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Room Number</th><th>Description</th><th>Status Id</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Room Id</th><th>Description</th><th>Status Id</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($roommaintenance=$result->fetch_object()){
			$action_buttons = "";
			$room_number = Room::find($roommaintenance->room_id);
			$status = Status::find($roommaintenance->status_id);
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"roommaintenance/show/$roommaintenance->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"roommaintenance/edit/$roommaintenance->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"roommaintenance/confirm/$roommaintenance->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$roommaintenance->id</td><td>$room_number->room_number</td><td>$roommaintenance->description</td><td>$status->name</td><td>$roommaintenance->created_at</td><td>$roommaintenance->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,room_id,description,status_id,created_at,updated_at from {$tx}room_maintenance where id={$id}");
		$roommaintenance=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">RoomMaintenance Show</th></tr>";
		$html.="<tr><th>Id</th><td>$roommaintenance->id</td></tr>";
		$html.="<tr><th>Room Id</th><td>$roommaintenance->room_id</td></tr>";
		$html.="<tr><th>Description</th><td>$roommaintenance->description</td></tr>";
		$html.="<tr><th>Status Id</th><td>$roommaintenance->status_id</td></tr>";
		$html.="<tr><th>Created At</th><td>$roommaintenance->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$roommaintenance->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
