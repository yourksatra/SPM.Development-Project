<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logacces extends Model
{
    protected $table = 'logacces';
    protected $primaryKey = 'log_id';

    protected $fillable = [
        'IdUser', 'TimeAcces', 'LastAcces', 'Expires_time'
    ];

    public $timestamps = false;
}
