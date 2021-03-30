<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Socialmediatype as Socialmediatype;

class Kolsosmed extends Model
{
    use HasFactory;

    protected $table = 'kolsosmeds';
    
    protected $fillable = ['idKol', 'sosmedtype', 'username', 'url', 'follower', 'like', 'comment', 'engagement', 'engagementrate', 'post'];

    public function toSosmed()
    {
        return $this->BelongsTo(Socialmediatype::class, 'sosmedtype', 'id');
    }  
    
}
