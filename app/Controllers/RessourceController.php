<?php

namespace App\Controllers;

use App\Models\RessourcesModel;

class RessourceController extends BaseController
{
	private $model;

	public function __construct(){
		$this->model = new RessourcesModel();
	}
	//visit to DEBUG your database connection
	public function debug_db_connection()
	{
		echo view('helpers/database-debug-view');
	}

	public function getAllRessources()
	{
		$data['ressources'] = $this->model->getRessources();
		return $data;
	}

	public function deleteRessource($id){
		$ressource = $this->model->getRessourceById($id);
		if($ressource){
			$image_source = ltrim($ressource["image_src"], '/');
			if (file_exists($image_source)) {
				unlink($image_source); 
			}

			$this->model->deleteRessource($id);
		}

		return $this->response->setJSON(['success' => true]);
	}

	public function modifyRessource($id) {
		if ($this->request->getMethod(TRUE) == 'POST')
        {
			$data = $this->request->getPost();
			$image =$this->request->getFile('image');
			if($image != null){
			if ($image->isValid() && !$image->hasMoved()) {
				$newName = $image->getRandomName();
				$image->move("assets/images", $newName);  
				$imagePath = '/assets/images/' . $newName;
				$data['image_src'] = $imagePath;
			} 
			}
			$modifyConfirm = $this->model->modifyRessource($id, $data);
			if ($modifyConfirm) {
				return $this->response->setJSON(['success' => true, 'message' => 'Ressource mis à jour']);
			} else {
				return $this->response->setJSON(['success' => false, 'message' => 'Erreur en modifiant la ressource']);
			}
		}
		return $this->response->setJSON(['success' => false, 'message' => 'Pas un POST']);
	}

	public function addRessource() {
		if ($this->request->getMethod(TRUE) == 'POST')
        {
			$data = $this->request->getPost();
			$image =$this->request->getFile('image');
			if ($image->isValid() && !$image->hasMoved()) {
				$newName = $image->getRandomName();
				$image->move("assets/images", $newName);  
				$imagePath = '/assets/images/' . $newName;
			} else {
				$imagePath = '/assets/images/alloprof.jpg';
			}
			$data['image_src'] = $imagePath;
			$addConfirm = $this->model->addRessource($data);
			if ($addConfirm) {
				return $this->response->setJSON(['success' => true, 'message' => 'Ressource ajoutée']);
			} else {
				return $this->response->setJSON(['success' => false, 'message' => 'Erreur en créant la ressource']);
			}
		}
		return $this->response->setJSON(['success' => false, 'message' => 'Pas un POST']);
	}
}
