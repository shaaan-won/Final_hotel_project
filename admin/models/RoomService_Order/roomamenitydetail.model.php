<?php
class RoomAmenityDetail extends Model implements JsonSerializable{
	public $id;
	public $room_amenity_id;
	public $customer_id;
	public $room_id;
	public $amenity_id;
	public $quantity;
	public $price;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$room_amenity_id,$customer_id,$room_id,$amenity_id,$quantity,$price,$created_at,$updated_at){
		$this->id=$id;
		$this->room_amenity_id=$room_amenity_id;
		$this->customer_id=$customer_id;
		$this->room_id=$room_id;
		$this->amenity_id=$amenity_id;
		$this->quantity=$quantity;
		$this->price=$price;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}room_amenity_details(room_amenity_id,customer_id,room_id,amenity_id,quantity,price,created_at,updated_at)values('$this->room_amenity_id','$this->customer_id','$this->room_id','$this->amenity_id','$this->quantity','$this->price','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}room_amenity_details set room_amenity_id='$this->room_amenity_id',customer_id='$this->customer_id',room_id='$this->room_id',amenity_id='$this->amenity_id',quantity='$this->quantity',price='$this->price',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}room_amenity_details where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,room_amenity_id,customer_id,room_id,amenity_id,quantity,price,created_at,updated_at from {$tx}room_amenity_details");
		$data=[];
		while($roomamenitydetail=$result->fetch_object()){
			$data[]=$roomamenitydetail;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,room_amenity_id,customer_id,room_id,amenity_id,quantity,price,created_at,updated_at from {$tx}room_amenity_details $criteria limit $top,$perpage");
		$data=[];
		while($roomamenitydetail=$result->fetch_object()){
			$data[]=$roomamenitydetail;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}room_amenity_details $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,room_amenity_id,customer_id,room_id,amenity_id,quantity,price,created_at,updated_at from {$tx}room_amenity_details where id='$id'");
		$roomamenitydetail=$result->fetch_object();
			return $roomamenitydetail;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}room_amenity_details");
		$roomamenitydetail =$result->fetch_object();
		return $roomamenitydetail->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Room Amenity Id:$this->room_amenity_id<br> 
		Customer Id:$this->customer_id<br> 
		Room Id:$this->room_id<br> 
		Amenity Id:$this->amenity_id<br> 
		Quantity:$this->quantity<br> 
		Price:$this->price<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbRoomAmenityDetail"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}room_amenity_details");
		while($roomamenitydetail=$result->fetch_object()){
			$html.="<option value ='$roomamenitydetail->id'>$roomamenitydetail->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}room_amenity_details $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,room_amenity_id,customer_id,room_id,amenity_id,quantity,price,created_at,updated_at from {$tx}room_amenity_details $criteria limit $top,$perpage");
		$html="<div class='table-responsive'><table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"roomamenitydetail/create","text"=>"New RoomAmenityDetail"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Room Amenity Id</th><th>Customer Name</th><th>Room Number</th><th>Amenities</th><th>Quantity</th><th>Price</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Room Amenity Id</th><th>Customer Id</th><th>Room Id</th><th>Amenity Id</th><th>Quantity</th><th>Price</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($roomamenitydetail=$result->fetch_object()){
			$action_buttons = "";
			$cname =  Customer::find($roomamenitydetail->customer_id)->name;
			$room_number = Room::find($roomamenitydetail->room_id)->room_number;
			$amenities = Amenity::find($roomamenitydetail->amenity_id)->name;
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"roomamenitydetail/show/$roomamenitydetail->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"roomamenitydetail/edit/$roomamenitydetail->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"roomamenitydetail/confirm/$roomamenitydetail->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$roomamenitydetail->id</td><td>$roomamenitydetail->room_amenity_id</td><td>$cname</td><td>$room_number</td><td>$amenities</td><td>$roomamenitydetail->quantity</td><td>$roomamenitydetail->price</td><td>$roomamenitydetail->created_at</td><td>$roomamenitydetail->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table></div>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,room_amenity_id,customer_id,room_id,amenity_id,quantity,price,created_at,updated_at from {$tx}room_amenity_details where id={$id}");
		$roomamenitydetail=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">RoomAmenityDetail Show</th></tr>";
		$html.="<tr><th>Id</th><td>$roomamenitydetail->id</td></tr>";
		$html.="<tr><th>Room Amenity Id</th><td>$roomamenitydetail->room_amenity_id</td></tr>";
		$html.="<tr><th>Customer Id</th><td>$roomamenitydetail->customer_id</td></tr>";
		$html.="<tr><th>Room Id</th><td>$roomamenitydetail->room_id</td></tr>";
		$html.="<tr><th>Amenity Id</th><td>$roomamenitydetail->amenity_id</td></tr>";
		$html.="<tr><th>Quantity</th><td>$roomamenitydetail->quantity</td></tr>";
		$html.="<tr><th>Price</th><td>$roomamenitydetail->price</td></tr>";
		$html.="<tr><th>Created At</th><td>$roomamenitydetail->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$roomamenitydetail->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
