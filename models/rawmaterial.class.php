<?php
class RawMaterial implements JsonSerializable{
	public $id;
	public $r_name;
	public $price;
	public $measure;
	public $uom_id;

	public function __construct(){
	}
	public function set($id,$r_name,$price,$measure,$uom_id){
		$this->id=$id;
		$this->r_name=$r_name;
		$this->price=$price;
		$this->measure=$measure;
		$this->uom_id=$uom_id;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}raw_materials(r_name,price,measure,uom_id)values('$this->r_name','$this->price','$this->measure','$this->uom_id')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}raw_materials set r_name='$this->r_name',price='$this->price',measure='$this->measure',uom_id='$this->uom_id' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}raw_materials where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,r_name,price,measure,uom_id from {$tx}raw_materials");
		$data=[];
		while($rawmaterial=$result->fetch_object()){
			$data[]=$rawmaterial;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,r_name,price,measure,uom_id from {$tx}raw_materials $criteria limit $top,$perpage");
		$data=[];
		while($rawmaterial=$result->fetch_object()){
			$data[]=$rawmaterial;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}raw_materials $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select r.id,r.r_name,r.price,r.measure,u.name uname from {$tx}raw_materials r,{$tx}uoms u where r.uom_id=u.id and r.id='$id'");
		$rawmaterial=$result->fetch_object();
			return $rawmaterial;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}raw_materials");
		$rawmaterial =$result->fetch_object();
		return $rawmaterial->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		R Name:$this->r_name<br> 
		Price:$this->price<br> 
		Measure:$this->measure<br> 
		Uom Id:$this->uom_id<br> 
";
	}

	//-------------HTML----------//

	static function html_select($r_name="cmbRawMaterial"){
		global $db,$tx;
		$html="<select id='$r_name' name='$r_name'> ";
		$result =$db->query("select id,r_name from {$tx}raw_materials");
		while($rawmaterial=$result->fetch_object()){
			$html.="<option value ='$rawmaterial->id'>$rawmaterial->r_name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}raw_materials $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select r.id,r.r_name,r.price,r.measure,u.name uom from {$tx}raw_materials r,{$tx}uoms u where r.uom_id=u.id  $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-rawmaterial\">New RawMaterial</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>R Name</th><th>Price</th><th>Measure</th><th>Uom Name</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>R Name</th><th>Price</th><th>Measure</th><th>Uom Name</th></tr>";
		}
		while($rawmaterial=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$rawmaterial->id, "name"=>"Details", "value"=>"Detials", "class"=>"info", "url"=>"details-rawmaterial"]);
				$action_buttons.= action_button(["id"=>$rawmaterial->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-rawmaterial"]);
				$action_buttons.= action_button(["id"=>$rawmaterial->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"raw_materials"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$rawmaterial->id</td><td>$rawmaterial->r_name</td><td>$rawmaterial->price</td><td>$rawmaterial->measure</td><td>$rawmaterial->uom</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,r_name,price,measure,uom_id from {$tx}raw_materials where id={$id}");
		$rawmaterial=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">RawMaterial Details</th></tr>";
		$html.="<tr><th>Id</th><td>$rawmaterial->id</td></tr>";
		$html.="<tr><th>R Name</th><td>$rawmaterial->r_name</td></tr>";
		$html.="<tr><th>Price</th><td>$rawmaterial->price</td></tr>";
		$html.="<tr><th>Measure</th><td>$rawmaterial->measure</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$rawmaterial->uom_id</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
