<?php
class Staff extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $staff_role_id;
	public $email;
	public $phone;
	public $address;
	public $work_schedule_id;
	public $hired_date;
	public $performance_score;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$name,$staff_role_id,$email,$phone,$address,$work_schedule_id,$hired_date,$performance_score,$created_at,$updated_at){
		$this->id=$id;
		$this->name=$name;
		$this->staff_role_id=$staff_role_id;
		$this->email=$email;
		$this->phone=$phone;
		$this->address=$address;
		$this->work_schedule_id=$work_schedule_id;
		$this->hired_date=$hired_date;
		$this->performance_score=$performance_score;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}staffs(name,staff_role_id,email,phone,address,work_schedule_id,hired_date,performance_score,created_at,updated_at)values('$this->name','$this->staff_role_id','$this->email','$this->phone','$this->address','$this->work_schedule_id','$this->hired_date','$this->performance_score','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}staffs set name='$this->name',staff_role_id='$this->staff_role_id',email='$this->email',phone='$this->phone',address='$this->address',work_schedule_id='$this->work_schedule_id',hired_date='$this->hired_date',performance_score='$this->performance_score',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}staffs where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,staff_role_id,email,phone,address,work_schedule_id,hired_date,performance_score,created_at,updated_at from {$tx}staffs");
		$data=[];
		while($staff=$result->fetch_object()){
			$data[]=$staff;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,staff_role_id,email,phone,address,work_schedule_id,hired_date,performance_score,created_at,updated_at from {$tx}staffs $criteria limit $top,$perpage");
		$data=[];
		while($staff=$result->fetch_object()){
			$data[]=$staff;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}staffs $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,staff_role_id,email,phone,address,work_schedule_id,hired_date,performance_score,created_at,updated_at from {$tx}staffs where id='$id'");
		$staff=$result->fetch_object();
			return $staff;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}staffs");
		$staff =$result->fetch_object();
		return $staff->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Staff Role Id:$this->staff_role_id<br> 
		Email:$this->email<br> 
		Phone:$this->phone<br> 
		Address:$this->address<br> 
		Work Schedule Id:$this->work_schedule_id<br> 
		Hired Date:$this->hired_date<br> 
		Performance Score:$this->performance_score<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbStaff"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}staffs");
		while($staff=$result->fetch_object()){
			$html.="<option value ='$staff->id'>$staff->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}staffs $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,staff_role_id,email,phone,address,work_schedule_id,hired_date,performance_score,created_at,updated_at from {$tx}staffs $criteria limit $top,$perpage");
		$html="<div class='table-responsive'><table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"staff/create","text"=>"New Staff"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Staff Role</th><th>Email</th><th>Phone</th><th>Address</th><th>Work Schedule Id</th><th>Hired Date</th><th>Performance Score</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Staff Role Id</th><th>Email</th><th>Phone</th><th>Address</th><th>Work Schedule Id</th><th>Hired Date</th><th>Performance Score</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($staff=$result->fetch_object()){
			$action_buttons = "";
			$staff_role= StaffRole::find($staff->staff_role_id);
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"staff/show/$staff->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"staff/edit/$staff->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"staff/confirm/$staff->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$staff->id</td><td>$staff->name</td><td>$staff_role->name</td><td>$staff->email</td><td>$staff->phone</td><td>$staff->address</td><td>$staff->work_schedule_id</td><td>$staff->hired_date</td><td>$staff->performance_score</td><td>$staff->created_at</td><td>$staff->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table> </div>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,staff_role_id,email,phone,address,work_schedule_id,hired_date,performance_score,created_at,updated_at from {$tx}staffs where id={$id}");
		$staff=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Staff Show</th></tr>";
		$html.="<tr><th>Id</th><td>$staff->id</td></tr>";
		$html.="<tr><th>Name</th><td>$staff->name</td></tr>";
		$html.="<tr><th>Staff Role Id</th><td>$staff->staff_role_id</td></tr>";
		$html.="<tr><th>Email</th><td>$staff->email</td></tr>";
		$html.="<tr><th>Phone</th><td>$staff->phone</td></tr>";
		$html.="<tr><th>Address</th><td>$staff->address</td></tr>";
		$html.="<tr><th>Work Schedule Id</th><td>$staff->work_schedule_id</td></tr>";
		$html.="<tr><th>Hired Date</th><td>$staff->hired_date</td></tr>";
		$html.="<tr><th>Performance Score</th><td>$staff->performance_score</td></tr>";
		$html.="<tr><th>Created At</th><td>$staff->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$staff->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
