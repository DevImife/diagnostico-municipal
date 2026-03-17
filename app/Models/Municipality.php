<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    //
    use HasFactory;

    protected $table = 'municipalities'; // Especificar el nombre de la tabla si es necesario

    protected $fillable = ['nombre_municipio']; // Campos que se pueden asignar en masa

    public function postcodes()
    {
        return $this->hasMany(Postcode::class, 'municipio_id');
    }
}
