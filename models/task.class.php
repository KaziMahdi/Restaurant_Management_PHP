<?php
class Task implements JsonSerializable{
	public $id;
	public $name;
	public $category_id;
	public $description;
	public $duration_hr;
	public $type_id;

	public function __construct(){
	}
	public function set($id,$name,$category_id,$description,$duration_hr,$type_id){
		$this->id=$id;
		$this->name=$name;
		$this->category_id=$category_id;
		$this->description=$description;
		$this->duration_hr=$duration_hr;
		$this->type_id=$type_id;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}tasks(name,category_id,description,duration_hr,type_id)values('$this->name','$this->category_id','$this->description','$this->duration_hr','$this->type_id')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}tasks set name='$this->name',category_id='$this->category_id',description='$this->description',duration_hr='$this->duration_hr',type_id='$this->type_id' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}tasks where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,category_id,description,duration_hr,type_id from {$tx}tasks");
		$data=[];
		while($task=$result->fetch_object()){
			$data[]=$task;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,category_id,description,duration_hr,type_id from {$tx}tasks $criteria limit $top,$perpage");
		$data=[];
		while($task=$result->fetch_object()){
			$data[]=$task;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}tasks $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,category_id,description,duration_hr,type_id from {$tx}tasks where id='$id'");
		$task=$result->fetch_object();
			return $task;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}tasks");
		$task =$result->fetch_object();
		return $task->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Category Id:$this->category_id<br> 
		Description:$this->description<br> 
		Duration Hr:$this->duration_hr<br> 
		Type Id:$this->type_id<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbTask"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}tasks");
		while($task=$result->fetch_object()){
			$html.="<option value ='$task->id'>$task->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}tasks $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,category_id,description,duration_hr,type_id from {$tx}tasks $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-task\">New Task</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Category Id</th><th>Description</th><th>Duration Hr</th><th>Type Id</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Category Id</th><th>Description</th><th>Duration Hr</th><th>Type Id</th></tr>";
		}
		while($task=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$task->id, "name"=>"Details", "value"=>"Detials", "class"=>"info", "url"=>"details-task"]);
				$action_buttons.= action_button(["id"=>$task->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-task"]);
				$action_buttons.= action_button(["id"=>$task->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"tasks"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$task->id</td><td>$task->name</td><td>$task->category_id</td><td>$task->description</td><td>$task->duration_hr</td><td>$task->type_id</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,category_id,description,duration_hr,type_id from {$tx}tasks where id={$id}");
		$task=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Task Details</th></tr>";
		$html.="<tr><th>Id</th><td>$task->id</td></tr>";
		$html.="<tr><th>Name</th><td>$task->name</td></tr>";
		$html.="<tr><th>Category Id</th><td>$task->category_id</td></tr>";
		$html.="<tr><th>Description</th><td>$task->description</td></tr>";
		$html.="<tr><th>Duration Hr</th><td>$task->duration_hr</td></tr>";
		$html.="<tr><th>Type Id</th><td>$task->type_id</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
