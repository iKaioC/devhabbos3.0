<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserHabbo extends Model
{
    use HasFactory;

    protected $table = 'user_habbo';

    protected $fillable = [
        'user_id',
        'habbo_id',
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

    public function habbo()
    {
        return $this->belongsTo(Habbo::class);
    }
}
