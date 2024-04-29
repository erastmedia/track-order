<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receive extends Model
{
    use HasFactory;

    protected $table = 'receive';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nomororder',
        'customer_name',
        'id_buyer',
        'id_jenis_order',
        'qty',
        'tglorder',
        'tglmasuk',
        'flagproses',
        'flagkirimbuyer',
        'status',
    ];
}