<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainPage extends CI_Controller {

	public function index() {
		$this -> load -> helper('url');
		$this -> load -> view('main_page');
	}

	public function loadRecords() {
		$table = '<div class="col-md-12">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Evento</th>
								<th>Descripcion</th>
								<th>Fecha Alta</th>
								<th>Prioridad</th>
								<th>Acciones</th>
							</tr>
						</thead><tbody>{%content%}</tbody></table>
				</div>';
		$row = '<tr>
					<td>1</td>
					<td>2</td>
					<td>3</td>
					<td>4</td>
					<td>5</td>
					<td>6</td>
				</tr>';
		$content = "";
		for ($i = 0; $i < 10; $i++) {
			$content .= $row;
		}

		echo str_replace('{%content%}', $content, $table);
	}

}
?>