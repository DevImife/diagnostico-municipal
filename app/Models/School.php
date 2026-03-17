<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 


class School extends Model
{
    //
    use HasFactory;

    protected $table = 'schools'; // Especificar el nombre de la tabla si es necesario
    
    protected $fillable = ['survey_id','nombre_plantel','cct','turno','nivel','alumnos','alumnas','discapacidad','total_matricula',
    'directivos','docentes','administrativos','conserjes','total_personal','total_grupos']; // Campos que se pueden asignar en masa

    // Relación con survey
    public function encuesta()
    {
        return $this->belongsTo(Survey::class, 'survey_id');
    }
}
