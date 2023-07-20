<?php
class Requisition implements JsonSerializable{
	public $id;
	public $name;
	public $price;
	public $qty;
	public $uom_id;
	public $created_date;

	public function __construct(){
	}
	public function set($id,$name,$price,$qty,$uom_id,$created_date){
		$this->id=$id;
		$this->name=$name;
		$this->price=$price;
		$this->qty=$qty;
		$this->uom_id=$uom_id;
		$this->created_date=$created_date;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}requisitions(name,price,qty,uom_id,created_date)values('$this->name','$this->price','$this->qty','$this->uom_id','$this->created_date')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}requisitions set name='$this->name',price='$this->price',qty='$this->qty',uom_id='$this->uom_id',created_date='$this->created_date' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}requisitions where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,price,qty,uom_id,created_date from {$tx}requisitions");
		$data=[];
		while($requisition=$result->fetch_object()){
			$data[]=$requisition;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,price,qty,uom_id,created_date from {$tx}requisitions $criteria limit $top,$perpage");
		$data=[];
		while($requisition=$result->fetch_object()){
			$data[]=$requisition;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}requisitions $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,price,qty,uom_id,created_date from {$tx}requisitions where id='$id'");
		$requisition=$result->fetch_object();
			return $requisition;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}requisitions");
		$requisition =$result->fetch_object();
		return $requisition->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Price:$this->price<br> 
		Qty:$this->qty<br> 
		Uom Id:$this->uom_id<br> 
		Created Date:$this->created_date<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbRequisition"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}requisitions");
		while($requisition=$result->fetch_object()){
			$html.="<option value ='$requisition->id'>$requisition->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}requisitions $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select r.id,r.name,r.price,r.qty,u.name uuom,r.created_date from {$tx}requisitions r,{$tx}uom u where r.uom_id=u.id $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-requisition\">New Requisition</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Price</th><th>Qty</th><th>Uom Name</th><th>Created Date</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Price</th><th>Qty</th><th>Uom Name</th><th>Created Date</th></tr>";
		}
		while($requisition=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$requisition->id, "name"=>"Details", "value"=>"Detials", "class"=>"info", "url"=>"details-requisition"]);
				$action_buttons.= action_button(["id"=>$requisition->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-requisition"]);
				$action_buttons.= action_button(["id"=>$requisition->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"requisitions"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$requisition->id</td><td>$requisition->name</td><td>$requisition->price</td><td>$requisition->qty</td><td>$requisition->uuom</td><td>$requisition->created_date</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,price,qty,uom_id,created_date from {$tx}requisitions where id={$id}");
		$requisition=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Requisition Details</th></tr>";
		$html.="<tr><th>Id</th><td>$requisition->id</td></tr>";
		$html.="<tr><th>Name</th><td>$requisition->name</td></tr>";
		$html.="<tr><th>Price</th><td>$requisition->price</td></tr>";
		$html.="<tr><th>Qty</th><td>$requisition->qty</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$requisition->uom_id</td></tr>";
		$html.="<tr><th>Created Date</th><td>$requisition->created_date</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
