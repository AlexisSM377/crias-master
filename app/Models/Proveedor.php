<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'direccion',
    ];

    protected $hidden = [
        'telefono',
        'email',
        'direccion',
    ];

    public $timestamps = false;

    /**
     * Relacion del proveedor con las crias vendidas.
     */
    public function crias()
    {
        return $this->hasMany(Cria::class)->withTrashed();
    }
}
