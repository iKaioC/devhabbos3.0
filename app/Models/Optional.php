<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Optional extends Model
{
    use HasFactory;

    protected $table = 'optionals';

    protected $fillable = [
        'name',
        'slug',
        'category',
        'tag1',
        'tag2',
        'tag3',
        'description',
        'price',
        'repository',
        'icon',
        'color'
    ];

    public function images(): HasMany
    {
        return $this->hasMany(OptionalImage::class);
    }

    public function getImageUrls(): array
    {
        return $this->images->pluck('path')->toArray();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_optional')->withPivot('product_type');
    }

    public function userOptionals()
    {
        return $this->hasMany(UserOptional::class);
    }
}
