<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    protected $table = 'reports';
    protected $fillable = [
        'user_id',
        'full_name',
        'title',
        'description',
        'status',
        'loc_lat',
        'loc_lng',
        'loc_img'
    ];
}
