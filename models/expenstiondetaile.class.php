<?php
class ExpenstionDetaile implements JsonSerializable{
	public $id;
	public $expenstion_id;
	public $menu_id;
	public $material_id;
	public $measure;
	public $uom_id;

	public function __construct(){
	}
	public function set($id,$expenstion_id,$menu_id,$material_id,$measure,$uom_id){
		$this->id=$id;
		$this->expenstion_id=$expenstion_id;
		$this->menu_id=$menu_id;
		$this->material_id=$material_id;
		$this->measure=$measure;
		$this->uom_id=$uom_id;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}expenstion_detailes(expenstion_id,menu_id,material_id,measure,uom_id)values('$this->expenstion_id','$this->menu_id','$this->material_id','$this->measure','$this->uom_id')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}expenstion_detailes set expenstion_id='$this->expenstion_id',menu_id='$this->menu_id',material_id='$this->material_id',measure='$this->measure',uom_id='$this->uom_id' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}expenstion_detailes where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,expenstion_id,menu_id,material_id,measure,uom_id from {$tx}expenstion_detailes");
		$data=[];
		while($expenstiondetaile=$result->fetch_object()){
			$data[]=$expenstiondetaile;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,expenstion_id,menu_id,material_id,measure,uom_id from {$tx}expenstion_detailes $criteria limit $top,$perpage");
		$data=[];
		while($expenstiondetaile=$result->fetch_object()){
			$data[]=$expenstiondetaile;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}expenstion_detailes $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,expenstion_id,menu_id,material_id,measure,uom_id from {$tx}expenstion_detailes where id='$id'");
		$expenstiondetaile=$result->fetch_object();
			return $expenstiondetaile;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}expenstion_detailes");
		$expenstiondetaile =$result->fetch_object();
		return $expenstiondetaile->last_id;
	}

	public static function all_by_expense_id($order_id){
		global $db,$tx;
		$result=$db->query("select e.menu_id,e.expenstion_id,m.name,r.r_name rname,e.measure,u.name uname from {$tx}expenstion_detailes e,{$tx}menus m,{$tx}raw_materials r,{$tx}uoms u where e.menu_id=m.id and e.material_id=r.id and e.uom_id=u.id and e.expenstion_id={$order_id}");
		$data=[];
		while($expenstiondetaile=$result->fetch_object()){
			$data[]=$expenstiondetaile;
		}
		return $data;

	}

	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Expenstion Id:$this->expenstion_id<br> 
		Menu Id:$this->menu_id<br> 
		Material Id:$this->material_id<br> 
		Measure:$this->measure<br> 
		Uom Id:$this->uom_id<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbExpenstionDetaile"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}expenstion_detailes");
		while($expenstiondetaile=$result->fetch_object()){
			$html.="<option value ='$expenstiondetaile->id'>$expenstiondetaile->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}expenstion_detailes $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,expenstion_id,menu_id,material_id,measure,uom_id from {$tx}expenstion_detailes $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-expenstiondetaile\">New ExpenstionDetaile</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Expenstion Id</th><th>Menu Id</th><th>Material Id</th><th>Measure</th><th>Uom Id</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Expenstion Id</th><th>Menu Id</th><th>Material Id</th><th>Measure</th><th>Uom Id</th></tr>";
		}
		while($expenstiondetaile=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$expenstiondetaile->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-expenstiondetaile"]);
				$action_buttons.= action_button(["id"=>$expenstiondetaile->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-expenstiondetaile"]);
				$action_buttons.= action_button(["id"=>$expenstiondetaile->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"expenstion_detailes"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$expenstiondetaile->id</td><td>$expenstiondetaile->expenstion_id</td><td>$expenstiondetaile->menu_id</td><td>$expenstiondetaile->material_id</td><td>$expenstiondetaile->measure</td><td>$expenstiondetaile->uom_id</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,expenstion_id,menu_id,material_id,measure,uom_id from {$tx}expenstion_detailes where id={$id}");
		$expenstiondetaile=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">ExpenstionDetaile Details</th></tr>";
		$html.="<tr><th>Id</th><td>$expenstiondetaile->id</td></tr>";
		$html.="<tr><th>Expenstion Id</th><td>$expenstiondetaile->expenstion_id</td></tr>";
		$html.="<tr><th>Menu Id</th><td>$expenstiondetaile->menu_id</td></tr>";
		$html.="<tr><th>Material Id</th><td>$expenstiondetaile->material_id</td></tr>";
		$html.="<tr><th>Measure</th><td>$expenstiondetaile->measure</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$expenstiondetaile->uom_id</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
