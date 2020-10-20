<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareTaker extends Model
{
    protected $fillable = [
        'name', 'email', 'gender', 'password', 'mobile', 'profile_image', 'description',
    ];

    public static function addEdit($data)
    {
        return  CareTaker::updateOrCreate(
            [
                'id' => @$data['id'],
            ],
            [
                'name' => @$data['name'] ?: null,
                'email' => @$data['email'] ?: null,
                'gender' => @$data['gender'] ?: null,
                'mobile' => @$data['mobile'] ?: null,
                'password' => @$data['password'] ?: null,
                'profile_image' => @$data['profile_image'] ?: null,
                'description' => @$data['description'] ?: '--',
            ]
        );
    }

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
