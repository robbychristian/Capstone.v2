<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $table = 'announcements';

    protected $fillable = [
        'brgy_id',
        'admin_id',
        'brgy_position',
        'name',
        'brgy_loc',
        'title',
        'body'
    ];
}
