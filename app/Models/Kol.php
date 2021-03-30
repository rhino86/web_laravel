<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Koltype as Koltype;
use App\Models\Category as Category;
use App\Models\Kolsosmed as Kolsosmed;
use App\Models\Province as Province;
use App\Models\Kolservice as Kolservice;

class Kol extends Model
{
    use HasFactory;
    protected $table = 'kols';

    protected $fillable = ['name', 'email', 'password', 'username', 'category', 'contact_person', 'bank_name', 'bank_account', 'bank_number_account', 'audience_character', 'profesi', 'interst', 'gender', 'location', 'religion', 'koltypes', 'tempatLahir','tanggalLahir', 'description', 'follower'];
    
    public function toKolType()
    {
        return $this->BelongsTo(Koltype::class, 'koltypes', 'id');
    }
    
    
    public function toCategory()
    {
        return $this->BelongsTo(Category::class, 'category', 'id');
    }

    
    public function SocialMedia()
    {
        return $this->hasMany(Kolsosmed::class, 'idKol', 'id');
    }

    
    public function to_location()
    {
        return $this->BelongsTo(Province::class, 'location', 'id');
    }

    public function services()
    {
        return $this->hasMany(Kolservice::class, 'idKol', 'id');
    }
    

}
