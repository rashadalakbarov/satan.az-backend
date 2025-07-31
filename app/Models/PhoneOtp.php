<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class PhoneOtp  extends Authenticatable
{
    protected $fillable = ['phone', 'otp', 'otp_expires_at'];
}
