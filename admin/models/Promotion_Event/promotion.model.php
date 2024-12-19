<?php
class Promotion extends Model implements JsonSerializable{
	public $id;
	public $name;
	public $description;
	public $discount_percentage;
	public $start_date;
	public $end_date;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$name,$description,$discount_percentage,$start_date,$end_date,$created_at,$updated_at){
		$this->id=$id;
		$this->name=$name;
		$this->description=$description;
		$this->discount_percentage=$discount_percentage;
		$this->start_date=$start_date;
		$this->end_date=$end_date;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}promotions(name,description,discount_percentage,start_date,end_date,created_at,updated_at)values('$this->name','$this->description','$this->discount_percentage','$this->start_date','$this->end_date','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}promotions set name='$this->name',description='$this->description',discount_percentage='$this->discount_percentage',start_date='$this->start_date',end_date='$this->end_date',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}promotions where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,description,discount_percentage,start_date,end_date,created_at,updated_at from {$tx}promotions");
		$data=[];
		while($promotion=$result->fetch_object()){
			$data[]=$promotion;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,description,discount_percentage,start_date,end_date,created_at,updated_at from {$tx}promotions $criteria limit $top,$perpage");
		$data=[];
		while($promotion=$result->fetch_object()){
			$data[]=$promotion;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}promotions $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,description,discount_percentage,start_date,end_date,created_at,updated_at from {$tx}promotions where id='$id'");
		$promotion=$result->fetch_object();
			return $promotion;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}promotions");
		$promotion =$result->fetch_object();
		return $promotion->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Description:$this->description<br> 
		Discount Percentage:$this->discount_percentage<br> 
		Start Date:$this->start_date<br> 
		End Date:$this->end_date<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbPromotion"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}promotions");
		while($promotion=$result->fetch_object()){
			$html.="<option value ='$promotion->id'>$promotion->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}promotions $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,description,discount_percentage,start_date,end_date,created_at,updated_at from {$tx}promotions $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"promotion/create","text"=>"New Promotion"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Description</th><th>Discount Percentage</th><th>Start Date</th><th>End Date</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Description</th><th>Discount Percentage</th><th>Start Date</th><th>End Date</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($promotion=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"promotion/show/$promotion->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"promotion/edit/$promotion->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"promotion/confirm/$promotion->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$promotion->id</td><td>$promotion->name</td><td>$promotion->description</td><td>$promotion->discount_percentage</td><td>$promotion->start_date</td><td>$promotion->end_date</td><td>$promotion->created_at</td><td>$promotion->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,name,description,discount_percentage,start_date,end_date,created_at,updated_at from {$tx}promotions where id={$id}");
		$promotion=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Promotion Show</th></tr>";
		$html.="<tr><th>Id</th><td>$promotion->id</td></tr>";
		$html.="<tr><th>Name</th><td>$promotion->name</td></tr>";
		$html.="<tr><th>Description</th><td>$promotion->description</td></tr>";
		$html.="<tr><th>Discount Percentage</th><td>$promotion->discount_percentage</td></tr>";
		$html.="<tr><th>Start Date</th><td>$promotion->start_date</td></tr>";
		$html.="<tr><th>End Date</th><td>$promotion->end_date</td></tr>";
		$html.="<tr><th>Created At</th><td>$promotion->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$promotion->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
