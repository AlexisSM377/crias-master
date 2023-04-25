<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Dieta extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'dieta',
        'tratamiento',
        'cria_id'
    ];

    /**
     * Relación con cria.
     */
    public function cria()
    {
        return $this->belongsTo(Cria::class)->withTrashed();
    }
}
