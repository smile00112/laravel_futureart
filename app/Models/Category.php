<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use MoonShine\Fields\Relationships\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'category_id', 'sorting'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(self::class);
    }

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Article::class);
    }

    public function albums(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->HasMany(Album::class);
    }
}
