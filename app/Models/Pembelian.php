<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Pembelian extends Model
{
    use HasFactory;
    use HasRoles;

    // guard aktif
    protected $guard_name = 'admin';

    // Nama tabel
    protected $table = 'pembelian';

    // Primary Key
    protected $primaryKey = 'id_po';

    // Kolom yang boleh diisi
    protected $fillable = [
        'id_supplier',
        'tgl_po',
        'status',
        'id_pegawai',
        'disetujui_oleh',
        'disetujui_tgl',
        'tgl_kirim',
    ];

    // Relasi ke model RefSupplier
    public function supplier()
    {
        return $this->belongsTo(RefSupplier::class, 'id_supplier', 'id_supplier');
    }

    // Relasi ke model Admin
    public function pegawai()
    {
        return $this->belongsTo(Admin::class, 'id_pegawai', 'id');
    }

    // Relasi ke model Admin untuf verifikator
    public function verifikator()
    {
        return $this->belongsTo(Admin::class, 'disetujui_oleh', 'id');
    }

    // Relasi ke model PembelianDetail
    public function details()
    {
        return $this->hasMany(PembelianDetail::class, 'id_po', 'id_po');
    }
}
