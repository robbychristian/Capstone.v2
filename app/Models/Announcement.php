<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Announcement extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    use SoftDeletes;

    protected $table = 'announcements';

    protected $fillable = [
        'brgy_id',
        'admin_id',
        'approved',
        'brgy_position',
        'name',
        'brgy_loc',
        'title',
        'body'
    ];

}
