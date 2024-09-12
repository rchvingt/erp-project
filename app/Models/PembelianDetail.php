<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class PembelianDetail extends Model
{
    use HasFactory;
    use HasRoles;

    // guard aktif
    protected $guard_name = 'admin';

    // Nama tabel
    protected $table = 'pembelian_details';

    // Primary Key
    protected $primaryKey = 'id_po_detail';

    // Kolom yang boleh diisi secara massal (mass assignment)
    protected $fillable = [
        'id_po',
        'id_material',
        'qty',
        'harga',
        'total',
    ];

    // Relasi ke model Pembelian
    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class, 'id_po', 'id_po');
    }

    // Relasi ke model RefMaterial
    public function material()
    {
        return $this->belongsTo(RefMaterial::class, 'id_material', 'id_material');
    }
}
