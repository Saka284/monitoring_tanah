<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $table = 'sensors';
    protected $fillable = [
        'date',
        'suhu_udara',
        'kelembapan_udara',
        'intensitas_cahaya',
        'ph_tanah',
        'suhu_tanah',
        'tds_tanah',
        'volume_nutrient',
    ];
}
