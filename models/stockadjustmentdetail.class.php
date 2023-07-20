<?php
class StockAdjustmentDetail implements JsonSerializable{
	public $id;
	public $adjustment_id;
	public $material_id;
	public $measure;
	public $price;
	public $uom_Id;

	public function __construct(){
	}
	public function set($id,$adjustment_id,$material_id,$measure,$price,$uom_Id){
		$this->id=$id;
		$this->adjustment_id=$adjustment_id;
		$this->material_id=$material_id;
		$this->measure=$measure;
		$this->price=$price;
		$this->uom_Id=$uom_Id;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}stock_adjustment_details(adjustment_id,material_id,measure,price,uom_Id)values('$this->adjustment_id','$this->material_id','$this->measure','$this->price','$this->uom_Id')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}stock_adjustment_details set adjustment_id='$this->adjustment_id',material_id='$this->material_id',measure='$this->measure',price='$this->price',uom_Id='$this->uom_Id' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}stock_adjustment_details where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,adjustment_id,material_id,measure,price,uom_Id from {$tx}stock_adjustment_details");
		$data=[];
		while($stockadjustmentdetail=$result->fetch_object()){
			$data[]=$stockadjustmentdetail;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,adjustment_id,material_id,measure,price,uom_Id from {$tx}stock_adjustment_details $criteria limit $top,$perpage");
		$data=[];
		while($stockadjustmentdetail=$result->fetch_object()){
			$data[]=$stockadjustmentdetail;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}stock_adjustment_details $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,adjustment_id,material_id,measure,price,uom_Id from {$tx}stock_adjustment_details where id='$id'");
		$stockadjustmentdetail=$result->fetch_object();
			return $stockadjustmentdetail;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}stock_adjustment_details");
		$stockadjustmentdetail =$result->fetch_object();
		return $stockadjustmentdetail->last_id;
	}

	public static function all_by_adjust_id($stockadjustment_id){
		global $db,$tx;
		 //$result=$db->query("select * from {$tx}stock_adjustment_details where adjustment_id={$adjustment_id}");
	$result=$db->query("select od.material_id,m.r_name mname,od.measure,od.price,u.name uname from {$tx}stock_adjustment_details od,{$tx}raw_materials m,{$tx}uoms u where m.id=od.material_id and u.id=od.uom_id and adjustment_id={$stockadjustment_id}");
		$data=[];
		while($stockadjustmentdetail=$result->fetch_object()){
			$data[]=$stockadjustmentdetail;
		}
		return $data;
	}


	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Adjustment Id:$this->adjustment_id<br> 
		Material Id:$this->material_id<br> 
		Measure:$this->measure<br> 
		Price:$this->price<br> 
		Uom Id:$this->uom_Id<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbStockAdjustmentDetail"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}stock_adjustment_details");
		while($stockadjustmentdetail=$result->fetch_object()){
			$html.="<option value ='$stockadjustmentdetail->id'>$stockadjustmentdetail->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}stock_adjustment_details $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,adjustment_id,material_id,measure,price,uom_Id from {$tx}stock_adjustment_details $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-stockadjustmentdetail\">New StockAdjustmentDetail</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Adjustment Id</th><th>Material Id</th><th>Measure</th><th>Price</th><th>Uom Id</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Adjustment Id</th><th>Material Id</th><th>Measure</th><th>Price</th><th>Uom Id</th></tr>";
		}
		while($stockadjustmentdetail=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$stockadjustmentdetail->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-stockadjustmentdetail"]);
				$action_buttons.= action_button(["id"=>$stockadjustmentdetail->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-stockadjustmentdetail"]);
				$action_buttons.= action_button(["id"=>$stockadjustmentdetail->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"stock_adjustment_details"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$stockadjustmentdetail->id</td><td>$stockadjustmentdetail->adjustment_id</td><td>$stockadjustmentdetail->material_id</td><td>$stockadjustmentdetail->measure</td><td>$stockadjustmentdetail->price</td><td>$stockadjustmentdetail->uom_Id</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,adjustment_id,material_id,measure,price,uom_Id from {$tx}stock_adjustment_details where id={$id}");
		$stockadjustmentdetail=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">StockAdjustmentDetail Details</th></tr>";
		$html.="<tr><th>Id</th><td>$stockadjustmentdetail->id</td></tr>";
		$html.="<tr><th>Adjustment Id</th><td>$stockadjustmentdetail->adjustment_id</td></tr>";
		$html.="<tr><th>Material Id</th><td>$stockadjustmentdetail->material_id</td></tr>";
		$html.="<tr><th>Measure</th><td>$stockadjustmentdetail->measure</td></tr>";
		$html.="<tr><th>Price</th><td>$stockadjustmentdetail->price</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$stockadjustmentdetail->uom_Id</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
