<?php
class LoyaltyProgram extends Model implements JsonSerializable{
	public $id;
	public $customer_id;
	public $points;
	public $membership_level;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$customer_id,$points,$membership_level,$created_at,$updated_at){
		$this->id=$id;
		$this->customer_id=$customer_id;
		$this->points=$points;
		$this->membership_level=$membership_level;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}loyalty_programs(customer_id,points,membership_level,created_at,updated_at)values('$this->customer_id','$this->points','$this->membership_level','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}loyalty_programs set customer_id='$this->customer_id',points='$this->points',membership_level='$this->membership_level',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}loyalty_programs where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,customer_id,points,membership_level,created_at,updated_at from {$tx}loyalty_programs");
		$data=[];
		while($loyaltyprogram=$result->fetch_object()){
			$data[]=$loyaltyprogram;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,customer_id,points,membership_level,created_at,updated_at from {$tx}loyalty_programs $criteria limit $top,$perpage");
		$data=[];
		while($loyaltyprogram=$result->fetch_object()){
			$data[]=$loyaltyprogram;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}loyalty_programs $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,customer_id,points,membership_level,created_at,updated_at from {$tx}loyalty_programs where id='$id'");
		$loyaltyprogram=$result->fetch_object();
			return $loyaltyprogram;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}loyalty_programs");
		$loyaltyprogram =$result->fetch_object();
		return $loyaltyprogram->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Customer Id:$this->customer_id<br> 
		Points:$this->points<br> 
		Membership Level:$this->membership_level<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbLoyaltyProgram"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}loyalty_programs");
		while($loyaltyprogram=$result->fetch_object()){
			$html.="<option value ='$loyaltyprogram->id'>$loyaltyprogram->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}loyalty_programs $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,customer_id,points,membership_level,created_at,updated_at from {$tx}loyalty_programs $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"loyaltyprogram/create","text"=>"New LoyaltyProgram"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Customer Name</th><th>Points</th><th>Membership Level</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Customer Id</th><th>Points</th><th>Membership Level</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($loyaltyprogram=$result->fetch_object()){
			$action_buttons = "";
			$cname = Customer::find($loyaltyprogram->customer_id);
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"loyaltyprogram/show/$loyaltyprogram->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"loyaltyprogram/edit/$loyaltyprogram->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"loyaltyprogram/confirm/$loyaltyprogram->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$loyaltyprogram->id</td><td>$cname->name</td><td>$loyaltyprogram->points</td><td>$loyaltyprogram->membership_level</td><td>$loyaltyprogram->created_at</td><td>$loyaltyprogram->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,customer_id,points,membership_level,created_at,updated_at from {$tx}loyalty_programs where id={$id}");
		$loyaltyprogram=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">LoyaltyProgram Show</th></tr>";
		$html.="<tr><th>Id</th><td>$loyaltyprogram->id</td></tr>";
		$html.="<tr><th>Customer Id</th><td>$loyaltyprogram->customer_id</td></tr>";
		$html.="<tr><th>Points</th><td>$loyaltyprogram->points</td></tr>";
		$html.="<tr><th>Membership Level</th><td>$loyaltyprogram->membership_level</td></tr>";
		$html.="<tr><th>Created At</th><td>$loyaltyprogram->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$loyaltyprogram->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
