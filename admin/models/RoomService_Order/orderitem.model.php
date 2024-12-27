<?php
class OrderItem extends Model implements JsonSerializable{
	public $id;
	public $order_id;
	public $customer_id;
	public $room_id;
	public $item_id;
	public $quantity;
	public $total;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$order_id,$customer_id,$room_id,$item_id,$quantity,$total,$created_at,$updated_at){
		$this->id=$id;
		$this->order_id=$order_id;
		$this->customer_id=$customer_id;
		$this->room_id=$room_id;
		$this->item_id=$item_id;
		$this->quantity=$quantity;
		$this->total=$total;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}order_items(order_id,customer_id,room_id,item_id,quantity,total,created_at,updated_at)values('$this->order_id','$this->customer_id','$this->room_id','$this->item_id','$this->quantity','$this->total','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}order_items set order_id='$this->order_id',customer_id='$this->customer_id',room_id='$this->room_id',item_id='$this->item_id',quantity='$this->quantity',total='$this->total',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}order_items where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,order_id,customer_id,room_id,item_id,quantity,total,created_at,updated_at from {$tx}order_items");
		$data=[];
		while($orderitem=$result->fetch_object()){
			$data[]=$orderitem;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,order_id,customer_id,room_id,item_id,quantity,total,created_at,updated_at from {$tx}order_items $criteria limit $top,$perpage");
		$data=[];
		while($orderitem=$result->fetch_object()){
			$data[]=$orderitem;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}order_items $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,order_id,customer_id,room_id,item_id,quantity,total,created_at,updated_at from {$tx}order_items where id='$id'");
		$orderitem=$result->fetch_object();
			return $orderitem;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}order_items");
		$orderitem =$result->fetch_object();
		return $orderitem->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Order Id:$this->order_id<br> 
		Customer Id:$this->customer_id<br> 
		Room Id:$this->room_id<br> 
		Item Id:$this->item_id<br> 
		Quantity:$this->quantity<br> 
		Total:$this->total<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbOrderItem"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}order_items");
		while($orderitem=$result->fetch_object()){
			$html.="<option value ='$orderitem->id'>$orderitem->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}order_items $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,order_id,customer_id,room_id,item_id,quantity,total,created_at,updated_at from {$tx}order_items $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"orderitem/create","text"=>"New OrderItem"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Order Id</th><th>Customer Name</th><th>Room Number</th><th>Items</th><th>Quantity</th><th>Total</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Order Id</th><th>Customer Id</th><th>Room Id</th><th>Item Id</th><th>Quantity</th><th>Total</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($orderitem=$result->fetch_object()){
			$action_buttons = "";
			$cname = Customer::find($orderitem->customer_id)->name;
			$rname = Room::find($orderitem->room_id)->room_number;
			$item_name = Item::find($orderitem->item_id)->name;
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"orderitem/show/$orderitem->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"orderitem/edit/$orderitem->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"orderitem/confirm/$orderitem->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$orderitem->id</td><td>$orderitem->order_id</td><td>$cname</td><td>$rname</td><td>$item_name</td><td>$orderitem->quantity</td><td>$orderitem->total</td><td>$orderitem->created_at</td><td>$orderitem->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,order_id,customer_id,room_id,item_id,quantity,total,created_at,updated_at from {$tx}order_items where id={$id}");
		$orderitem=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">OrderItem Show</th></tr>";
		$html.="<tr><th>Id</th><td>$orderitem->id</td></tr>";
		$html.="<tr><th>Order Id</th><td>$orderitem->order_id</td></tr>";
		$html.="<tr><th>Customer Id</th><td>$orderitem->customer_id</td></tr>";
		$html.="<tr><th>Room Id</th><td>$orderitem->room_id</td></tr>";
		$html.="<tr><th>Item Id</th><td>$orderitem->item_id</td></tr>";
		$html.="<tr><th>Quantity</th><td>$orderitem->quantity</td></tr>";
		$html.="<tr><th>Total</th><td>$orderitem->total</td></tr>";
		$html.="<tr><th>Created At</th><td>$orderitem->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$orderitem->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
