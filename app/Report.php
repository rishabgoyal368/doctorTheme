<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    protected $fillable = [
        'bp',
        'sugar',
        'temperature',
        'breakfast',
        'lunch',
        'dinner',
        'activities',
        'patinet_id',
    ];

    public static function addEdit($data)
    {
        return  Report::updateOrCreate(
            [
                'id' => @$data['id'],
            ],
            [
                'bp' => @$data['bp'] ?: null,
                'sugar' => @$data['sugar'] ?: null,
                'temperature' => @$data['temperature'] ?: null,
                'breakfast' => @$data['breakfast'] ?: null,
                'lunch' => @$data['lunch'] ?: null,
                'dinner' => @$data['dinner'] ?: null,
                'activities' => @$data['activities'] ?: null,
                'patinet_id' => @$data['patinet_id'] ?: null,
            ]
        );
    }
}
