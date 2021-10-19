<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisasterReport extends Model
{
    use HasFactory;

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
        return $this->hasOne(DisasterAffectedStreets::class, 'disaster_id', 'id');
    }
}
