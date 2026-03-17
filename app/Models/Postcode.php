<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postcode extends Model
{
    //
    use HasFactory;

    protected $table = 'postcodes';

    protected $fillable = ['municipio_id', 'codigo_postal', 'localidad', 'tipo', 'zona']; // Campos que se pueden asignar en masa

    public function municipio()
    {
        return $this->belongsTo(Municipality::class, 'municipio_id');
    }

    public function institutions()
    {
        return $this->hasMany(Institution::class, 'postcode_id');
    }
}
