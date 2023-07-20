<?php
class Mesur implements JsonSerializable{
	public $id;
	public $mesure;

	public function __construct(){
	}
	public function set($id,$mesure){
		$this->id=$id;
		$this->mesure=$mesure;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}mesurs(mesure)values('$this->mesure')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}mesurs set mesure='$this->mesure' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}mesurs where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,mesure from {$tx}mesurs");
		$data=[];
		while($mesur=$result->fetch_object()){
			$data[]=$mesur;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,mesure from {$tx}mesurs $criteria limit $top,$perpage");
		$data=[];
		while($mesur=$result->fetch_object()){
			$data[]=$mesur;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}mesurs $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,mesure from {$tx}mesurs where id='$id'");
		$mesur=$result->fetch_object();
			return $mesur;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}mesurs");
		$mesur =$result->fetch_object();
		return $mesur->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Mesure:$this->mesure<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbMesur"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}mesurs");
		while($mesur=$result->fetch_object()){
			$html.="<option value ='$mesur->id'>$mesur->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}mesurs $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,mesure from {$tx}mesurs $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-mesur\">New Mesur</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Mesure</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Mesure</th></tr>";
		}
		while($mesur=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$mesur->id, "name"=>"Details", "value"=>"Detials", "class"=>"info", "url"=>"details-mesur"]);
				$action_buttons.= action_button(["id"=>$mesur->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-mesur"]);
				$action_buttons.= action_button(["id"=>$mesur->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"mesurs"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$mesur->id</td><td>$mesur->mesure</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,mesure from {$tx}mesurs where id={$id}");
		$mesur=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Mesur Details</th></tr>";
		$html.="<tr><th>Id</th><td>$mesur->id</td></tr>";
		$html.="<tr><th>Mesure</th><td>$mesur->mesure</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
