<?php
class Booking extends Model implements JsonSerializable{
	public $id;
	public $customer_id;
	public $room_id;
	public $check_in_date;
	public $check_out_date;
	public $status_id;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$customer_id,$room_id,$check_in_date,$check_out_date,$status_id,$created_at,$updated_at){
		$this->id=$id;
		$this->customer_id=$customer_id;
		$this->room_id=$room_id;
		$this->check_in_date=$check_in_date;
		$this->check_out_date=$check_out_date;
		$this->status_id=$status_id;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}bookings(customer_id,room_id,check_in_date,check_out_date,status_id,created_at,updated_at)values('$this->customer_id','$this->room_id','$this->check_in_date','$this->check_out_date','$this->status_id','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}bookings set customer_id='$this->customer_id',room_id='$this->room_id',check_in_date='$this->check_in_date',check_out_date='$this->check_out_date',status_id='$this->status_id',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}bookings where id={$id}");
	}
	public function jsonSerialize(): mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,customer_id,room_id,check_in_date,check_out_date,status_id,created_at,updated_at from {$tx}bookings");
		$data=[];
		while($booking=$result->fetch_object()){
			$data[]=$booking;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,customer_id,room_id,check_in_date,check_out_date,status_id,created_at,updated_at from {$tx}bookings $criteria limit $top,$perpage");
		$data=[];
		while($booking=$result->fetch_object()){
			$data[]=$booking;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}bookings $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,customer_id,room_id,check_in_date,check_out_date,status_id,created_at,updated_at from {$tx}bookings where id='$id'");
		$booking=$result->fetch_object();
			return $booking;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}bookings");
		$booking =$result->fetch_object();
		return $booking->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Customer Id:$this->customer_id<br> 
		Room Id:$this->room_id<br> 
		Check In Date:$this->check_in_date<br> 
		Check Out Date:$this->check_out_date<br> 
		Status Id:$this->status_id<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbBooking"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}bookings");
		while($booking=$result->fetch_object()){
			$html.="<option value ='$booking->id'>$booking->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}bookings $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,customer_id,room_id,check_in_date,check_out_date,status_id,created_at,updated_at from {$tx}bookings $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"booking/create","text"=>"New Booking"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Customer name</th><th>Room number</th><th>Check In Date</th><th>Check Out Date</th><th>Booking Status</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Customer name</th><th>Room number</th><th>Check In Date</th><th>Check Out Date</th><th>Status</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($booking=$result->fetch_object()){
			$action_buttons = "";
			$cname = Customer::find($booking->customer_id)->name;
			$rname = Room::find($booking->room_id)->room_number;
			$status= Status::Find($booking->status_id)->name;
			$check_in_date = date("Y-m-d", strtotime($booking->check_in_date));
			$check_out_date = date("Y-m-d", strtotime($booking->check_out_date));
			// print_r($cname);
			// print_r($rname);
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"booking/show/$booking->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"booking/edit/$booking->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"booking/confirm/$booking->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$booking->id</td><td>$cname</td><td>$rname</td><td>$check_in_date</td><td>$check_out_date</td><td class='text-center text-success'>$status</td><td>$booking->created_at</td><td>$booking->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,customer_id,room_id,check_in_date,check_out_date,status_id,created_at,updated_at from {$tx}bookings where id={$id}");
		$booking=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Booking Show</th></tr>";
		$html.="<tr><th>Id</th><td>$booking->id</td></tr>";
		$html.="<tr><th>Customer Id</th><td>$booking->customer_id</td></tr>";
		$html.="<tr><th>Room Id</th><td>$booking->room_id</td></tr>";
		$html.="<tr><th>Check In Date</th><td>$booking->check_in_date</td></tr>";
		$html.="<tr><th>Check Out Date</th><td>$booking->check_out_date</td></tr>";
		$html.="<tr><th>Status Id</th><td>$booking->status_id</td></tr>";
		$html.="<tr><th>Created At</th><td>$booking->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$booking->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
