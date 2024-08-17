<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetSPM extends Model
{
    use HasFactory;
    protected $table = 'targetlayanan';
    protected $primaryKey = 'IdLayanan';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'IdLayanan',
        'IdIndikator',
        'KatLayanan',
        'Detail',
        'JmlhTargetTHN',
        'Anggaran',
        'Tahun',
        'IdPuskesmas'
    ];
}