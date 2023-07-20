<?php
class PreparationToMenu implements JsonSerializable{
	public $id;
	public $menu_id;
	public $sub_preparation_id;
	public $mesure;
	public $uom_id;
	public $pic;

	public function __construct(){
	}
	public function set($id,$menu_id,$sub_preparation_id,$mesure,$uom_id,$pic){
		$this->id=$id;
		$this->menu_id=$menu_id;
		$this->sub_preparation_id=$sub_preparation_id;
		$this->mesure=$mesure;
		$this->uom_id=$uom_id;
		$this->pic=$pic;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}preparation_to_menus(menu_id,sub_preparation_id,mesure,uom_id,pic)values('$this->menu_id','$this->sub_preparation_id','$this->mesure','$this->uom_id','$this->pic')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}preparation_to_menus set menu_id='$this->menu_id',sub_preparation_id='$this->sub_preparation_id',mesure='$this->mesure',uom_id='$this->uom_id',pic='$this->pic' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}preparation_to_menus where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,menu_id,sub_preparation_id,mesure,uom_id,pic from {$tx}preparation_to_menus");
		$data=[];
		while($preparationtomenu=$result->fetch_object()){
			$data[]=$preparationtomenu;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,menu_id,sub_preparation_id,mesure,uom_id,pic from {$tx}preparation_to_menus $criteria limit $top,$perpage");
		$data=[];
		while($preparationtomenu=$result->fetch_object()){
			$data[]=$preparationtomenu;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}preparation_to_menus $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,menu_id,sub_preparation_id,mesure,uom_id,pic from {$tx}preparation_to_menus where id='$id'");
		$preparationtomenu=$result->fetch_object();
			return $preparationtomenu;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}preparation_to_menus");
		$preparationtomenu =$result->fetch_object();
		return $preparationtomenu->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Menu Id:$this->menu_id<br> 
		Sub Preparation Id:$this->sub_preparation_id<br> 
		Mesure:$this->mesure<br> 
		Uom Id:$this->uom_id<br> 
		Pic:$this->pic<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbPreparationToMenu"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}preparation_to_menus");
		while($preparationtomenu=$result->fetch_object()){
			$html.="<option value ='$preparationtomenu->id'>$preparationtomenu->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}preparation_to_menus $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select p.id,m.name mname,s.name sname,p.mesure,u.name uname,p.pic from {$tx}preparation_to_menus p,{$tx}menus m,{$tx}sub_preparationmenus s,{$tx}uoms u where p.menu_id=m.id and p.sub_preparation_id=s.id and p.uom_id=u.id $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-preparationtomenu\">New PreparationToMenu</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Menu Name</th><th>Sub Preparation Name</th><th>Mesure</th><th>Uom name</th><th>Pic</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Menu Name</th><th>Sub Preparation Name</th><th>Mesure</th><th>Uom Name</th><th>Pic</th></tr>";
		}
		while($preparationtomenu=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$preparationtomenu->id, "name"=>"Details", "value"=>"Detials", "class"=>"info", "url"=>"details-preparationtomenu"]);
				$action_buttons.= action_button(["id"=>$preparationtomenu->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-preparationtomenu"]);
				$action_buttons.= action_button(["id"=>$preparationtomenu->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"preparation_to_menus"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$preparationtomenu->id</td><td>$preparationtomenu->mname</td><td>$preparationtomenu->sname</td><td>$preparationtomenu->mesure</td><td>$preparationtomenu->uname</td><td>$preparationtomenu->pic</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,menu_id,sub_preparation_id,mesure,uom_id,pic from {$tx}preparation_to_menus where id={$id}");
		$preparationtomenu=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">PreparationToMenu Details</th></tr>";
		$html.="<tr><th>Id</th><td>$preparationtomenu->id</td></tr>";
		$html.="<tr><th>Menu Id</th><td>$preparationtomenu->menu_id</td></tr>";
		$html.="<tr><th>Sub Preparation Id</th><td>$preparationtomenu->sub_preparation_id</td></tr>";
		$html.="<tr><th>Mesure</th><td>$preparationtomenu->mesure</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$preparationtomenu->uom_id</td></tr>";
		$html.="<tr><th>Pic</th><td>$preparationtomenu->pic</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
