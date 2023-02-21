<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Habbo extends Model
{
    use HasFactory;

    protected $table = 'habbos';

    protected $fillable = [
        'name',
        'slug',
        'emulator',
        'cms',
        'language',
        'url',
        'description',
        'price'
    ];

    public function images(): HasMany
    {
        return $this->hasMany(HabboImage::class);
    }

    public function getImageUrls(): array
    {
        return $this->images->pluck('path')->toArray();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_habbo')->withPivot('product_type');
    }
}
