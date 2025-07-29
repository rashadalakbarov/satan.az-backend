<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'image', 'parent_id', 'activate', 'seflink'];

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
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
