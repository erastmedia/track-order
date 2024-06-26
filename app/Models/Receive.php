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

    public function receive()
    {
        return $this->belongsTo(Receive::class, 'id_receive', 'id');
    }

    public function produksis()
    {
        return $this->hasMany(Produksi::class, 'id_receive', 'id');
    }
}