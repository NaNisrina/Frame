<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = []; // all field can be filled

    public function project() {
        return $this->hasMany(Project::class); // hasMany = 1 to Many relations
    }

    public function contact() {
        return $this->hasMany(Contact::class); // hasMany opposite of belongsTo
    }

    // protected types
    // protected $hidden = ['photo']; // to hide field photo but show everything else
    // protected $table = 'siswa';
    // protected $fillable = ['name', 'photo']; // only name and photo field can be filled
    // protected $primaryKey = ['nisn']; // primary key
}
