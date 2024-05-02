<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisOrderProduksi extends Model
{
    use HasFactory;

    protected $table = 'jenis_order_produksi';

    protected $primaryKey = 'id';

    protected $fillable = [
        'kode',
        'jenis',
    ];

    public function produksis()
    {
        return $this->hasMany(Produksi::class, 'id_jenis_order', 'id');
    }
}
