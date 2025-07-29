<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Elan extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'price',
        'city_id',
        'description',
    ];

    protected $hidden = [
        'activate',
        'status',
    ];

     public function getActivateTextAttribute() {
        switch ($this->activate) {
            case 'active':
                return 'Aktiv';
            case 'passive':
                return 'İmtina edilmiş';
            case 'waiting':
                return 'Gözləmədə';
            case 'blocked':
                return 'Bloklanmış';
            default:
                return 'Bilinməyən status';
        }
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }
}
