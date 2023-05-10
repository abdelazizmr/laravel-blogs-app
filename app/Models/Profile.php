<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'user_id',
        'profile_image',
        'bio',
        'phone',
        'address'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
