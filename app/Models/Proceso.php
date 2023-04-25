<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Proceso extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nombre'
    ];

    public $timestamps = false;

    /**
     * Relación de las crias con el proceso en el que estan.
     */
    public function crias()
    {
        return $this->hasMany(Cria::class);
    }
}
