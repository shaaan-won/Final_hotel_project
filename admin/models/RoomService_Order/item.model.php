<?php
class Item extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $description;
	public $price;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$name,$description,$price,$created_at,$updated_at){
		$this->id=$id;
		$this->name=$name;
		$this->description=$description;
		$this->price=$price;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}items(name,description,price,created_at,updated_at)values('$this->name','$this->description','$this->price','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}items set name='$this->name',description='$this->description',price='$this->price',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}items where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,description,price,created_at,updated_at from {$tx}items");
		$data=[];
		while($item=$result->fetch_object()){
			$data[]=$item;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,description,price,created_at,updated_at from {$tx}items $criteria limit $top,$perpage");
		$data=[];
		while($item=$result->fetch_object()){
			$data[]=$item;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}items $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,description,price,created_at,updated_at from {$tx}items where id='$id'");
		$item=$result->fetch_object();
			return $item;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}items");
		$item =$result->fetch_object();
		return $item->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Description:$this->description<br> 
		Price:$this->price<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbItem"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}items");
		while($item=$result->fetch_object()){
			$html.="<option value ='$item->id'>$item->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}items $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,description,price,created_at,updated_at from {$tx}items $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"item/create","text"=>"New Item"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Description</th><th>Price</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Description</th><th>Price</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($item=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"item/show/$item->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"item/edit/$item->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"item/confirm/$item->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$item->id</td><td>$item->name</td><td>$item->description</td><td>$item->price</td><td>$item->created_at</td><td>$item->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,description,price,created_at,updated_at from {$tx}items where id={$id}");
		$item=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Item Show</th></tr>";
		$html.="<tr><th>Id</th><td>$item->id</td></tr>";
		$html.="<tr><th>Name</th><td>$item->name</td></tr>";
		$html.="<tr><th>Description</th><td>$item->description</td></tr>";
		$html.="<tr><th>Price</th><td>$item->price</td></tr>";
		$html.="<tr><th>Created At</th><td>$item->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$item->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
