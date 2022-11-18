<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'image', 'introduction'];


    public function blogs()
    {
        return $this->belongsToMany(Blog::class)->withPivot('menu_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
