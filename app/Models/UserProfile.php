<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class UserProfile extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    protected $table = "user_profiles";

    protected $fillable = [
        'user_email',
        'home_add',
        'middle_name',
        'contact_no',
        'birth_day',
        'valid_id',
        'profile_pic'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_email', 'email');
    }
}
