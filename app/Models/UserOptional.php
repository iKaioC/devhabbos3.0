<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOptional extends Model
{
    use HasFactory;

    protected $table = 'user_optional';

    protected $fillable = [
        'user_id',
        'optional_id',
        'product_type',
        'status',
        'pay'
    ];

    protected $dates = [
        'supportdate',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function optional()
    {
        return $this->belongsTo(Optional::class);
    }
}
