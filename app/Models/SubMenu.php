<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    protected $table = 'sub_menus';

    protected $fillable = [
        'menu_id',
        'sub_menu_name',
        'slug',
        'icon',
        'url',
        'status',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
