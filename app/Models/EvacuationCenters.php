<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvacuationCenters extends Model
{
    use HasFactory;

    protected $fillable = [
        'lat',
        'lng',
        'brgy_loc',
    ];
}
