<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElanOption extends Model
{
    protected $fillable = [
        'elan_id',
        'category_id',
        'option_id',
        'value',
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
