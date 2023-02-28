<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserServer extends Model
{
    use HasFactory;

    protected $table = 'user_server';

    protected $fillable = [
        'user_id',
        'server_id',
        'product_type',
        'status',
        'pay',
        'ipserver',
        'duedate'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function server()
    {
        return $this->belongsTo(Server::class);
    }
}
