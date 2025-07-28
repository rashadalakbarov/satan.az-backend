<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = ['key', 'value'];

    public static function get($key, $default = null, $includeOther = false) {
        $row = static::where('key', $key)->first();

        if (!$row) {
            return $default;
        }

        return $includeOther
            ? ['value' => $row->value, 'other' => $row->other]
            : $row->value;

        // SiteSetting::get('site_name'); => "PicTap.az"
        // SiteSetting::get('facebook_url', null, true); => ['value' => 'https://facebook.com/PicTap', 'other' => 'FaFacebookF']
    }

    public static function getValue($key) {
        return self::where('key', $key)->value('value');
    }

    public static function setValue($key, $value) {
        return self::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}
