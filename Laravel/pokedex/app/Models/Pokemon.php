<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = 'pokemons';
    
    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }
}
