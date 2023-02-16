<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Habbo;
use App\Models\Server;
use App\Models\Ticket;
use App\Models\Optional;
use App\Models\Testimonial;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rank',
        'image',
        'cell',
        'link',
        'country',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function habbos()
    {
        return $this->belongsToMany(Habbo::class, 'user_habbo')->withPivot('product_type');
    }

    public function servers()
    {
        return $this->belongsToMany(Server::class, 'user_server')
            ->withPivot('pay', 'status', 'product_type')
            ->select('servers.*', 'user_server.pay', 'user_server.status');
    }

    public function optionals()
    {
        return $this->belongsToMany(Optional::class, 'user_optional')->withPivot('product_type');
    }

    public function testimonials()
    {
        return $this->belongsToMany(Testimonial::class, 'user_testimonial')->withPivot('testimony');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function usedServers()
    {
        return $this->belongsToMany(Server::class, 'user_server')->withPivot('product_type');
    }
}
