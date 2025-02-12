<?php
class Payment extends Model implements JsonSerializable{
	public $id;
	public $customer_id;
	public $booking_id;
	public $amount;
	public $payment_method_id;
	public $payment_statuse_id;
	public $created_at;

	public function __construct(){
	}
	public function set($id,$customer_id,$booking_id,$amount,$payment_method_id,$payment_statuse_id,$created_at){
		$this->id=$id;
		$this->customer_id=$customer_id;
		$this->booking_id=$booking_id;
		$this->amount=$amount;
		$this->payment_method_id=$payment_method_id;
		$this->payment_statuse_id=$payment_statuse_id;
		$this->created_at=$created_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}payments(customer_id,booking_id,amount,payment_method_id,payment_statuse_id,created_at)values('$this->customer_id','$this->booking_id','$this->amount','$this->payment_method_id','$this->payment_statuse_id','$this->created_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}payments set customer_id='$this->customer_id',booking_id='$this->booking_id',amount='$this->amount',payment_method_id='$this->payment_method_id',payment_statuse_id='$this->payment_statuse_id',created_at='$this->created_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}payments where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,customer_id,booking_id,amount,payment_method_id,payment_statuse_id,created_at from {$tx}payments");
		$data=[];
		while($payment=$result->fetch_object()){
			$data[]=$payment;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,customer_id,booking_id,amount,payment_method_id,payment_statuse_id,created_at from {$tx}payments $criteria limit $top,$perpage");
		$data=[];
		while($payment=$result->fetch_object()){
			$data[]=$payment;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}payments $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,customer_id,booking_id,amount,payment_method_id,payment_statuse_id,created_at from {$tx}payments where id='$id'");
		$payment=$result->fetch_object();
			return $payment;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}payments");
		$payment =$result->fetch_object();
		return $payment->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Customer Id:$this->customer_id<br> 
		Booking Id:$this->booking_id<br> 
		Amount:$this->amount<br> 
		Payment Method Id:$this->payment_method_id<br> 
		Payment Statuse Id:$this->payment_statuse_id<br> 
		Created At:$this->created_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbPayment"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}payments");
		while($payment=$result->fetch_object()){
			$html.="<option value ='$payment->id'>$payment->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}payments $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,customer_id,booking_id,amount,payment_method_id,payment_statuse_id,created_at from {$tx}payments $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"payment/create","text"=>"New Payment"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Customer Name</th><th>Booking Id</th><th>Amount</th><th>Payment Method </th><th>Payment Statuse </th><th>Payment Date</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Customer Id</th><th>Booking Id</th><th>Amount</th><th>Payment Method Id</th><th>Payment Statuse Id</th><th>Created At</th></tr>";
		}
		while($payment=$result->fetch_object()){
			$action_buttons = "";
			$cname = Customer::find($payment->customer_id);
			$pmethod = PaymentMethod::find($payment->payment_method_id);
			$pstatuse = PaymentStatuse::find($payment->payment_statuse_id);
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"payment/show/$payment->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"payment/edit/$payment->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"payment/confirm/$payment->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$payment->id</td><td>$cname->name</td><td>$payment->booking_id</td><td>$payment->amount</td><td>$pmethod->name</td><td class=' text-success text-bold '>$pstatuse->name</td><td>$payment->created_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,customer_id,booking_id,amount,payment_method_id,payment_statuse_id,created_at from {$tx}payments where id={$id}");
		$payment=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Payment Show</th></tr>";
		$html.="<tr><th>Id</th><td>$payment->id</td></tr>";
		$html.="<tr><th>Customer Id</th><td>$payment->customer_id</td></tr>";
		$html.="<tr><th>Booking Id</th><td>$payment->booking_id</td></tr>";
		$html.="<tr><th>Amount</th><td>$payment->amount</td></tr>";
		$html.="<tr><th>Payment Method Id</th><td>$payment->payment_method_id</td></tr>";
		$html.="<tr><th>Payment Statuse Id</th><td>$payment->payment_statuse_id</td></tr>";
		$html.="<tr><th>Created At</th><td>$payment->created_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
