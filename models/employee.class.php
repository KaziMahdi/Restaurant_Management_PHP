<?php
class Employee implements JsonSerializable{
	public $id;
	public $name;
	public $position_id;
	public $shift_id;
	public $sex;
	public $dob;
	public $doj;
	public $mobile;
	public $address;
	public $photo;
	public $inactive;

	public function __construct(){
	}
	public function set($id,$name,$position_id,$shift_id,$sex,$dob,$doj,$mobile,$address,$photo,$inactive){
		$this->id=$id;
		$this->name=$name;
		$this->position_id=$position_id;
		$this->shift_id=$shift_id;
		$this->sex=$sex;
		$this->dob=$dob;
		$this->doj=$doj;
		$this->mobile=$mobile;
		$this->address=$address;
		$this->photo=$photo;
		$this->inactive=$inactive;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}employees(name,position_id,shift_id,sex,dob,doj,mobile,address,photo,inactive)values('$this->name','$this->position_id','$this->shift_id','$this->sex','$this->dob','$this->doj','$this->mobile','$this->address','$this->photo','$this->inactive')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}employees set name='$this->name',position_id='$this->position_id',shift_id='$this->shift_id',sex='$this->sex',dob='$this->dob',doj='$this->doj',mobile='$this->mobile',address='$this->address',photo='$this->photo',inactive='$this->inactive' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}employees where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,position_id,shift_id,sex,dob,doj,mobile,address,photo,inactive from {$tx}employees");
		$data=[];
		while($employee=$result->fetch_object()){
			$data[]=$employee;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,position_id,shift_id,sex,dob,doj,mobile,address,photo,inactive from {$tx}employees $criteria limit $top,$perpage");
		$data=[];
		while($employee=$result->fetch_object()){
			$data[]=$employee;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}employees $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select e.id,e.name,p.name pname,s.name sname,e.sex,e.dob,e.doj,e.mobile,e.address,e.photo,e.inactive from {$tx}employees e,{$tx}employee_positions p,{$tx}shifts s where e.position_id=p.id and e.shift_id=s.id and e.id='$id'");
		$employee=$result->fetch_object();
			return $employee;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}employees");
		$employee =$result->fetch_object();
		return $employee->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Position Id:$this->position_id<br> 
		Shift Id:$this->shift_id<br> 
		Sex:$this->sex<br> 
		Dob:$this->dob<br> 
		Doj:$this->doj<br> 
		Mobile:$this->mobile<br> 
		Address:$this->address<br> 
		Photo:$this->photo<br> 
		Inactive:$this->inactive<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbEmployee"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}employees");
		while($employee=$result->fetch_object()){
			$html.="<option value ='$employee->id'>$employee->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}employees $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select e.id,e.name,p.name pposition,s.name ssift,e.photo from {$tx}employees e,{$tx}employee_positions p,{$tx}shifts s where e.position_id=p.id and e.shift_id=s.id $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-employee\">New Employee</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Position</th><th>Shift</th><th>Photo</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Position</th><th>Shift</th><th>Photo</th></tr>";
		}
		while($employee=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$employee->id, "name"=>"Details", "value"=>"Detials", "class"=>"info", "url"=>"details-employee"]);
				$action_buttons.= action_button(["id"=>$employee->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-employee"]);
				$action_buttons.= action_button(["id"=>$employee->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"employees"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$employee->id</td><td>$employee->name</td><td>$employee->pposition</td><td>$employee->ssift</td><td><img src=\"img/$employee->photo\" width=\"100\" /></td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,position_id,shift_id,sex,dob,doj,mobile,address,photo,inactive from {$tx}employees where id={$id}");
		$employee=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Employee Details</th></tr>";
		$html.="<tr><th>Id</th><td>$employee->id</td></tr>";
		$html.="<tr><th>Name</th><td>$employee->name</td></tr>";
		$html.="<tr><th>Position Id</th><td>$employee->position_id</td></tr>";
		$html.="<tr><th>Shift Id</th><td>$employee->shift_id</td></tr>";
		$html.="<tr><th>Sex</th><td>$employee->sex</td></tr>";
		$html.="<tr><th>Dob</th><td>$employee->dob</td></tr>";
		$html.="<tr><th>Doj</th><td>$employee->doj</td></tr>";
		$html.="<tr><th>Mobile</th><td>$employee->mobile</td></tr>";
		$html.="<tr><th>Address</th><td>$employee->address</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"img/$employee->photo\" width=\"100\" /></td></tr>";
		$html.="<tr><th>Inactive</th><td>$employee->inactive</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
