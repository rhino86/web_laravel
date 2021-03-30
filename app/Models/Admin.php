<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hakakses as Hakakses;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = ['fullName', 'username', 'password', 'hakAkses'];

    
    public function ha_join()
    {
        return $this->belongsTo(Hakakses::class, 'hakAkses', 'id');
    }
}
