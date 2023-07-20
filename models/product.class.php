<?php
class Product implements JsonSerializable{
	public $id;
	public $name;
	public $offer_price;
	public $manufacturer_id;
	public $regular_price;
	public $description;
	public $photo;
	public $category_id;
	public $section_id;
	public $is_featured;
	public $star;
	public $is_brand;
	public $offer_discount;
	public $uom_id;
	public $weight;
	public $barcode;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$name,$offer_price,$manufacturer_id,$regular_price,$description,$photo,$category_id,$section_id,$is_featured,$star,$is_brand,$offer_discount,$uom_id,$weight,$barcode,$created_at,$updated_at){
		$this->id=$id;
		$this->name=$name;
		$this->offer_price=$offer_price;
		$this->manufacturer_id=$manufacturer_id;
		$this->regular_price=$regular_price;
		$this->description=$description;
		$this->photo=$photo;
		$this->category_id=$category_id;
		$this->section_id=$section_id;
		$this->is_featured=$is_featured;
		$this->star=$star;
		$this->is_brand=$is_brand;
		$this->offer_discount=$offer_discount;
		$this->uom_id=$uom_id;
		$this->weight=$weight;
		$this->barcode=$barcode;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}products(name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode,created_at,updated_at)values('$this->name','$this->offer_price','$this->manufacturer_id','$this->regular_price','$this->description','$this->photo','$this->category_id','$this->section_id','$this->is_featured','$this->star','$this->is_brand','$this->offer_discount','$this->uom_id','$this->weight','$this->barcode','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}products set name='$this->name',offer_price='$this->offer_price',manufacturer_id='$this->manufacturer_id',regular_price='$this->regular_price',description='$this->description',photo='$this->photo',category_id='$this->category_id',section_id='$this->section_id',is_featured='$this->is_featured',star='$this->star',is_brand='$this->is_brand',offer_discount='$this->offer_discount',uom_id='$this->uom_id',weight='$this->weight',barcode='$this->barcode',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}products where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode,created_at,updated_at from {$tx}products");
		$data=[];
		while($product=$result->fetch_object()){
			$data[]=$product;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode,created_at,updated_at from {$tx}products $criteria limit $top,$perpage");
		$data=[];
		while($product=$result->fetch_object()){
			$data[]=$product;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}products $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode,created_at,updated_at from {$tx}products where id='$id'");
		$product=$result->fetch_object();
			return $product;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}products");
		$product =$result->fetch_object();
		return $product->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Name:$this->name<br> 
		Offer Price:$this->offer_price<br> 
		Manufacturer Id:$this->manufacturer_id<br> 
		Regular Price:$this->regular_price<br> 
		Description:$this->description<br> 
		Photo:$this->photo<br> 
		Category Id:$this->category_id<br> 
		Section Id:$this->section_id<br> 
		Is Featured:$this->is_featured<br> 
		Star:$this->star<br> 
		Is Brand:$this->is_brand<br> 
		Offer Discount:$this->offer_discount<br> 
		Uom Id:$this->uom_id<br> 
		Weight:$this->weight<br> 
		Barcode:$this->barcode<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbProduct"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}products");
		while($product=$result->fetch_object()){
			$html.="<option value ='$product->id'>$product->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}products $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode,created_at,updated_at from {$tx}products $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-product\">New Product</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Name</th><th>Offer Price</th><th>Manufacturer Id</th><th>Regular Price</th><th>Description</th><th>Photo</th><th>Category Id</th><th>Section Id</th><th>Is Featured</th><th>Star</th><th>Is Brand</th><th>Offer Discount</th><th>Uom Id</th><th>Weight</th><th>Barcode</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Name</th><th>Offer Price</th><th>Manufacturer Id</th><th>Regular Price</th><th>Description</th><th>Photo</th><th>Category Id</th><th>Section Id</th><th>Is Featured</th><th>Star</th><th>Is Brand</th><th>Offer Discount</th><th>Uom Id</th><th>Weight</th><th>Barcode</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($product=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$product->id, "name"=>"Details", "value"=>"Details", "class"=>"info", "url"=>"details-product"]);
				$action_buttons.= action_button(["id"=>$product->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-product"]);
				$action_buttons.= action_button(["id"=>$product->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"products"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$product->id</td><td>$product->name</td><td>$product->offer_price</td><td>$product->manufacturer_id</td><td>$product->regular_price</td><td>$product->description</td><td><img src=\"img/$product->photo\" width=\"100\" /></td><td>$product->category_id</td><td>$product->section_id</td><td>$product->is_featured</td><td>$product->star</td><td>$product->is_brand</td><td>$product->offer_discount</td><td>$product->uom_id</td><td>$product->weight</td><td>$product->barcode</td><td>$product->created_at</td><td>$product->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,name,offer_price,manufacturer_id,regular_price,description,photo,category_id,section_id,is_featured,star,is_brand,offer_discount,uom_id,weight,barcode,created_at,updated_at from {$tx}products where id={$id}");
		$product=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Product Details</th></tr>";
		$html.="<tr><th>Id</th><td>$product->id</td></tr>";
		$html.="<tr><th>Name</th><td>$product->name</td></tr>";
		$html.="<tr><th>Offer Price</th><td>$product->offer_price</td></tr>";
		$html.="<tr><th>Manufacturer Id</th><td>$product->manufacturer_id</td></tr>";
		$html.="<tr><th>Regular Price</th><td>$product->regular_price</td></tr>";
		$html.="<tr><th>Description</th><td>$product->description</td></tr>";
		$html.="<tr><th>Photo</th><td><img src=\"img/$product->photo\" width=\"100\" /></td></tr>";
		$html.="<tr><th>Category Id</th><td>$product->category_id</td></tr>";
		$html.="<tr><th>Section Id</th><td>$product->section_id</td></tr>";
		$html.="<tr><th>Is Featured</th><td>$product->is_featured</td></tr>";
		$html.="<tr><th>Star</th><td>$product->star</td></tr>";
		$html.="<tr><th>Is Brand</th><td>$product->is_brand</td></tr>";
		$html.="<tr><th>Offer Discount</th><td>$product->offer_discount</td></tr>";
		$html.="<tr><th>Uom Id</th><td>$product->uom_id</td></tr>";
		$html.="<tr><th>Weight</th><td>$product->weight</td></tr>";
		$html.="<tr><th>Barcode</th><td>$product->barcode</td></tr>";
		$html.="<tr><th>Created At</th><td>$product->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$product->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
