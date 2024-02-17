<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'thumbnail',
        'status',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function album(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function getQrLinkAttribute():string
    {
        return "/qr-code/{$this->album->slug}/{$this->slug}";
    }
}
