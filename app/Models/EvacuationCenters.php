<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvacuationCenters extends Model
{
    use HasFactory;
    protected $fillable = [
        'evac_name',
        'brgy_loc',
        'lat',
        'lng',
        'phone_no',
        'capacity',
    ];
}
