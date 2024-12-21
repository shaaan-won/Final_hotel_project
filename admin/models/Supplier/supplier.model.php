<?php
class Supplier extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $contact_name;
	public $email;
	public $phone;
	public $address;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$name,$contact_name,$email,$phone,$address,$created_at,$updated_at){
		$this->id=$id;
		$this->name=$name;
		$this->contact_name=$contact_name;
		$this->email=$email;
		$this->phone=$phone;
		$this->address=$address;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}Suppliers(name,contact_name,email,phone,address,created_at,updated_at)values('$this->name','$this->contact_name','$this->email','$this->phone','$this->address','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}Suppliers set name='$this->name',contact_name='$this->contact_name',email='$this->email',phone='$this->phone',address='$this->address',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}Suppliers where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,contact_name,email,phone,address,created_at,updated_at from {$tx}Suppliers");
		$data=[];
		while($supplier=$result->fetch_object()){
			$data[]=$supplier;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,contact_name,email,phone,address,created_at,updated_at from {$tx}Suppliers $criteria limit $top,$perpage");
		$data=[];
		while($supplier=$result->fetch_object()){
			$data[]=$supplier;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}Suppliers $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,contact_name,email,phone,address,created_at,updated_at from {$tx}Suppliers where id='$id'");
		$supplier=$result->fetch_object();
			return $supplier;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}Suppliers");
		$supplier =$result->fetch_object();
		return $supplier->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Contact Name:$this->contact_name<br> 
		Email:$this->email<br> 
		Phone:$this->phone<br> 
		Address:$this->address<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbSupplier"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}Suppliers");
		while($supplier=$result->fetch_object()){
			$html.="<option value ='$supplier->id'>$supplier->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}Suppliers $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,contact_name,email,phone,address,created_at,updated_at from {$tx}Suppliers $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"supplier/create","text"=>"New Supplier"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Contact Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Contact Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($supplier=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"supplier/show/$supplier->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"supplier/edit/$supplier->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"supplier/confirm/$supplier->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$supplier->id</td><td>$supplier->name</td><td>$supplier->contact_name</td><td>$supplier->email</td><td>$supplier->phone</td><td>$supplier->address</td><td>$supplier->created_at</td><td>$supplier->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,contact_name,email,phone,address,created_at,updated_at from {$tx}Suppliers where id={$id}");
		$supplier=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Supplier Show</th></tr>";
		$html.="<tr><th>Id</th><td>$supplier->id</td></tr>";
		$html.="<tr><th>Name</th><td>$supplier->name</td></tr>";
		$html.="<tr><th>Contact Name</th><td>$supplier->contact_name</td></tr>";
		$html.="<tr><th>Email</th><td>$supplier->email</td></tr>";
		$html.="<tr><th>Phone</th><td>$supplier->phone</td></tr>";
		$html.="<tr><th>Address</th><td>$supplier->address</td></tr>";
		$html.="<tr><th>Created At</th><td>$supplier->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$supplier->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
