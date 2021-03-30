<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koltype extends Model
{
    use HasFactory;
    protected $table = 'koltypes';

    protected $fillable = ['description'];
}
