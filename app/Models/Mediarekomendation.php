<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Project;
use App\Models\Mediarekomendationkol;

class Mediarekomendation extends Model
{
    use HasFactory;
    protected $table = 'mediarekomendations';

    protected $fillable = ['code', 'idProject'];

    
    public function withProject()
    {
        return $this->belongsTo(Project::class, 'idProject', 'id');
    }

    
    public function withRekKol()
    {
        return $this->hasMany(Mediarekomendationkol::class, 'code', 'code');
    }
}
