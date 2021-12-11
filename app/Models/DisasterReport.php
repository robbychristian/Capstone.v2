<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DisasterReport extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'type_disaster',
        'name_disaster',
        'month_disaster',
        'day_disaster',
        'year_disaster',
        'barangay',
        'families_affected',
        'individuals_affected',
        'evacuees',
    ];

    public function affectedStreets()
    {
        return $this->hasMany(DisasterAffectedStreets::class, 'disaster_id', 'id');
    }
}
