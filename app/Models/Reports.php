<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reports extends Model
{
    use SoftDeletes;
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
