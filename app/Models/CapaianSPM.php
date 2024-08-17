<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CapaianSPM extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'capaian';
    protected $primaryKey = 'IdCapaian';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'IdCapaian',
        'IdLayanan', 
        'CapaianBLN', 
        'P_Anggaran', 
        'Bulan', 
        'Tahun'
    ];
}