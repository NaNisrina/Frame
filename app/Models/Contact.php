<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function siswa() {
        return $this->belongsTo(Siswa::class); // belongsTo opposite of hasMany
    }

    public function contact_type() {
        return $this->belongsTo(Contact_type::class);
    }
}
