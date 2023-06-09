<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code', 'pokemon_id'];

    public function pokemon() {

        return $this->belongsTo(Pokemon::class, 'pokemon_id');
    }
}
