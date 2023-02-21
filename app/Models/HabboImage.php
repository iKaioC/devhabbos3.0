<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HabboImage extends Model
{
    use HasFactory;

    protected $table = 'habbo_images';

    protected $fillable = ['habbo_id', 'path'];

    public function habbo()
    {
        return $this->belongsTo(Habbo::class);
    }
}
