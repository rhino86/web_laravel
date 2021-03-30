<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Kol as kol;

class Mediarekomendationkol extends Model
{
    use HasFactory;
    protected $table = 'mediarekomendationkols';

    protected $fillable = ['code', 'idKol'];

    
    public function withKol()
    {
        return $this->belongsTo(kol::class, 'idKol', 'id');
    }
}
