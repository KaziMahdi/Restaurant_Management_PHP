<?php
class SubPreparationmenu implements JsonSerializable{
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
		$db->query("insert into {$tx}sub_preparationmenus(name)values('$this->name')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}sub_preparationmenus set name='$this->name' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}sub_preparationmenus where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}sub_preparationmenus");
		$data=[];
		while($subpreparationmenu=$result->fetch_object()){
			$data[]=$subpreparationmenu;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name from {$tx}sub_preparationmenus $criteria limit $top,$perpage");
		$data=[];
		while($subpreparationmenu=$result->fetch_object()){
			$data[]=$subpreparationmenu;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}sub_preparationmenus $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name from {$tx}sub_preparationmenus where id='$id'");
		$subpreparationmenu=$result->fetch_object();
			return $subpreparationmenu;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}sub_preparationmenus");
		$subpreparationmenu =$result->fetch_object();
		return $subpreparationmenu->last_id;
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

	static function html_select($name="cmbSubPreparationmenu"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}sub_preparationmenus");
		while($subpreparationmenu=$result->fetch_object()){
			$html.="<option value ='$subpreparationmenu->id'>$subpreparationmenu->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}sub_preparationmenus $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name from {$tx}sub_preparationmenus $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-subpreparationmenu\">New SubPreparationmenu</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th></tr>";
		}
		while($subpreparationmenu=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$subpreparationmenu->id, "name"=>"Details", "value"=>"Detials", "class"=>"info", "url"=>"details-subpreparationmenu"]);
				$action_buttons.= action_button(["id"=>$subpreparationmenu->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-subpreparationmenu"]);
				$action_buttons.= action_button(["id"=>$subpreparationmenu->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"sub_preparationmenus"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$subpreparationmenu->id</td><td>$subpreparationmenu->name</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name from {$tx}sub_preparationmenus where id={$id}");
		$subpreparationmenu=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">SubPreparationmenu Details</th></tr>";
		$html.="<tr><th>Id</th><td>$subpreparationmenu->id</td></tr>";
		$html.="<tr><th>Name</th><td>$subpreparationmenu->name</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
