<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Menu extends Model
{
    protected $table = 'menus';

        protected $fillable =
        [
            'user_id',
            'menu_name',
            'parent_id',
            'slug',
            'icon',
            'url',
            'order',
            'status',
        ]
;

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function permission()
    {
        return $this->belongsTo('App\\Models\\Permission', 'permission_id');
    }
}
