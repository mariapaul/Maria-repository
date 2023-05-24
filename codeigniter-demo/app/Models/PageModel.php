<?php

namespace App\Models;

use CodeIgniter\Model;

class PageModel extends Model
{
    // Table
    protected $table = 'pages';
    // allowed fields to manage
    protected $allowedFields = ['ID','pagename','date_created'];

    public function getPagelist($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
    
}

//$users = $table->findAll();