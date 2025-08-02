<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
    protected $fillable = ['option_id', 'value', 'activate', 'category_id'];

    public function option() {
        return $this->belongsTo(Option::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

     public function getActivateTextAttribute() {
        switch ($this->activate) {
            case 'active':
                return 'Aktiv';
            default:
                return 'İmtina edilmiş';
        }
    }
}
