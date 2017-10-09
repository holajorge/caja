<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalles extends Model
{
    //
   protected $table = "detalles";
   protected $fillable = ['producto_id', 'cantidad', 'total'];


}
