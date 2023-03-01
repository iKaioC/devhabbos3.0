<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionalImage extends Model
{
    use HasFactory;

    protected $table = 'optional_images';

    protected $fillable = ['optional_id', 'path'];

    public function optional()
    {
        return $this->belongsTo(Optional::class);
    }
}
