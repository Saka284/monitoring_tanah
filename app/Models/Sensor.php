<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sensor extends Model
{
    use HasFactory;

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
