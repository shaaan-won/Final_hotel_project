<?php
class Amenity extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $amenity_price;
	public $description;
	public $created_at;

	public function __construct(){
	}
	public function set($id,$name,$amenity_price,$description,$created_at){
		$this->id=$id;
		$this->name=$name;
		$this->amenity_price=$amenity_price;
		$this->description=$description;
		$this->created_at=$created_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}amenities(name,amenity_price,description,created_at)values('$this->name','$this->amenity_price','$this->description','$this->created_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}amenities set name='$this->name',amenity_price='$this->amenity_price',description='$this->description',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}amenities where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,amenity_price,description,created_at from {$tx}amenities");
		$data=[];
		while($amenity=$result->fetch_object()){
			$data[]=$amenity;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,amenity_price,description,created_at from {$tx}amenities $criteria limit $top,$perpage");
		$data=[];
		while($amenity=$result->fetch_object()){
			$data[]=$amenity;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}amenities $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,amenity_price,description,created_at from {$tx}amenities where id='$id'");
		$amenity=$result->fetch_object();
			return $amenity;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}amenities");
		$amenity =$result->fetch_object();
		return $amenity->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Amenity Price:$this->amenity_price<br> 
		Description:$this->description<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbAmenity"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}amenities");
		while($amenity=$result->fetch_object()){
			$html.="<option value ='$amenity->id'>$amenity->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}amenities $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,amenity_price,description,created_at from {$tx}amenities $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"amenity/create","text"=>"New Amenity"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Amenity Price</th><th>Description</th><th>Created At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Amenity Price</th><th>Description</th><th>Created At</th></tr>";
		}
		while($amenity=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"amenity/show/$amenity->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"amenity/edit/$amenity->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"amenity/confirm/$amenity->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$amenity->id</td><td>$amenity->name</td><td>$amenity->amenity_price</td><td>$amenity->description</td><td>$amenity->created_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,amenity_price,description,created_at from {$tx}amenities where id={$id}");
		$amenity=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Amenity Show</th></tr>";
		$html.="<tr><th>Id</th><td>$amenity->id</td></tr>";
		$html.="<tr><th>Name</th><td>$amenity->name</td></tr>";
		$html.="<tr><th>Amenity Price</th><td>$amenity->amenity_price</td></tr>";
		$html.="<tr><th>Description</th><td>$amenity->description</td></tr>";
		$html.="<tr><th>Created At</th><td>$amenity->created_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
