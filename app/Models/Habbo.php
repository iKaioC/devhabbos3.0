<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_habbo')->withPivot('product_type');
    }
}
