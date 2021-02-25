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
		$data = [
			'ressources'  => [
				[
					'name' => 'Le site de Allo prof',
					'description' => 'Depuis 1996, Alloprof développe des services professionnels et des ressources numériques de soutien scolaire et les rend accessibles gratuitement à tous les élèves du Québec et leurs parents.',
					'website' => "https://www.alloprof.qc.ca/", 
					'image_src' => "/assets/images/alloprof.jpg"
				],
				[
					'name' => 'La classe en ligne avec Marie-Ève Lévesque',
					'description' => 'La Classe en ligne animée par Marie-Ève Lévesque a offert des cours de révision quotidiens gratuits à tous les élèves du primaire durant le confinement dû à la pandémie de la COVID-19, du 31 mars au 18 juin 2020.',
					'website' => "https://www.successcolaire.ca/la-classe-en-ligne",
					'image_src' => "/assets/images/classe_en_ligne.jpg"
				]
			]
		];

		$model = new RessourcesModel();

        $data['ressources'] = $model->getRessources();

		$header_params = $this->get_params_for_header();
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
