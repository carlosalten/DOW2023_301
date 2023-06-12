<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Partido extends Model
{
    use HasFactory;
    protected $table = 'partidos';
    public $timestamps = false;

    public function equipos():BelongsToMany{
        return $this->belongsToMany(Equipo::class);
    }

    public function equiposConPivot():BelongsToMany{
        return $this->belongsToMany(Equipo::class)->withPivot(['es_local','goles']);
    }
}
