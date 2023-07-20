<?php
class Expenstion implements JsonSerializable{
	public $id;
	public $employee_id;
	public $booking_id;
	public $created_at;
	public $updated_at;
	public $prepare_date;
	public $sale_date;
	public $remark;
	public $prepare_total;

	public function __construct(){
	}
	public function set($id,$employee_id,$booking_id,$created_at,$updated_at,$prepare_date,$sale_date,$remark,$prepare_total){
		$this->id=$id;
		$this->employee_id=$employee_id;
		$this->booking_id=$booking_id;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;
		$this->prepare_date=$prepare_date;
		$this->sale_date=$sale_date;
		$this->remark=$remark;
		$this->prepare_total=$prepare_total;

	}
	public function save(){
		global $db,$tx;
		$as="insert into {$tx}expenstions(employee_id,booking_id,prepare_date,sale_date,remark,prepare_total)values('$this->employee_id','$this->booking_id','$this->prepare_date','$this->sale_date','$this->remark','$this->prepare_total')";
		file_put_contents("expen.txt",$as);
		$db->query("insert into {$tx}expenstions(employee_id,booking_id,prepare_date,sale_date,remark,prepare_total)values('$this->employee_id','$this->booking_id','$this->prepare_date','$this->sale_date','$this->remark','$this->prepare_total')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}expenstions set employee_id='$this->employee_id',booking_id='$this->booking_id',created_at='$this->created_at',updated_at='$this->updated_at',prepare_date='$this->prepare_date',sale_date='$this->sale_date',remark='$this->remark',prepare_total='$this->prepare_total' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}expenstions where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,employee_id,booking_id,created_at,updated_at,prepare_date,sale_date,remark,prepare_total from {$tx}expenstions");
		$data=[];
		while($expenstion=$result->fetch_object()){
			$data[]=$expenstion;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,employee_id,booking_id,created_at,updated_at,prepare_date,sale_date,remark,prepare_total from {$tx}expenstions $criteria limit $top,$perpage");
		$data=[];
		while($expenstion=$result->fetch_object()){
			$data[]=$expenstion;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}expenstions $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,employee_id,booking_id,created_at,updated_at,prepare_date,sale_date,remark,prepare_total from {$tx}expenstions where id='$id'");
		$expenstion=$result->fetch_object();
			return $expenstion;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}expenstions");
		$expenstion =$result->fetch_object();
		return $expenstion->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Employee Id:$this->employee_id<br> 
		Booking Id:$this->booking_id<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
		Prepare Date:$this->prepare_date<br> 
		Sale Date:$this->sale_date<br> 
		Remark:$this->remark<br> 
		Prepare Total:$this->prepare_total<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbExpenstion"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}expenstions");
		while($expenstion=$result->fetch_object()){
			$html.="<option value ='$expenstion->id'>$expenstion->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}expenstions $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select e.id,p.name,b.name bname,e.created_at,e.updated_at,e.prepare_date,e.sale_date,e.remark,e.prepare_total from {$tx}expenstions e,{$tx}bookings b,{$tx}employees p where e.employee_id=p.id and e.booking_id=b.id $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-expenstion\">New Expenstion</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Employee name</th><th>Booking name</th><th>Prepare Date</th><th>Sale Date</th><th>Prepare Total</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Employee name</th><th>Booking name</th><th>Prepare Date</th><th>Sale Date</th><th>Prepare Total</th></tr>";
		}
		while($expenstion=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$expenstion->id, "name"=>"Details", "value"=>"Detials", "class"=>"info", "url"=>"details-expenstion"]);
				$action_buttons.= action_button(["id"=>$expenstion->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-expenstion"]);
				$action_buttons.= action_button(["id"=>$expenstion->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"expenstions"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$expenstion->id</td><td>$expenstion->name</td><td>$expenstion->bname</td><td>$expenstion->prepare_date</td><td>$expenstion->sale_date</td><td>$expenstion->prepare_total</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,employee_id,booking_id,created_at,updated_at,prepare_date,sale_date,remark,prepare_total from {$tx}expenstions where id={$id}");
		$expenstion=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Expenstion Details</th></tr>";
		$html.="<tr><th>Id</th><td>$expenstion->id</td></tr>";
		$html.="<tr><th>Employee Id</th><td>$expenstion->employee_id</td></tr>";
		$html.="<tr><th>Booking Id</th><td>$expenstion->booking_id</td></tr>";
		$html.="<tr><th>Created At</th><td>$expenstion->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$expenstion->updated_at</td></tr>";
		$html.="<tr><th>Prepare Date</th><td>$expenstion->prepare_date</td></tr>";
		$html.="<tr><th>Sale Date</th><td>$expenstion->sale_date</td></tr>";
		$html.="<tr><th>Remark</th><td>$expenstion->remark</td></tr>";
		$html.="<tr><th>Prepare Total</th><td>$expenstion->prepare_total</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
