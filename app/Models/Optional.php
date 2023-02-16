<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'icon',
        'color'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_optional')->withPivot('product_type');
    }
}
