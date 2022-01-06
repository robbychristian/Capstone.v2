<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class EvacuationCenters extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'brgy_id',
        'admin_id',
        'added_by',
        'evac_name',
        'evac_latitude',
        'evac_longitude',
        'nearest_landmark',
        'brgy_loc',
        'phone_no',
        'capacity',
        'availability',
        'is_approved',
        
    ];

    public function deleteData($id)
    {
        return static::find($id)->delete();
    }
}
