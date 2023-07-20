<?php
class Stock implements JsonSerializable{
	public $id;
	public $material_id;
	public $measure;
	public $uom_id;

	public function __construct(){
	}
	public function set($id,$material_id,$measure,$uom_id){
		$this->id=$id;
		$this->material_id=$material_id;
		$this->measure=$measure;
		$this->uom_id=$uom_id;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}stocks(material_id,measure,uom_id)values('$this->material_id','$this->measure','$this->uom_id')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}stocks set material_id='$this->material_id',measure='$this->measure',uom_id='$this->uom_id' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}stocks where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,material_id,measure,uom_id from {$tx}stocks");
		$data=[];
		while($stock=$result->fetch_object()){
			$data[]=$stock;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,material_id,measure,uom_id from {$tx}stocks $criteria limit $top,$perpage");
		$data=[];
		while($stock=$result->fetch_object()){
			$data[]=$stock;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}stocks $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,material_id,measure,uom_id from {$tx}stocks where id='$id'");
		$stock=$result->fetch_object();
			return $stock;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}stocks");
		$stock =$result->fetch_object();
		return $stock->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Material Id:$this->material_id<br> 
		Measure:$this->measure<br> 
		Uom Id:$this->uom_id<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbStock"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}stocks");
		while($stock=$result->fetch_object()){
			$html.="<option value ='$stock->id'>$stock->name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}stocks $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		//select s.id sid,p.id,p.name, sum(s.qty) stock from {$tx}stocks s,{$tx}products p where p.id=s.product_id group by s.product_id  $criteria limit $top,$perpage
		$result=$db->query("select s.id,m.r_name,s.measure,u.name uname from {$tx}stocks s,{$tx}raw_materials m,{$tx}uoms u where s.material_id=m.id and s.uom_id=u.id $criteria limit $top,$perpage");
		$html="<table class='table'>";
			// $html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-stock\">New Stock</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Material Id</th><th>Measure</th><th>Uom </th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Material Id</th><th>Measure</th><th>Uom</th></tr>";
		}
		while($stock=$result->fetch_object()){
			$action_buttons = "";
			// if($action){
			// 	$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
			// 	$action_buttons.= action_button(["id"=>$stock->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-stock"]);
			// 	 $action_buttons.= action_button(["id"=>$stock->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-stock"]);
			// 	 $action_buttons.= action_button(["id"=>$stock->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"stocks"]);
			// 	$action_buttons.= "</div></td>";
			// }
			$html.="<tr><td>$stock->id</td><td>$stock->r_name</td><td>$stock->measure</td><td>$stock->uname</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,material_id,measure,uom_id from {$tx}stocks where id={$id}");
		$stock=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Stock Details</th></tr>";
		$html.="<tr><th>Id</th><td>$stock->id</td></tr>";
		$html.="<tr><th>Material Id</th><td>$stock->material_id</td></tr>";
		$html.="<tr><th>Measure</th><td>$stock->measure</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$stock->uom_id</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
