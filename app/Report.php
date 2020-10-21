<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    protected $fillable = [
        'bp',
        'sugar',
        'temperature',
        'brewakfast',
        'lunch',
        'dinner',
        'activiyies',
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
                'brewakfast' => @$data['breakfast'] ?: null,
                'lunch' => @$data['lunch'] ?: null,
                'dinner' => @$data['dinner'] ?: null,
                'activiyies' => @$data['activities'] ?: null,
                'patinet_id' => @$data['patinet_id'] ?: null,
            ]
        );
    }
}
