<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = 'inscripciones';

    protected $fillable = ['estudiante_id', 'curso_id', 'fecha_inscripcion'];

    protected $dates = ['fecha_inscripcion'];

    public function getFechaInscripcionAttribute($value)
    {
        return $value ? Carbon::parse($value) : null;
    }

    public function setFechaInscripcionAttribute($value)
    {
        $this->attributes['fecha_inscripcion'] = $value ?: now();
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
