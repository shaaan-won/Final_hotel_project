<?php
class Order extends Model implements JsonSerializable{
	public $id;
	public $customer_id;
	public $order_date;
	public $total_amount;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$customer_id,$order_date,$total_amount,$created_at,$updated_at){
		$this->id=$id;
		$this->customer_id=$customer_id;
		$this->order_date=$order_date;
		$this->total_amount=$total_amount;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}orders(customer_id,order_date,total_amount,created_at,updated_at)values('$this->customer_id','$this->order_date','$this->total_amount','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}orders set customer_id='$this->customer_id',order_date='$this->order_date',total_amount='$this->total_amount',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}orders where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,customer_id,order_date,total_amount,created_at,updated_at from {$tx}orders");
		$data=[];
		while($order=$result->fetch_object()){
			$data[]=$order;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,customer_id,order_date,total_amount,created_at,updated_at from {$tx}orders $criteria limit $top,$perpage");
		$data=[];
		while($order=$result->fetch_object()){
			$data[]=$order;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}orders $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,customer_id,order_date,total_amount,created_at,updated_at from {$tx}orders where id='$id'");
		$order=$result->fetch_object();
			return $order;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}orders");
		$order =$result->fetch_object();
		return $order->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Customer Id:$this->customer_id<br> 
		Order Date:$this->order_date<br> 
		Total Amount:$this->total_amount<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbOrder"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}orders");
		while($order=$result->fetch_object()){
			$html.="<option value ='$order->id'>$order->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}orders $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,customer_id,order_date,total_amount,created_at,updated_at from {$tx}orders $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"order/create","text"=>"New Order"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Customer Name</th><th>Order Date</th><th>Total Amount</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Customer Id</th><th>Order Date</th><th>Total Amount</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($order=$result->fetch_object()){
			$action_buttons = "";
			$cname =  Customer::find($order->customer_id);
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"order/show/$order->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"order/edit/$order->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"order/confirm/$order->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$order->id</td><td>$cname->name</td><td>$order->order_date</td><td>$order->total_amount</td><td>$order->created_at</td><td>$order->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,customer_id,order_date,total_amount,created_at,updated_at from {$tx}orders where id={$id}");
		$order=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Order Show</th></tr>";
		$html.="<tr><th>Id</th><td>$order->id</td></tr>";
		$html.="<tr><th>Customer Id</th><td>$order->customer_id</td></tr>";
		$html.="<tr><th>Order Date</th><td>$order->order_date</td></tr>";
		$html.="<tr><th>Total Amount</th><td>$order->total_amount</td></tr>";
		$html.="<tr><th>Created At</th><td>$order->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$order->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
