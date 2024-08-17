<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorSPM extends Model
{
    use HasFactory;
     
    protected $table = 'indikator';
    protected $primaryKey = 'IdIndikator';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'Detail'
    ];
}