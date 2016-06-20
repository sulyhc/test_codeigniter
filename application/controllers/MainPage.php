<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainPage extends CI_Controller {

	public function index() {
		$this -> load -> helper('url');
		$this -> load -> view('main_page');
	}

	public function loadRecords() {
		$table = '<div class="col-md-12">
					<table id="tableActivities" class="table table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Evento</th>
								<th>Descripcion</th>
								<th>Fecha Alta</th>
								<th>Prioridad</th>
								<th width="25%">Acciones</th>
							</tr>
						</thead><tbody>{%content%}</tbody></table>
				</div>';
		$row = '<tr>
					<td>1</td>
					<td>2</td>
					<td>3</td>
					<td>4</td>
					<td>5</td>
					<td><div class="btn-group">
						<button class="btn btn-primary" onclick="modalEdit()">Edit</button>
						<button class="btn btn-danger" onclick="modalDelete()">Remove</button>
					</div></td>
				</tr>';		
		$content = "";
		for ($i = 0; $i < 10; $i++) {
			$content .= $row;
		}

		echo str_replace('{%content%}', $content, $table);
	}
	
	
	public function modalAdd(){
		$this -> load -> helper('url');
		$this ->load -> view("modalAdd");
	}
	
	public function modalEdit(){
		$this -> load -> helper('url');
		$this ->load -> view("modalEdit");
	}
	
	public function modalDelete(){
		$this -> load -> helper('url');
		$this -> load -> view ("modalDelete");
	}

	public function addRecord(){
		$this->load->library("crud_mongo");
		$this->crud_mongo->addRecord();
	}
	
	public function editRecord(){
		
	}
	
	public function getRecord(){		
		$this->load->library("crud_mongo");
		$data = array("id" => "57675aba9a8bc0293837b5c1");
		$this->crud_mongo->getItem("57675aba9a8bc0293837b5c1");
	}
	
	public function deleteRecord(){
		
	}
	
	public function readAll(){
		$this->load->library("crud_mongo");
		$this->crud_mongo->readAll();
		
	}
	
	public function test(){
		$this->load->library("crud_mongo");
		$this->crud_mongo->echoTest();
	}

}
?>

