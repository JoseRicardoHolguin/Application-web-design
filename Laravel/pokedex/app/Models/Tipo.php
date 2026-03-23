<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }
}
