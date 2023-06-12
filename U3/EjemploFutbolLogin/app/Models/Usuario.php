<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Usuario extends Authenticable{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'email';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function rol():BelongsTo
    {
        return $this->belongsTo(Rol::class);
    }

    public function registraUltimoLogin():void
    {
        $this->ultimo_login = Carbon::now();
        $this->save();
    }

    public function cambiarEstado():void
    {
        $this->activo = !$this->activo;
        $this->save();
    }
}
