<?php
class Invoice extends Model implements JsonSerializable{
	public $id;
	public $customer_id;
	public $booking_id;
	public $order_id;
	public $room_amenitie_id;
	public $total_amount;
	public $discount;
	public $tax;
	public $service_charges;
	public $cleaning_charges;
	public $payment_status_id;
	public $amount_due;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$customer_id,$booking_id,$order_id,$room_amenitie_id,$total_amount,$discount,$tax,$service_charges,$cleaning_charges,$payment_status_id,$amount_due,$created_at,$updated_at){
		$this->id=$id;
		$this->customer_id=$customer_id;
		$this->booking_id=$booking_id;
		$this->order_id=$order_id;
		$this->room_amenitie_id=$room_amenitie_id;
		$this->total_amount=$total_amount;
		$this->discount=$discount;
		$this->tax=$tax;
		$this->service_charges=$service_charges;
		$this->cleaning_charges=$cleaning_charges;
		$this->payment_status_id=$payment_status_id;
		$this->amount_due=$amount_due;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}invoices(customer_id,booking_id,order_id,room_amenitie_id,total_amount,discount,tax,service_charges,cleaning_charges,payment_status_id,amount_due,created_at,updated_at)values('$this->customer_id','$this->booking_id','$this->order_id','$this->room_amenitie_id','$this->total_amount','$this->discount','$this->tax','$this->service_charges','$this->cleaning_charges','$this->payment_status_id','$this->amount_due','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}invoices set customer_id='$this->customer_id',booking_id='$this->booking_id',order_id='$this->order_id',room_amenitie_id='$this->room_amenitie_id',total_amount='$this->total_amount',discount='$this->discount',tax='$this->tax',service_charges='$this->service_charges',cleaning_charges='$this->cleaning_charges',payment_status_id='$this->payment_status_id',amount_due='$this->amount_due',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}invoices where id={$id}");
	}
	public function jsonSerialize(): mixed {
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,customer_id,booking_id,order_id,room_amenitie_id,total_amount,discount,tax,service_charges,cleaning_charges,payment_status_id,amount_due,created_at,updated_at from {$tx}invoices");
		$data=[];
		while($invoice=$result->fetch_object()){
			$data[]=$invoice;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,customer_id,booking_id,order_id,room_amenitie_id,total_amount,discount,tax,service_charges,cleaning_charges,payment_status_id,amount_due,created_at,updated_at from {$tx}invoices $criteria limit $top,$perpage");
		$data=[];
		while($invoice=$result->fetch_object()){
			$data[]=$invoice;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}invoices $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,customer_id,booking_id,order_id,room_amenitie_id,total_amount,discount,tax,service_charges,cleaning_charges,payment_status_id,amount_due,created_at,updated_at from {$tx}invoices where id='$id'");
		$invoice=$result->fetch_object();
			return $invoice;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}invoices");
		$invoice =$result->fetch_object();
		return $invoice->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Customer Id:$this->customer_id<br> 
		Booking Id:$this->booking_id<br> 
		Order Id:$this->order_id<br> 
		Room Amenitie Id:$this->room_amenitie_id<br> 
		Total Amount:$this->total_amount<br> 
		Discount:$this->discount<br> 
		Tax:$this->tax<br> 
		Service Charges:$this->service_charges<br> 
		Cleaning Charges:$this->cleaning_charges<br> 
		Payment Status Id:$this->payment_status_id<br> 
		Amount Due:$this->amount_due<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbInvoice"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}invoices");
		while($invoice=$result->fetch_object()){
			$html.="<option value ='$invoice->id'>$invoice->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}invoices $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,customer_id,booking_id,order_id,room_amenitie_id,total_amount,discount,tax,service_charges,cleaning_charges,payment_status_id,amount_due,created_at,updated_at from {$tx}invoices $criteria limit $top,$perpage");
		$html="<div class='table-responsive'><table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"invoice/create","text"=>"New Invoice"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Customer Id</th><th>Booking Id</th><th>Order Id</th><th>Room Amenitie Id</th><th>Total Amount</th><th>Discount</th><th>Tax</th><th>Service Charges</th><th>Cleaning Charges</th><th>Payment Status Id</th><th>Amount Due</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Customer Id</th><th>Booking Id</th><th>Order Id</th><th>Room Amenitie Id</th><th>Total Amount</th><th>Discount</th><th>Tax</th><th>Service Charges</th><th>Cleaning Charges</th><th>Payment Status Id</th><th>Amount Due</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($invoice=$result->fetch_object()){
			$action_buttons = "";
			$cname = Customer::find($invoice->customer_id)->name;
			$payment_status = PaymentStatuse::find($invoice->payment_status_id)->name;
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"invoice/show/$invoice->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"invoice/edit/$invoice->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"invoice/confirm/$invoice->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$invoice->id</td><td>$cname</td><td>$invoice->booking_id</td><td>$invoice->order_id</td><td>$invoice->room_amenitie_id</td><td>$invoice->total_amount</td><td>$invoice->discount</td><td>$invoice->tax</td><td>$invoice->service_charges</td><td>$invoice->cleaning_charges</td><td style='color:green; font-weight:bold'>$payment_status</td><td>$invoice->amount_due</td><td>$invoice->created_at</td><td>$invoice->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table></div>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,customer_id,booking_id,order_id,room_amenitie_id,total_amount,discount,tax,service_charges,cleaning_charges,payment_status_id,amount_due,created_at,updated_at from {$tx}invoices where id={$id}");
		$invoice=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Invoice Show</th></tr>";
		$html.="<tr><th>Id</th><td>$invoice->id</td></tr>";
		$html.="<tr><th>Customer Id</th><td>$invoice->customer_id</td></tr>";
		$html.="<tr><th>Booking Id</th><td>$invoice->booking_id</td></tr>";
		$html.="<tr><th>Order Id</th><td>$invoice->order_id</td></tr>";
		$html.="<tr><th>Room Amenitie Id</th><td>$invoice->room_amenitie_id</td></tr>";
		$html.="<tr><th>Total Amount</th><td>$invoice->total_amount</td></tr>";
		$html.="<tr><th>Discount</th><td>$invoice->discount</td></tr>";
		$html.="<tr><th>Tax</th><td>$invoice->tax</td></tr>";
		$html.="<tr><th>Service Charges</th><td>$invoice->service_charges</td></tr>";
		$html.="<tr><th>Cleaning Charges</th><td>$invoice->cleaning_charges</td></tr>";
		$html.="<tr><th>Payment Status Id</th><td>$invoice->payment_status_id</td></tr>";
		$html.="<tr><th>Amount Due</th><td>$invoice->amount_due</td></tr>";
		$html.="<tr><th>Created At</th><td>$invoice->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$invoice->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
