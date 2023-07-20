<?php
class StockAdjustmentType implements JsonSerializable{
	public $id;
	public $name;

	public function __construct(){
	}
	public function set($id,$name){
		$this->id=$id;
		$this->name=$name;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}stock_adjustment_types(name)values('$this->name')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}stock_adjustment_types set name='$this->name' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}stock_adjustment_types where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}stock_adjustment_types");
		$data=[];
		while($stockadjustmenttype=$result->fetch_object()){
			$data[]=$stockadjustmenttype;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name from {$tx}stock_adjustment_types $criteria limit $top,$perpage");
		$data=[];
		while($stockadjustmenttype=$result->fetch_object()){
			$data[]=$stockadjustmenttype;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}stock_adjustment_types $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name from {$tx}stock_adjustment_types where id='$id'");
		$stockadjustmenttype=$result->fetch_object();
			return $stockadjustmenttype;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}stock_adjustment_types");
		$stockadjustmenttype =$result->fetch_object();
		return $stockadjustmenttype->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbStockAdjustmentType"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}stock_adjustment_types");
		while($stockadjustmenttype=$result->fetch_object()){
			$html.="<option value ='$stockadjustmenttype->id'>$stockadjustmenttype->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}stock_adjustment_types $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name from {$tx}stock_adjustment_types $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-stockadjustmenttype\">New StockAdjustmentType</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th></tr>";
		}
		while($stockadjustmenttype=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$stockadjustmenttype->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-stockadjustmenttype"]);
				$action_buttons.= action_button(["id"=>$stockadjustmenttype->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-stockadjustmenttype"]);
				$action_buttons.= action_button(["id"=>$stockadjustmenttype->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"stock_adjustment_types"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$stockadjustmenttype->id</td><td>$stockadjustmenttype->name</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name from {$tx}stock_adjustment_types where id={$id}");
		$stockadjustmenttype=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">StockAdjustmentType Details</th></tr>";
		$html.="<tr><th>Id</th><td>$stockadjustmenttype->id</td></tr>";
		$html.="<tr><th>Name</th><td>$stockadjustmenttype->name</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
