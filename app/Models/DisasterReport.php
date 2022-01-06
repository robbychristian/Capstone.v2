<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class DisasterReport extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

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
