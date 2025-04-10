<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable =['nombre','descripcion','duracion'];

    public function estudiante ()
    {
        return $this->belongsToMany(Estudiante::class, 'inscripciones')
                    ->withPivot('fecha_inscripcion')
                    ->withTimestamps();
    }
}
