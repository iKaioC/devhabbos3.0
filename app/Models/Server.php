<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
