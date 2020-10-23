<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Patient extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'gender', 'password', 'mobile', 'profile_image', 'description',
        'dob', 'age', 'address', 'emergency_name', 'emergency_contact', 'emergency_relation',
        'height', 'weight', 'alergy', 'current_medication', 'current_health_concern', 'report_file'
    ];

    public static function addEdit($data)
    {
        return  Patient::updateOrCreate(
            [
                'id' => @$data['id'],
            ],
            [
                'name' => @$data['name'] ?: null,
                'email' => @$data['email'] ?: null,
                'gender' => @$data['gender'] ?: null,
                'password' => @$data['password'] ?: null,
                'mobile' => @$data['mobile'] ?: null,
                'profile_image' => @$data['profile_image'] ?: null,
                'description' => @$data['life_story'] ?: null,
                'dob' => @$data['dob'] ?: null,
                'age' => @$data['age'] ?: null,
                'address' => @$data['address'] ?: null,
                'emergency_name' => @$data['emergency_name'] ?: null,
                'emergency_contact' => @$data['emergency_contact'] ?: null,
                'emergency_relation' => @$data['emergency_relation'] ?: null,
                'height' => @$data['height'] ?: null,
                'weight' => @$data['weight'] ?: null,
                'alergy' => @$data['alergy'] ?: null,
                'current_medication' => @$data['current_medication'] ?: null,
                'current_health_concern' => @$data['current_health_concern'] ?: null,
                'report_file' => @$data['report_file'] ?: null,

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

    public function getReport()
    {
        $image = $this->report_file;
        if ($image) {
            return env('APP_URL') . '/upload/profile/' . $image;
        } else {
            return env('APP_URL') . '/' . 'images/profile/small/pic1.jpg';
        }
    }


}
