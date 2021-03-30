<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Socialmediatype as Socialmediatype;
use App\Models\Servicetype as Servicetype;
use App\Models\Kolsosmed as Kolsosmed;
use App\Models\Kol as Kol;

class Kolservice extends Model
{
    use HasFactory;

    protected $table = 'kolservices';

    protected $fillable = ['idKol', 'sosmedtype', 'idSocmed', 'service', 'price', 'sosmedtype', 'durasi'];

    /**
     * Get the user that owns the Kolservice
     *
     */
    public function socialmedia(){
        return $this->belongsTo(Socialmediatype::class, 'sosmedtype', 'id');
    }

    
    public function joinKols()
    {
        return $this->belongsTo(Kol::class, 'idKol', 'id');
    }

    
    public function joinService(){
        return $this->belongsTo(Servicetype::class, 'service', 'id');
    }
    
    public function joinKolSosmed(){
        return $this->belongsTo(Kolsosmed::class, 'idSocmed', 'id');
    }
}
