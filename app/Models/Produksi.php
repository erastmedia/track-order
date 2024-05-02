<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    use HasFactory;

    protected $table = 'produksi';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_receive',
        'kodeitem',
        'id_jenis_order',
        'pcs',
        'tglkirim',
        'tglkirimbaru',
        'tglkirimbed',
        'tgldelivery',
        'hair',
        'base',
        'venting',
        'final',
        'cost',
        'flagapproval',
        'tglapproval',
        'qty',
        'flagkirimbuyer',
        'flagproses',
    ];

    public function receive()
    {
        return $this->belongsTo(Receive::class, 'id_receive', 'id');
    }
}
