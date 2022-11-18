<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
