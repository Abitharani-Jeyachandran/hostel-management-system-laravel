<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Model\warden;
use Illuminate\Model\subwarden;

class hostel extends Model
{
    use HasFactory;

    protected $fillable = [
        'hostel_id',
        'name',
    ];
    public function showwarden(){
        return $this->hasMany(warden::class,'hostel_id','hostel_id');
          return $this->hasMany(subwarden::class,'hostel_id','hostel_id');
        }
}
