<?php

namespace App\Models;

use App\Models\UserServer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Server extends Model
{
    use HasFactory;

    protected $table = 'servers';

    protected $fillable = [
        'name',
        'memory',
        'vcpu',
        'type_storage',
        'amount_storage',
        'system',
        'locale',
        'price',
        'stock',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_server')->withPivot('product_type');
    }

    public function userServers()
    {
        return $this->hasMany(UserServer::class);
    }
}
