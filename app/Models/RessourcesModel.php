<?php

namespace App\Models;

use CodeIgniter\Model;

class RessourcesModel extends Model
{
    protected $table = 'ressources';

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
}