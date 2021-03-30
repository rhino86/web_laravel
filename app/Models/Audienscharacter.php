<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audienscharacter extends Model
{
    use HasFactory;
    protected $table = 'audienscharacters';

    protected $fillable = ['description','slug'];
}
