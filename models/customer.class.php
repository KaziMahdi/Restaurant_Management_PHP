<?php
class Customer implements JsonSerializable{
	public $id;
	public $name;
	public $mobile;
	public $email;
	public $created_at;
	public $updated_at;
	public $password;
	public $country_id;
	public $street_address;
	public $city;
	public $postcode;
	public $apartment;

	public function __construct(){
	}
	public function set($id,$name,$mobile,$email,$created_at,$updated_at,$password,$country_id,$street_address,$city,$postcode,$apartment){
		$this->id=$id;
		$this->name=$name;
		$this->mobile=$mobile;
		$this->email=$email;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;
		$this->password=$password;
		$this->country_id=$country_id;
		$this->street_address=$street_address;
		$this->city=$city;
		$this->postcode=$postcode;
		$this->apartment=$apartment;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}customers(name,mobile,email,password,country_id,street_address,city,postcode,apartment)values('$this->name','$this->mobile','$this->email','$this->password','$this->country_id','$this->street_address','$this->city','$this->postcode','$this->apartment')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}customers set name='$this->name',mobile='$this->mobile',email='$this->email',created_at='$this->created_at',updated_at='$this->updated_at',password='$this->password',country_id='$this->country_id',street_address='$this->street_address',city='$this->city',postcode='$this->postcode',apartment='$this->apartment' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}customers where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,mobile,email,created_at,updated_at,password,country_id,street_address,city,postcode,apartment from {$tx}customers");
		$data=[];
		while($customer=$result->fetch_object()){
			$data[]=$customer;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,mobile,email,created_at,updated_at,password,country_id,street_address,city,postcode,apartment from {$tx}customers $criteria limit $top,$perpage");
		$data=[];
		while($customer=$result->fetch_object()){
			$data[]=$customer;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}customers $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,mobile,email,created_at,updated_at,password,country_id,street_address,city,postcode,apartment from {$tx}customers where id='$id'");
		$customer=$result->fetch_object();
			return $customer;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}customers");
		$customer =$result->fetch_object();
		return $customer->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Mobile:$this->mobile<br> 
		Email:$this->email<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
		Password:$this->password<br> 
		Country Id:$this->country_id<br> 
		Street Address:$this->street_address<br> 
		City:$this->city<br> 
		Postcode:$this->postcode<br> 
		Apartment:$this->apartment<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbCustomer"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}customers");
		while($customer=$result->fetch_object()){
			$html.="<option value ='$customer->id'>$customer->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}customers $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,mobile,email,created_at,updated_at,password,country_id,street_address,city,postcode,apartment from {$tx}customers $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-customer\">New Customer</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Mobile</th><th>Email</th><th>Password</th><th>Street Address</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Mobile</th><th>Email</th><th>Password</th><th>Street Address</th></tr>";
		}
		while($customer=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$customer->id, "name"=>"Details", "value"=>"Detials", "class"=>"info", "url"=>"details-customer"]);
				$action_buttons.= action_button(["id"=>$customer->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-customer"]);
				$action_buttons.= action_button(["id"=>$customer->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"customers"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$customer->id</td><td>$customer->name</td><td>$customer->mobile</td><td>$customer->email</td><td>$customer->password</td><td>$customer->street_address</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,mobile,email,created_at,updated_at,password,country_id,street_address,city,postcode,apartment from {$tx}customers where id={$id}");
		$customer=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Customer Details</th></tr>";
		$html.="<tr><th>Id</th><td>$customer->id</td></tr>";
		$html.="<tr><th>Name</th><td>$customer->name</td></tr>";
		$html.="<tr><th>Mobile</th><td>$customer->mobile</td></tr>";
		$html.="<tr><th>Email</th><td>$customer->email</td></tr>";
		$html.="<tr><th>Created At</th><td>$customer->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$customer->updated_at</td></tr>";
		$html.="<tr><th>Password</th><td>$customer->password</td></tr>";
		$html.="<tr><th>Country Id</th><td>$customer->country_id</td></tr>";
		$html.="<tr><th>Street Address</th><td>$customer->street_address</td></tr>";
		$html.="<tr><th>City</th><td>$customer->city</td></tr>";
		$html.="<tr><th>Postcode</th><td>$customer->postcode</td></tr>";
		$html.="<tr><th>Apartment</th><td>$customer->apartment</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
