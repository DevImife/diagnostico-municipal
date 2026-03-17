<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 


class Director extends Model
{
    //

    use HasFactory;

    protected $table = 'directors'; // Especificar el nombre de la tabla si es necesario
    
    protected $fillable = ['survey_id','tipo_director','nombre_director', 'apellidos_director','direccion','telefono_oficina', 'celular','correo']; // Campos que se pueden asignar en masa

    // Relación con survey
    public function encuesta()
    {
        return $this->belongsTo(Survey::class, 'survey_id');
    }

}
