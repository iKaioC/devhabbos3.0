<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOtherOptional extends Model
{
    use HasFactory;

    protected $table = 'user_other_optional';

    protected $fillable = [
        'user_id',
        'name',
        'category',
        'description',
        'pay',
        'status',
        'supportdate'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

        public function otheroptionals($id)
    {
        $user = User::find($id);
        $otherOptionals = $user->userOtherOptionals;
            
        return view('otherOptionals', compact('otherOptionals'));
    }

    public function userOtherOptionals()
    {
        return $this->hasMany(UserOtherOptional::class);
    }
}
