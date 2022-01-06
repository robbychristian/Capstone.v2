<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Reports extends Model implements Auditable
{
    use SoftDeletes;
    use OwenIt\Auditing\Contracts\Auditable;
    
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
