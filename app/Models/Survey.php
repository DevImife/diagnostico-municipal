<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 


class Survey extends Model
{
    //
    use HasFactory;

    protected $table = 'surveys'; // Especificar el nombre de la tabla si es necesario
    
    protected $fillable = [
        'usuario_id',
        'plantel_id',
        'matricula',
        'amenazas',
        'otrosElementos',
        'medidas',
        'zonaSismica',
        'documentoPropiedad',
        'servicioPlantel',
        'servSanitarioCantidad',
        'servSanitarioEstado',
        'tipoDescarga',
        'edifEspaciosCantidad',
        'edifTipoEstructura',
        'edifCondiciones',
        'obraExteriorEstado',
        'obraExteriorComplementos',
        'necesidadMejora',
        'elemEstructuraMejora',
        'elemExteriorMejora',
        'accesibilidadMejora',
        'espaciosMejora',
        'descripcionMejora',
        'bienes',
        'energiaElectrica',
        'fotografias',
    ];

    protected $casts = [
        'matricula' => 'array',
        'amenazas' => 'array',
        'otrosElementos' => 'array',
        'medidas' => 'array',
        'zonaSismica' => 'array',
        'documentoPropiedad' => 'array',
        'servicioPlantel' => 'array',
        'servSanitarioCantidad' => 'array',
        'servSanitarioEstado' => 'array',
        'tipoDescarga' => 'array',
        'edifEspaciosCantidad' => 'array',
        'edifCondiciones' => 'array',
        'obraExteriorEstado' => 'array',
        'obraExteriorComplementos' => 'array',
        'necesidadMejora' => 'array',
        'elemEstructuraMejora' => 'array',
        'elemExteriorMejora' => 'array',
        'accesibilidadMejora' => 'array',
        'espaciosMejora' => 'array',
        'descripcionMejora' => 'array',
        'bienes' => 'array',
        'energiaElectrica' => 'array',
        'fotografias' => 'array',
    ];

    // Relación con usuarios
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function plantel()
    {
        return $this->belongsTo(Institution::class, 'plantel_id');
    }

}
