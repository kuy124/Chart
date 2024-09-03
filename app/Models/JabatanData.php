<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanData extends Model
{
    use HasFactory;

    protected $table = 'jabatan_data';

    // Define the fields that are mass assignable
    protected $fillable = [
        'jabatan',
        'laki_laki',
        'perempuan',
    ];
}
