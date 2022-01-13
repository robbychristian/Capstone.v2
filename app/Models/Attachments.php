<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Attachments extends Model implements Auditable
{
    use HasFactory;

    use \OwenIt\Auditing\Auditable;
    use SoftDeletes;

    protected $table = 'attachments';

    protected $fillable = [
        'user_id',
        'email',
        'subject',
        'body',
        'file',
    ];
    

}
