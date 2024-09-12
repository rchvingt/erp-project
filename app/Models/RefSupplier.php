<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class RefSupplier extends Model
{
    use HasFactory;
    use HasRoles;
    protected $guard_name = 'admin';
    protected $table = 'ref_supplier';

    protected $primaryKey = 'id_supplier';

    protected $fillable = [
        'nama_supplier', 'alamat', 'telepon',
    ];

    public $timestamps = true;
}
