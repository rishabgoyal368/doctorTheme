<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{

    protected $table = 'admins';

    protected $fillable = [
        'name', 'email', 'password', 'profile_image'
    ];

    public function getProfile()
    {
        $image = $this->profile_image;
        if ($image) {
            return env('APP_URL') . '/upload/profile/' . $image;
        } else {
            return env('APP_URL') . '/' . 'images/profile/small/pic1.jpg';
        }
    }
}
