<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function children()
    {
        return $this->hasMany('App\Models\Menu', 'mn_parent_id', 'id_menu');
    }
}
