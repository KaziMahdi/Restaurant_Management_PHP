<?php
class EmployeeApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["employees"=>Employee::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["employees"=>Employee::pagination($page,$perpage),"total_records"=>Employee::count()]);
	}
	function find($data){
		echo json_encode(["employee"=>Employee::find($data["id"])]);
	}
	function delete($data){
		Employee::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$employee=new Employee();
		$employee->name=$data["name"];
		$employee->position_id=$data["position_id"];
		$employee->shift_id=$data["shift_id"];
		$employee->sex=$data["sex"];
		$employee->mobile=$data["mobile"];
		$employee->address=$data["address"];
		$employee->photo=upload($file["photo"], "../img",$data["name"]);
		$employee->inactive=$data["inactive"];

		$employee->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$employee=new Employee();
		$employee->id=$data["id"];
		$employee->name=$data["name"];
		$employee->position_id=$data["position_id"];
		$employee->shift_id=$data["shift_id"];
		$employee->sex=$data["sex"];
		$employee->mobile=$data["mobile"];
		$employee->address=$data["address"];
		if(isset($file["photo"]["name"])){
			$employee->photo=upload($file["photo"], "../img",$data["name"]);
		}else{
			$employee->photo=Employee::find($data["id"])->photo;
		}
		$employee->inactive=$data["inactive"];

		$employee->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
