<?php

namespace App\Controllers;

use App\Models\RessourcesModel;

class Home extends BaseController
{
	//visit to DEBUG your database connection
	public function debug_db_connection()
	{
		echo view('helpers/database-debug-view');
	}

	public function index()
	{
		$model = new RessourcesModel();

		// Get filter parameters from the GET request
		$search_name = null !== $this->request->getGet('search_name') ? $this->request->getGet('search_name') : "";
		$web = $this->request->getGet('siteweb') ? true : false;
		$youtube = $this->request->getGet('youtube') ? true : false;
		$livre = $this->request->getGet('livre') ? true : false;
		$application = $this->request->getGet('application') ? true : false;
	
		// Create an array of selected filters
		$filters = [
			'search_name' => $search_name,
			'siteweb' => $web,
			'youtube' => $youtube,
			'livre' => $livre,
			'application' => $application
		];

		$header_params = $this->get_params_for_header();
		$user = $header_params["logged_user"];
		$visible_only = true;
		if(isset($user) && isset($user["role"]) && $user["role"] == "admin"){
			$visible_only = false;
		}
		else{
			$visible_only = true;
		}

		$data["filters"] = $filters;
		$data['ressources'] = $model->getRessourcesWithFilters($visible_only, $filters);
		$footer_params = $this->get_params_for_footer();

		echo view('partials/header', $header_params);
		echo view('index', $data);
		echo view('partials/footer', $footer_params);
	}

	public function viewRessource($slug = NULL)
	{
		$model = new RessourcesModel();

        $data['ressource'] = $model->getRessources($slug);

		if (empty($data['ressource']))
		{
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Cette ressource n\'est pas disponible.');
		}
		
		$header_params = $this->get_params_for_header();
		$footer_params = $this->get_params_for_footer();

		echo view('partials/header', $header_params);
		echo view('ressources/view', $data);
		echo view('partials/footer', $footer_params);
	}
}
