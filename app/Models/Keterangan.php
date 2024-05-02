<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    use HasFactory;
    
    protected $table = 'keterangan';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_receive',
        'id_batch',
        'tgl1',
        'comment1',
        'tgl2',
        'comment2',
        'notes',
        'tglmutakhir',
    ];
}
