<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 


class Cct extends Model
{
    //
    use HasFactory;

    protected $table = 'ccts'; // Especificar el nombre de la tabla si es necesario
    
    protected $fillable = ['plantel_id','nivel_id','turno_id','clave_cct']; // Campos que se pueden asignar en masa

    // Relación con institution
    public function plantel()
    {
        return $this->belongsTo(Institution::class, 'plantel_id');
    }

    // Relación con nivel
    public function nivel()
    {
        return $this->belongsTo(Level::class, 'nivel_id');
    }

    // Relación con turno
    public function turno()
    {
        return $this->belongsTo(Shift::class, 'turno_id');
    }
}
