<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $table = "user_profiles";

    protected $fillable = [
        'user_email',
        'home_add',
        'middle_name',
        'contact_no',
        'birth_day',
        'profile_pic'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_email', 'email');
    }
}
