<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisasterAffectedStreets extends Model
{
    use HasFactory;

    protected $table = "disaster_affected_streets";

    protected $fillable = [
        'disaster_id',
        'affected_families',
        'number_families_affected',
    ];

    public function disaster()
    {
        return $this->belongsTo(DisasterReport::class, 'disaster_id', 'id');
    }
}
