<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CapaianTracker extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'inputc';

    protected $fillable = [
        'IdCapaian','IdUser', 'Acces'
    ];

    public $timestamps = false;
}