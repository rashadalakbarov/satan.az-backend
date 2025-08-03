<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['category_id', 'title', 'type', 'required', 'activate'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function optionValue() {
        return $this->hasMany(OptionValue::class);
    }

    public function values() {
        return $this->hasMany(OptionValue::class, 'option_id');
    }

    public function getActivateTextAttribute() {
        switch ($this->activate) {
            case 'active':
                return 'Aktiv';
            default:
                return 'İmtina edilmiş';
        }
    }

    public function getTypeTextAttribute() {
        switch ($this->type) {
            case 'select':
                return 'Çoxlu seçim';
            case 'text':
                return 'Mətn tipli';
            default:
                return 'Onaylı seçim';
        }
    }
}
