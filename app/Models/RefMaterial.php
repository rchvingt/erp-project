<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class RefMaterial extends Model
{
    use HasFactory;
    use HasRoles;
    protected $guard_name = 'admin';
    protected $table = 'ref_material';

    protected $primaryKey = 'id_material';

    protected $fillable = [
        'material',
    ];

    public $timestamps = true;
}
