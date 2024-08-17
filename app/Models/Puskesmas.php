<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Puskesmas extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'puskesmas';
    
    public $timestamps = false;

    protected $primaryKey = 'IdPuskesmas';  // Menentukan primary key
    public $incrementing = false;  // Karena IdPuskesmas bukan auto-increment
    protected $keyType = 'string';  // Tipe data IdPuskesmas adalah string
    
    protected $fillable = [
        'IdPuskesmas', 'Nama', 'Alamat', 'Kecamatan' , 'email',
    ];

    /**
     * Generate a unique ID for Puskesmas
     *
     * @return string
     */

    public static function generateUniqueId()
    {
        $latestPuskesmas = DB::table('puskesmas')->orderBy('IdPuskesmas', 'desc')->first();

        if ($latestPuskesmas) {
            // Extract the number part from the latest ID
            $lastNumber = (int) substr($latestPuskesmas->IdPuskesmas, 1, 3);
            // Increment the number
            $newNumber = $lastNumber + 1;
        } else {
            // Start with 1 if no records exist
            $newNumber = 1;
        }

        // Generate new ID with the format "PxxxSBW"
        return self::generateIdPuskesmas($newNumber);
    }

    /**
     * Generate IdPuskesmas based on the provided number
     *
     * @param int $number
     * @return string
     */
    
    public static function generateIdPuskesmas($number)
    {
        return 'P' . str_pad($number, 3, '0', STR_PAD_LEFT) . 'SBW';
    }
}