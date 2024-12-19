<?php
class Inventory extends Model implements JsonSerializable{
	public $id;
	public $supplier_id;
	public $item_name;
	public $quantity;
	public $unit_price;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$supplier_id,$item_name,$quantity,$unit_price,$created_at,$updated_at){
		$this->id=$id;
		$this->supplier_id=$supplier_id;
		$this->item_name=$item_name;
		$this->quantity=$quantity;
		$this->unit_price=$unit_price;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}inventorys(supplier_id,item_name,quantity,unit_price,created_at,updated_at)values('$this->supplier_id','$this->item_name','$this->quantity','$this->unit_price','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}inventorys set supplier_id='$this->supplier_id',item_name='$this->item_name',quantity='$this->quantity',unit_price='$this->unit_price',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}inventorys where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,supplier_id,item_name,quantity,unit_price,created_at,updated_at from {$tx}inventorys");
		$data=[];
		while($inventory=$result->fetch_object()){
			$data[]=$inventory;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,supplier_id,item_name,quantity,unit_price,created_at,updated_at from {$tx}inventorys $criteria limit $top,$perpage");
		$data=[];
		while($inventory=$result->fetch_object()){
			$data[]=$inventory;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}inventorys $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,supplier_id,item_name,quantity,unit_price,created_at,updated_at from {$tx}inventorys where id='$id'");
		$inventory=$result->fetch_object();
			return $inventory;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}inventorys");
		$inventory =$result->fetch_object();
		return $inventory->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Supplier Id:$this->supplier_id<br> 
		Item Name:$this->item_name<br> 
		Quantity:$this->quantity<br> 
		Unit Price:$this->unit_price<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbInventory"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}inventorys");
		while($inventory=$result->fetch_object()){
			$html.="<option value ='$inventory->id'>$inventory->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}inventorys $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,supplier_id,item_name,quantity,unit_price,created_at,updated_at from {$tx}inventorys $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"inventory/create","text"=>"New Inventory"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Supplier Id</th><th>Item Name</th><th>Quantity</th><th>Unit Price</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Supplier Id</th><th>Item Name</th><th>Quantity</th><th>Unit Price</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($inventory=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"inventory/show/$inventory->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"inventory/edit/$inventory->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"inventory/confirm/$inventory->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$inventory->id</td><td>$inventory->supplier_id</td><td>$inventory->item_name</td><td>$inventory->quantity</td><td>$inventory->unit_price</td><td>$inventory->created_at</td><td>$inventory->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,supplier_id,item_name,quantity,unit_price,created_at,updated_at from {$tx}inventorys where id={$id}");
		$inventory=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Inventory Show</th></tr>";
		$html.="<tr><th>Id</th><td>$inventory->id</td></tr>";
		$html.="<tr><th>Supplier Id</th><td>$inventory->supplier_id</td></tr>";
		$html.="<tr><th>Item Name</th><td>$inventory->item_name</td></tr>";
		$html.="<tr><th>Quantity</th><td>$inventory->quantity</td></tr>";
		$html.="<tr><th>Unit Price</th><td>$inventory->unit_price</td></tr>";
		$html.="<tr><th>Created At</th><td>$inventory->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$inventory->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
