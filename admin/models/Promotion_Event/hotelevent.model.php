<?php
class HotelEvent extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $customer_id;
	public $event_date;
	public $event_time;
	public $location;
	public $attendees;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$name,$customer_id,$event_date,$event_time,$location,$attendees,$created_at,$updated_at){
		$this->id=$id;
		$this->name=$name;
		$this->customer_id=$customer_id;
		$this->event_date=$event_date;
		$this->event_time=$event_time;
		$this->location=$location;
		$this->attendees=$attendees;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}hotel_events(name,customer_id,event_date,event_time,location,attendees,created_at,updated_at)values('$this->name','$this->customer_id','$this->event_date','$this->event_time','$this->location','$this->attendees','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}hotel_events set name='$this->name',customer_id='$this->customer_id',event_date='$this->event_date',event_time='$this->event_time',location='$this->location',attendees='$this->attendees',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}hotel_events where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,customer_id,event_date,event_time,location,attendees,created_at,updated_at from {$tx}hotel_events");
		$data=[];
		while($hotelevent=$result->fetch_object()){
			$data[]=$hotelevent;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,customer_id,event_date,event_time,location,attendees,created_at,updated_at from {$tx}hotel_events $criteria limit $top,$perpage");
		$data=[];
		while($hotelevent=$result->fetch_object()){
			$data[]=$hotelevent;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}hotel_events $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,customer_id,event_date,event_time,location,attendees,created_at,updated_at from {$tx}hotel_events where id='$id'");
		$hotelevent=$result->fetch_object();
			return $hotelevent;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}hotel_events");
		$hotelevent =$result->fetch_object();
		return $hotelevent->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Customer Id:$this->customer_id<br> 
		Event Date:$this->event_date<br> 
		Event Time:$this->event_time<br> 
		Location:$this->location<br> 
		Attendees:$this->attendees<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbHotelEvent"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}hotel_events");
		while($hotelevent=$result->fetch_object()){
			$html.="<option value ='$hotelevent->id'>$hotelevent->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}hotel_events $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,customer_id,event_date,event_time,location,attendees,created_at,updated_at from {$tx}hotel_events $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"hotelevent/create","text"=>"New HotelEvent"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Customer Id</th><th>Event Date</th><th>Event Time</th><th>Location</th><th>Attendees</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Customer Id</th><th>Event Date</th><th>Event Time</th><th>Location</th><th>Attendees</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($hotelevent=$result->fetch_object()){
			$action_buttons = "";
			$cname = Customer::find($hotelevent->customer_id)->name;
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"hotelevent/show/$hotelevent->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"hotelevent/edit/$hotelevent->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"hotelevent/confirm/$hotelevent->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$hotelevent->id</td><td>$hotelevent->name</td><td>$cname</td><td>$hotelevent->event_date</td><td>$hotelevent->event_time</td><td>$hotelevent->location</td><td>$hotelevent->attendees</td><td>$hotelevent->created_at</td><td>$hotelevent->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,customer_id,event_date,event_time,location,attendees,created_at,updated_at from {$tx}hotel_events where id={$id}");
		$hotelevent=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">HotelEvent Show</th></tr>";
		$html.="<tr><th>Id</th><td>$hotelevent->id</td></tr>";
		$html.="<tr><th>Name</th><td>$hotelevent->name</td></tr>";
		$html.="<tr><th>Customer Id</th><td>$hotelevent->customer_id</td></tr>";
		$html.="<tr><th>Event Date</th><td>$hotelevent->event_date</td></tr>";
		$html.="<tr><th>Event Time</th><td>$hotelevent->event_time</td></tr>";
		$html.="<tr><th>Location</th><td>$hotelevent->location</td></tr>";
		$html.="<tr><th>Attendees</th><td>$hotelevent->attendees</td></tr>";
		$html.="<tr><th>Created At</th><td>$hotelevent->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$hotelevent->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
