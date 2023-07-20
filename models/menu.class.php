<?php
class Menu implements JsonSerializable{
	public $id;
	public $name;
	public $offer_price;
	public $regular_price;
	public $description;
	public $photo;
	public $category_id;
	public $offer_discount;
	public $uom_id;
	public $barcode;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$name,$offer_price,$regular_price,$description,$photo,$category_id,$offer_discount,$uom_id,$barcode,$created_at,$updated_at){
		$this->id=$id;
		$this->name=$name;
		$this->offer_price=$offer_price;
		$this->regular_price=$regular_price;
		$this->description=$description;
		$this->photo=$photo;
		$this->category_id=$category_id;
		$this->offer_discount=$offer_discount;
		$this->uom_id=$uom_id;
		$this->barcode=$barcode;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}menus(name,offer_price,regular_price,description,photo,category_id,offer_discount,uom_id,barcode,created_at,updated_at)values('$this->name','$this->offer_price','$this->regular_price','$this->description','$this->photo','$this->category_id','$this->offer_discount','$this->uom_id','$this->barcode','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}menus set name='$this->name',offer_price='$this->offer_price',regular_price='$this->regular_price',description='$this->description',photo='$this->photo',category_id='$this->category_id',offer_discount='$this->offer_discount',uom_id='$this->uom_id',barcode='$this->barcode',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}menus where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,offer_price,regular_price,description,photo,category_id,offer_discount,uom_id,barcode,created_at,updated_at from {$tx}menus");
		$data=[];
		while($menu=$result->fetch_object()){
			$data[]=$menu;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,offer_price,regular_price,description,photo,category_id,offer_discount,uom_id,barcode,created_at,updated_at from {$tx}menus $criteria limit $top,$perpage");
		$data=[];
		while($menu=$result->fetch_object()){
			$data[]=$menu;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}menus $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,offer_price,regular_price,description,photo,category_id,offer_discount,uom_id,barcode,created_at,updated_at from {$tx}menus where id='$id'");
		$menu=$result->fetch_object();
			return $menu;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}menus");
		$menu =$result->fetch_object();
		return $menu->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Offer Price:$this->offer_price<br> 
		Regular Price:$this->regular_price<br> 
		Description:$this->description<br> 
		Photo:$this->photo<br> 
		Category Id:$this->category_id<br> 
		Offer Discount:$this->offer_discount<br> 
		Uom Id:$this->uom_id<br> 
		Barcode:$this->barcode<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbMenu"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}menus");
		while($menu=$result->fetch_object()){
			$html.="<option value ='$menu->id'>$menu->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}menus $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select m.id,m.name,m.offer_price,m.regular_price,m.photo,c.name ccatagory,u.name uuom from {$tx}menus m,{$tx}categories c,{$tx}uom u where m.category_id=c.id and m.uom_id=u.id  $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-menu\">New Menu</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Offer Price</th><th>Regular Price</th><th>Photo</th><th>Category</th><th>Uom</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Offer Price</th><th>Regular Price</th><th>Photo</th><th>Category</th><th>Uom</th></tr>";
		}
		while($menu=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$menu->id, "name"=>"Details", "value"=>"Detials", "class"=>"info", "url"=>"details-menu"]);
				$action_buttons.= action_button(["id"=>$menu->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-menu"]);
				$action_buttons.= action_button(["id"=>$menu->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"menus"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$menu->id</td><td>$menu->name</td><td>$menu->offer_price</td><td>$menu->regular_price</td><td><img src=\"img/$menu->photo\" width=\"100\" /></td><td>$menu->ccatagory</td><td>$menu->uuom</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,offer_price,regular_price,description,photo,category_id,offer_discount,uom_id,barcode,created_at,updated_at from {$tx}menus where id={$id}");
		$menu=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Menu Details</th></tr>";
		$html.="<tr><th>Id</th><td>$menu->id</td></tr>";
		$html.="<tr><th>Name</th><td>$menu->name</td></tr>";
		$html.="<tr><th>Offer Price</th><td>$menu->offer_price</td></tr>";
		$html.="<tr><th>Regular Price</th><td>$menu->regular_price</td></tr>";
		$html.="<tr><th>Description</th><td>$menu->description</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"img/$menu->photo\" width=\"100\" /></td></tr>";
		$html.="<tr><th>Category Id</th><td>$menu->category_id</td></tr>";
		$html.="<tr><th>Offer Discount</th><td>$menu->offer_discount</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$menu->uom_id</td></tr>";
		$html.="<tr><th>Barcode</th><td>$menu->barcode</td></tr>";
		$html.="<tr><th>Created At</th><td>$menu->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$menu->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
