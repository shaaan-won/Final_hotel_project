<?php
class HotelDashboard extends Model implements JsonSerializable
{
	public $total_customers;
	public $total_check_ins;
	public $total_check_outs;
	public $total_revenue;
	public $today_revenue;
	public $this_month_revenue;
	public $this_year_revenue;
	public $standard_rooms_total;
	public $deluxe_rooms_total;
	public $suite_rooms_total;
	public $penthouse_rooms_total;
	public $available_rooms;
	public $booked_rooms;
	public $maintenance_rooms;
	public $standard_rooms;
	public $deluxe_rooms;
	public $suite_rooms;
	public $penthouse_rooms;
	public $today_check_ins;
	public $today_check_outs;
	public $current_check_ins;
	public $future_check_ins;
	public $average_customer_rating;
	public $total_feedbacks;
	public $paid_payments;
	public $pending_payments;
	public $failed_payments;
	public $total_bookings;
	public $total_rooms;
	public $total_room_types;
	public $total_payments;

	public function __construct() {}
	public function set($total_customers, $total_check_ins, $total_check_outs, $total_revenue, $today_revenue, $this_month_revenue, $this_year_revenue, $standard_rooms_total, $deluxe_rooms_total, $suite_rooms_total, $penthouse_rooms_total, $available_rooms, $booked_rooms, $maintenance_rooms, $standard_rooms, $deluxe_rooms, $suite_rooms, $penthouse_rooms, $today_check_ins, $today_check_outs, $current_check_ins, $future_check_ins, $average_customer_rating, $total_feedbacks, $paid_payments, $pending_payments, $failed_payments, $total_bookings, $total_rooms, $total_room_types, $total_payments)
	{
		$this->total_customers = $total_customers;
		$this->total_check_ins = $total_check_ins;
		$this->total_check_outs = $total_check_outs;
		$this->total_revenue = $total_revenue;
		$this->today_revenue = $today_revenue;
		$this->this_month_revenue = $this_month_revenue;
		$this->this_year_revenue = $this_year_revenue;
		$this->standard_rooms_total = $standard_rooms_total;
		$this->deluxe_rooms_total = $deluxe_rooms_total;
		$this->suite_rooms_total = $suite_rooms_total;
		$this->penthouse_rooms_total = $penthouse_rooms_total;
		$this->available_rooms = $available_rooms;
		$this->booked_rooms = $booked_rooms;
		$this->maintenance_rooms = $maintenance_rooms;
		$this->standard_rooms = $standard_rooms;
		$this->deluxe_rooms = $deluxe_rooms;
		$this->suite_rooms = $suite_rooms;
		$this->penthouse_rooms = $penthouse_rooms;
		$this->today_check_ins = $today_check_ins;
		$this->today_check_outs = $today_check_outs;
		$this->current_check_ins = $current_check_ins;
		$this->future_check_ins = $future_check_ins;
		$this->average_customer_rating = $average_customer_rating;
		$this->total_feedbacks = $total_feedbacks;
		$this->paid_payments = $paid_payments;
		$this->pending_payments = $pending_payments;
		$this->failed_payments = $failed_payments;
		$this->total_bookings = $total_bookings;
		$this->total_rooms = $total_rooms;
		$this->total_room_types = $total_room_types;
		$this->total_payments = $total_payments;
	}
	// public function save(){
	// 	global $db,$tx;
	// 	$db->query("insert into {$tx}hotel_dashboards(total_customers,total_check_ins,total_check_outs,total_revenue,today_revenue,this_month_revenue,this_year_revenue,standard_rooms_total,deluxe_rooms_total,suite_rooms_total,penthouse_rooms_total,available_rooms,booked_rooms,maintenance_rooms,standard_rooms,deluxe_rooms,suite_rooms,penthouse_rooms,today_check_ins,today_check_outs,current_check_ins,future_check_ins,average_customer_rating,total_feedbacks,paid_payments,pending_payments,failed_payments,total_bookings,total_rooms,total_room_types,total_payments)values('$this->total_customers','$this->total_check_ins','$this->total_check_outs','$this->total_revenue','$this->today_revenue','$this->this_month_revenue','$this->this_year_revenue','$this->standard_rooms_total','$this->deluxe_rooms_total','$this->suite_rooms_total','$this->penthouse_rooms_total','$this->available_rooms','$this->booked_rooms','$this->maintenance_rooms','$this->standard_rooms','$this->deluxe_rooms','$this->suite_rooms','$this->penthouse_rooms','$this->today_check_ins','$this->today_check_outs','$this->current_check_ins','$this->future_check_ins','$this->average_customer_rating','$this->total_feedbacks','$this->paid_payments','$this->pending_payments','$this->failed_payments','$this->total_bookings','$this->total_rooms','$this->total_room_types','$this->total_payments')");
	// 	return $db->insert_id;
	// }
	// public function update(){
	// 	global $db,$tx;
	// 	$db->query("update {$tx}hotel_dashboards set total_customers='$this->total_customers',total_check_ins='$this->total_check_ins',total_check_outs='$this->total_check_outs',total_revenue='$this->total_revenue',today_revenue='$this->today_revenue',this_month_revenue='$this->this_month_revenue',this_year_revenue='$this->this_year_revenue',standard_rooms_total='$this->standard_rooms_total',deluxe_rooms_total='$this->deluxe_rooms_total',suite_rooms_total='$this->suite_rooms_total',penthouse_rooms_total='$this->penthouse_rooms_total',available_rooms='$this->available_rooms',booked_rooms='$this->booked_rooms',maintenance_rooms='$this->maintenance_rooms',standard_rooms='$this->standard_rooms',deluxe_rooms='$this->deluxe_rooms',suite_rooms='$this->suite_rooms',penthouse_rooms='$this->penthouse_rooms',today_check_ins='$this->today_check_ins',today_check_outs='$this->today_check_outs',current_check_ins='$this->current_check_ins',future_check_ins='$this->future_check_ins',average_customer_rating='$this->average_customer_rating',total_feedbacks='$this->total_feedbacks',paid_payments='$this->paid_payments',pending_payments='$this->pending_payments',failed_payments='$this->failed_payments',total_bookings='$this->total_bookings',total_rooms='$this->total_rooms',total_room_types='$this->total_room_types',total_payments='$this->total_payments' where id='$this->'");
	// }
	public static function delete($id)
	{
		global $db, $tx;
		$db->query("delete from {$tx}hotel_dashboards where id={$id}");
	}
	public function jsonSerialize(): mixed
	{
		return get_object_vars($this);
	}
	public static function all()
	{
		global $db, $tx;
		$result = $db->query("select total_customers,total_check_ins,total_check_outs,total_revenue,today_revenue,this_month_revenue,this_year_revenue,standard_rooms_total,deluxe_rooms_total,suite_rooms_total,penthouse_rooms_total,available_rooms,booked_rooms,maintenance_rooms,standard_rooms,deluxe_rooms,suite_rooms,penthouse_rooms,today_check_ins,today_check_outs,current_check_ins,future_check_ins,average_customer_rating,total_feedbacks,paid_payments,pending_payments,failed_payments,total_bookings,total_rooms,total_room_types,total_payments from {$tx}hotel_dashboards");
		$data = [];
		while ($hoteldashboard = $result->fetch_object()) {
			$data[] = $hoteldashboard;
		}
		return $data;
	}
	public static function checkin_checkout_statistics(){
		global $db, $tx;
		$result = $db->query("SELECT 
								rt.name AS room_type,
								r.room_number AS room_number,
								c.name AS customer_name,
								b.check_in_date AS check_in_time,
								b.check_out_date AS check_out_time
							FROM 
								ht_bookings b
							INNER JOIN 
								ht_customers c ON b.customer_id = c.id
							INNER JOIN 
								ht_rooms r ON b.room_id = r.id
							INNER JOIN 
								ht_room_types rt ON r.room_type_id = rt.id
							WHERE 
								b.status_id = (SELECT id FROM ht_statuss WHERE name = 'Booked')
							ORDER BY 
								b.check_out_date ASC LIMIT 4;");
		$data = [];
		while ($hoteldashboard = $result->fetch_object()) {
			$data[] = $hoteldashboard;
		}
		return $data;
	}
	public static function pagination($page = 1, $perpage = 10, $criteria = "")
	{
		global $db, $tx;
		$top = ($page - 1) * $perpage;
		$result = $db->query("select total_customers,total_check_ins,total_check_outs,total_revenue,today_revenue,this_month_revenue,this_year_revenue,standard_rooms_total,deluxe_rooms_total,suite_rooms_total,penthouse_rooms_total,available_rooms,booked_rooms,maintenance_rooms,standard_rooms,deluxe_rooms,suite_rooms,penthouse_rooms,today_check_ins,today_check_outs,current_check_ins,future_check_ins,average_customer_rating,total_feedbacks,paid_payments,pending_payments,failed_payments,total_bookings,total_rooms,total_room_types,total_payments from {$tx}hotel_dashboards $criteria limit $top,$perpage");
		$data = [];
		while ($hoteldashboard = $result->fetch_object()) {
			$data[] = $hoteldashboard;
		}
		return $data;
	}
	public static function count($criteria = "")
	{
		global $db, $tx;
		$result = $db->query("select count(*) from {$tx}hotel_dashboards $criteria");
		list($count) = $result->fetch_row();
		return $count;
	}
	public static function find()
	{
		global $db, $tx;
		$result = $db->query("select TOP 1 total_customers,total_check_ins,total_check_outs,total_revenue,today_revenue,this_month_revenue,this_year_revenue,standard_rooms_total,deluxe_rooms_total,suite_rooms_total,penthouse_rooms_total,available_rooms,booked_rooms,maintenance_rooms,standard_rooms,deluxe_rooms,suite_rooms,penthouse_rooms,today_check_ins,today_check_outs,current_check_ins,future_check_ins,average_customer_rating,total_feedbacks,paid_payments,pending_payments,failed_payments,total_bookings,total_rooms,total_room_types,total_payments from {$tx}hotel_dashboards");
		$hoteldashboard = $result->fetch_object();
		return $hoteldashboard;
	}
	public static function findColumn($columnName)
	{
		global $db, $tx;

		$result = $db->query("SELECT {$columnName} FROM {$tx}hotel_dashboards");
		$hoteldashboard = $result->fetch_object();

		return $hoteldashboard ? $hoteldashboard->$columnName : null;
	}

	static function get_last_id()
	{
		global $db, $tx;
		$result = $db->query("select max(id) last_id from {$tx}hotel_dashboards");
		$hoteldashboard = $result->fetch_object();
		return $hoteldashboard->last_id;
	}
	public function json()
	{
		return json_encode($this);
	}
	public function __toString()
	{
		return "		Total Customers:$this->total_customers<br> 
		Total Check Ins:$this->total_check_ins<br> 
		Total Check Outs:$this->total_check_outs<br> 
		Total Revenue:$this->total_revenue<br> 
		Today Revenue:$this->today_revenue<br> 
		This Month Revenue:$this->this_month_revenue<br> 
		This Year Revenue:$this->this_year_revenue<br> 
		Standard Rooms Total:$this->standard_rooms_total<br> 
		Deluxe Rooms Total:$this->deluxe_rooms_total<br> 
		Suite Rooms Total:$this->suite_rooms_total<br> 
		Penthouse Rooms Total:$this->penthouse_rooms_total<br> 
		Available Rooms:$this->available_rooms<br> 
		Booked Rooms:$this->booked_rooms<br> 
		Maintenance Rooms:$this->maintenance_rooms<br> 
		Standard Rooms:$this->standard_rooms<br> 
		Deluxe Rooms:$this->deluxe_rooms<br> 
		Suite Rooms:$this->suite_rooms<br> 
		Penthouse Rooms:$this->penthouse_rooms<br> 
		Today Check Ins:$this->today_check_ins<br> 
		Today Check Outs:$this->today_check_outs<br> 
		Current Check Ins:$this->current_check_ins<br> 
		Future Check Ins:$this->future_check_ins<br> 
		Average Customer Rating:$this->average_customer_rating<br> 
		Total Feedbacks:$this->total_feedbacks<br> 
		Paid Payments:$this->paid_payments<br> 
		Pending Payments:$this->pending_payments<br> 
		Failed Payments:$this->failed_payments<br> 
		Total Bookings:$this->total_bookings<br> 
		Total Rooms:$this->total_rooms<br> 
		Total Room Types:$this->total_room_types<br> 
		Total Payments:$this->total_payments<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name = "cmbHotelDashboard")
	{
		global $db, $tx;
		$html = "<select id='$name' name='$name'> ";
		$result = $db->query("select id,name from {$tx}hotel_dashboards");
		while ($hoteldashboard = $result->fetch_object()) {
			$html .= "<option value ='$hoteldashboard->id'>$hoteldashboard->name</option>";
		}
		$html .= "</select>";
		return $html;
	}
	static function html_table($page = 1, $perpage = 10, $criteria = "", $action = true)
	{
		global $db, $tx, $base_url;
		$count_result = $db->query("select count(*) total from {$tx}hotel_dashboards $criteria ");
		list($total_rows) = $count_result->fetch_row();
		$total_pages = ceil($total_rows / $perpage);
		$top = ($page - 1) * $perpage;
		$result = $db->query("select total_customers,total_check_ins,total_check_outs,total_revenue,today_revenue,this_month_revenue,this_year_revenue,standard_rooms_total,deluxe_rooms_total,suite_rooms_total,penthouse_rooms_total,available_rooms,booked_rooms,maintenance_rooms,standard_rooms,deluxe_rooms,suite_rooms,penthouse_rooms,today_check_ins,today_check_outs,current_check_ins,future_check_ins,average_customer_rating,total_feedbacks,paid_payments,pending_payments,failed_payments,total_bookings,total_rooms,total_room_types,total_payments from {$tx}hotel_dashboards $criteria limit $top,$perpage");
		$html = "<table class='table'>";
		$html .= "<tr><th colspan='3'>" . Html::link(["class" => "btn btn-success", "route" => "hoteldashboard/create", "text" => "New HotelDashboard"]) . "</th></tr>";
		if ($action) {
			$html .= "<tr><th>Total Customers</th><th>Total Check Ins</th><th>Total Check Outs</th><th>Total Revenue</th><th>Today Revenue</th><th>This Month Revenue</th><th>This Year Revenue</th><th>Standard Rooms Total</th><th>Deluxe Rooms Total</th><th>Suite Rooms Total</th><th>Penthouse Rooms Total</th><th>Available Rooms</th><th>Booked Rooms</th><th>Maintenance Rooms</th><th>Standard Rooms</th><th>Deluxe Rooms</th><th>Suite Rooms</th><th>Penthouse Rooms</th><th>Today Check Ins</th><th>Today Check Outs</th><th>Current Check Ins</th><th>Future Check Ins</th><th>Average Customer Rating</th><th>Total Feedbacks</th><th>Paid Payments</th><th>Pending Payments</th><th>Failed Payments</th><th>Total Bookings</th><th>Total Rooms</th><th>Total Room Types</th><th>Total Payments</th><th>Action</th></tr>";
		} else {
			$html .= "<tr><th>Total Customers</th><th>Total Check Ins</th><th>Total Check Outs</th><th>Total Revenue</th><th>Today Revenue</th><th>This Month Revenue</th><th>This Year Revenue</th><th>Standard Rooms Total</th><th>Deluxe Rooms Total</th><th>Suite Rooms Total</th><th>Penthouse Rooms Total</th><th>Available Rooms</th><th>Booked Rooms</th><th>Maintenance Rooms</th><th>Standard Rooms</th><th>Deluxe Rooms</th><th>Suite Rooms</th><th>Penthouse Rooms</th><th>Today Check Ins</th><th>Today Check Outs</th><th>Current Check Ins</th><th>Future Check Ins</th><th>Average Customer Rating</th><th>Total Feedbacks</th><th>Paid Payments</th><th>Pending Payments</th><th>Failed Payments</th><th>Total Bookings</th><th>Total Rooms</th><th>Total Room Types</th><th>Total Payments</th></tr>";
		}
		while ($hoteldashboard = $result->fetch_object()) {
			$action_buttons = "";
			if ($action) {
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons .= Event::button(["name" => "show", "value" => "Show", "class" => "btn btn-info", "route" => "hoteldashboard/show/$hoteldashboard->id"]);
				$action_buttons .= Event::button(["name" => "edit", "value" => "Edit", "class" => "btn btn-primary", "route" => "hoteldashboard/edit/$hoteldashboard->id"]);
				$action_buttons .= Event::button(["name" => "delete", "value" => "Delete", "class" => "btn btn-danger", "route" => "hoteldashboard/confirm/$hoteldashboard->id"]);
				$action_buttons .= "</div></td>";
			}
			$html .= "<tr><td>$hoteldashboard->total_customers</td><td>$hoteldashboard->total_check_ins</td><td>$hoteldashboard->total_check_outs</td><td>$hoteldashboard->total_revenue</td><td>$hoteldashboard->today_revenue</td><td>$hoteldashboard->this_month_revenue</td><td>$hoteldashboard->this_year_revenue</td><td>$hoteldashboard->standard_rooms_total</td><td>$hoteldashboard->deluxe_rooms_total</td><td>$hoteldashboard->suite_rooms_total</td><td>$hoteldashboard->penthouse_rooms_total</td><td>$hoteldashboard->available_rooms</td><td>$hoteldashboard->booked_rooms</td><td>$hoteldashboard->maintenance_rooms</td><td>$hoteldashboard->standard_rooms</td><td>$hoteldashboard->deluxe_rooms</td><td>$hoteldashboard->suite_rooms</td><td>$hoteldashboard->penthouse_rooms</td><td>$hoteldashboard->today_check_ins</td><td>$hoteldashboard->today_check_outs</td><td>$hoteldashboard->current_check_ins</td><td>$hoteldashboard->future_check_ins</td><td>$hoteldashboard->average_customer_rating</td><td>$hoteldashboard->total_feedbacks</td><td>$hoteldashboard->paid_payments</td><td>$hoteldashboard->pending_payments</td><td>$hoteldashboard->failed_payments</td><td>$hoteldashboard->total_bookings</td><td>$hoteldashboard->total_rooms</td><td>$hoteldashboard->total_room_types</td><td>$hoteldashboard->total_payments</td> $action_buttons</tr>";
		}
		$html .= "</table>";
		$html .= pagination($page, $total_pages);
		return $html;
	}
	static function html_row_details($id)
	{
		global $db, $tx, $base_url;
		$result = $db->query("select total_customers,total_check_ins,total_check_outs,total_revenue,today_revenue,this_month_revenue,this_year_revenue,standard_rooms_total,deluxe_rooms_total,suite_rooms_total,penthouse_rooms_total,available_rooms,booked_rooms,maintenance_rooms,standard_rooms,deluxe_rooms,suite_rooms,penthouse_rooms,today_check_ins,today_check_outs,current_check_ins,future_check_ins,average_customer_rating,total_feedbacks,paid_payments,pending_payments,failed_payments,total_bookings,total_rooms,total_room_types,total_payments from {$tx}hotel_dashboards where id={$id}");
		$hoteldashboard = $result->fetch_object();
		$html = "<table class='table'>";
		$html .= "<tr><th colspan=\"2\">HotelDashboard Show</th></tr>";
		$html .= "<tr><th>Total Customers</th><td>$hoteldashboard->total_customers</td></tr>";
		$html .= "<tr><th>Total Check Ins</th><td>$hoteldashboard->total_check_ins</td></tr>";
		$html .= "<tr><th>Total Check Outs</th><td>$hoteldashboard->total_check_outs</td></tr>";
		$html .= "<tr><th>Total Revenue</th><td>$hoteldashboard->total_revenue</td></tr>";
		$html .= "<tr><th>Today Revenue</th><td>$hoteldashboard->today_revenue</td></tr>";
		$html .= "<tr><th>This Month Revenue</th><td>$hoteldashboard->this_month_revenue</td></tr>";
		$html .= "<tr><th>This Year Revenue</th><td>$hoteldashboard->this_year_revenue</td></tr>";
		$html .= "<tr><th>Standard Rooms Total</th><td>$hoteldashboard->standard_rooms_total</td></tr>";
		$html .= "<tr><th>Deluxe Rooms Total</th><td>$hoteldashboard->deluxe_rooms_total</td></tr>";
		$html .= "<tr><th>Suite Rooms Total</th><td>$hoteldashboard->suite_rooms_total</td></tr>";
		$html .= "<tr><th>Penthouse Rooms Total</th><td>$hoteldashboard->penthouse_rooms_total</td></tr>";
		$html .= "<tr><th>Available Rooms</th><td>$hoteldashboard->available_rooms</td></tr>";
		$html .= "<tr><th>Booked Rooms</th><td>$hoteldashboard->booked_rooms</td></tr>";
		$html .= "<tr><th>Maintenance Rooms</th><td>$hoteldashboard->maintenance_rooms</td></tr>";
		$html .= "<tr><th>Standard Rooms</th><td>$hoteldashboard->standard_rooms</td></tr>";
		$html .= "<tr><th>Deluxe Rooms</th><td>$hoteldashboard->deluxe_rooms</td></tr>";
		$html .= "<tr><th>Suite Rooms</th><td>$hoteldashboard->suite_rooms</td></tr>";
		$html .= "<tr><th>Penthouse Rooms</th><td>$hoteldashboard->penthouse_rooms</td></tr>";
		$html .= "<tr><th>Today Check Ins</th><td>$hoteldashboard->today_check_ins</td></tr>";
		$html .= "<tr><th>Today Check Outs</th><td>$hoteldashboard->today_check_outs</td></tr>";
		$html .= "<tr><th>Current Check Ins</th><td>$hoteldashboard->current_check_ins</td></tr>";
		$html .= "<tr><th>Future Check Ins</th><td>$hoteldashboard->future_check_ins</td></tr>";
		$html .= "<tr><th>Average Customer Rating</th><td>$hoteldashboard->average_customer_rating</td></tr>";
		$html .= "<tr><th>Total Feedbacks</th><td>$hoteldashboard->total_feedbacks</td></tr>";
		$html .= "<tr><th>Paid Payments</th><td>$hoteldashboard->paid_payments</td></tr>";
		$html .= "<tr><th>Pending Payments</th><td>$hoteldashboard->pending_payments</td></tr>";
		$html .= "<tr><th>Failed Payments</th><td>$hoteldashboard->failed_payments</td></tr>";
		$html .= "<tr><th>Total Bookings</th><td>$hoteldashboard->total_bookings</td></tr>";
		$html .= "<tr><th>Total Rooms</th><td>$hoteldashboard->total_rooms</td></tr>";
		$html .= "<tr><th>Total Room Types</th><td>$hoteldashboard->total_room_types</td></tr>";
		$html .= "<tr><th>Total Payments</th><td>$hoteldashboard->total_payments</td></tr>";

		$html .= "</table>";
		return $html;
	}
}
