<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'slug'];

    public function districts() {
        return $this->hasMany(District::class);
    }
}
