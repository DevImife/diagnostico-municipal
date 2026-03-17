<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    //
    use HasFactory;

    protected $table = 'audits';

    protected $fillable = ['user_id', 'accion', 'tabla', 'datoAfectado', 'ip_address'];

    // Relación con usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
