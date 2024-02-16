<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
//        'status',
        'category_id',


    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }
}
