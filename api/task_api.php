<?php
class TaskApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["tasks"=>Task::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["tasks"=>Task::pagination($page,$perpage),"total_records"=>Task::count()]);
	}
	function find($data){
		echo json_encode(["task"=>Task::find($data["id"])]);
	}
	function delete($data){
		Task::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$task=new Task();
		$task->name=$data["name"];
		$task->category_id=$data["category_id"];
		$task->description=$data["description"];
		$task->duration_hr=$data["duration_hr"];
		$task->type_id=$data["type_id"];

		$task->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$task=new Task();
		$task->id=$data["id"];
		$task->name=$data["name"];
		$task->category_id=$data["category_id"];
		$task->description=$data["description"];
		$task->duration_hr=$data["duration_hr"];
		$task->type_id=$data["type_id"];

		$task->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
