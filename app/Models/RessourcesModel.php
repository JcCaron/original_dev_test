<?php

namespace App\Models;

use CodeIgniter\Model;

class RessourcesModel extends Model
{
    protected $table = 'ressources';

    // Define the allowed fields (columns) for mass assignment
    protected $allowedFields = [
        'name',
        'description',
        'long_description',
        'image_src',
        'website',
        'is_free',
        'type',
        'status',
        'rating',
        'slug',
        'creation_date'
    ];

    public function getRessources($slug = false, $visible_only = true)
    {
        if ($slug === false)
        {
            if ($visible_only)
                return $this->where(['status' => 'visible'])->findAll();
            else
                return $this->findAll();     
        }

        $search_array = ['slug' => $slug];

        if ($visible_only)
            $search_array['status'] = 'visible';

        return $this->asArray()
                ->where($search_array)
                ->first();
    }

    public function getRessourcesWithFilters($visible_only = true, $filters)
    {
        $builder = $this;

        if ($visible_only) {
            $builder->where('status', 'visible');
        }

        if (!empty($filters['search_name'])) {
            $builder->like('name', $filters['search_name']);
        }
    
        $types = [];
        if ($filters['siteweb']) {
            $types[] = 'siteweb';
        }
        if ($filters['youtube']) {
            $types[] = 'youtube';
        }
        if ($filters['livre']) {
            $types[] = 'livre';
        }
        if ($filters['application']) {
            $types[] = 'application';
        }

        if (!empty($types)) {
            $builder->whereIn('type', $types);
        }
    
        return $builder->get()->getResultArray();
    }

    public function getRessourceById($id)
    {
        if (!$id ){
            return false;
        }
       return $this->where(['id'=> $id])->first();
    }

    public function deleteRessource($id)
    {
        if (!$id ){
            return false;
        }
        try {
            $this->delete($id);
        } catch (\Throwable $th) {
            log_message('error', 'Erreur en supprimant la ressource : ' . $th->getMessage());
            return false;
        }

    }

    public function modifyRessource($id, $data)
    {
        if (!$id){
            return false;
        }
        try {
            return $this->update($id, [
                'name' => $data['name'],
                'description' => $data['description'],
                'long_description' => $data['long_description'],
                'image_src' => $data['image_src'],
                'website' => $data['website'],
                'is_free' => $data['is_free'],
                'type' => $data['type'],
                'status' => $data['status'],
                'rating' => $data['rating'],
                'slug' => $data['slug']
            ]);
        } catch (\Error $th) {
            log_message('error', 'Erreur en modifiant la ressource: ' . $th->getMessage());
            return false;
        }
    }

    public function addRessource($data){
        if (!$data){
            return false;
        }
        try {
            $data['creation_date'] = date('Y-m-d H:i:s'); 
            $newId = $this->insert($data);
            return $newId;
        } catch (\Error $th) {
            log_message('error', 'Erreur en modifiant la ressource: ' . $th->getMessage());
            return false;
        }
    }
}