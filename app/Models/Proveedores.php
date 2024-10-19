<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedores extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = ['nombre','cedula','correo','telefono'];

    public function Productos(){
        return $this->belongsToMany(Productos::class,'compras');
    }
}
