<?php

namespace App\Controllers;

use App\Models\RessourcesModel;

class Admin extends BaseController
{
	private $model;

	public function __construct()
	{
		$this->model = new RessourcesModel();
	}
	

	//visit to DEBUG your database connection
	public function debug_db_connection()
	{
		echo view('helpers/database-debug-view');
	}

	public function renderModifyRessource($id) {

		// Fetch the resource data if it's a GET request
		$data['ressource'] = $this->model->getRessourceById($id);

		// Get the header and footer parameters
		$header_params = $this->get_params_for_header();
		$footer_params = $this->get_params_for_footer();

		// Render the views with the data
		echo view('partials/header', $header_params);
		echo view('admin/manage_ressource', $data);
		echo view('partials/footer', $footer_params);
	}

	public function renderAddRessource() {

	$header_params = $this->get_params_for_header();
	$footer_params = $this->get_params_for_footer();

	echo view('partials/header', $header_params);
	echo view('admin/manage_ressource');
	echo view('partials/footer', $footer_params);
	}


}
