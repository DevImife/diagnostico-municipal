<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    //
    use HasFactory;

    protected $table = 'institutions'; // Especificar el nombre de la tabla si es necesario

    protected $fillable = ['postcode_id', 'nombre_plantel', 'latitud', 'longitud', 'telefono', 'inah', 'edad_plantel', 'archivo_plantel']; // Campos que se pueden asignar en masa

    // Relación con postcode
    public function codigo_postal()
    {
        return $this->belongsTo(Postcode::class, 'postcode_id');
    }

    public function ccts()
    {
        return $this->hasMany(Cct::class, 'plantel_id');
    }

    public function surveys()
    {
        return $this->hasMany(Survey::class, 'plantel_id');
    }
}
