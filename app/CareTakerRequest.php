<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CareTakerRequest extends Model
{
    //

    // $care = CareTakerRequest::add($data);
    protected $fillable = [
        'care_taker_id', 'user_id', 'status'
    ];

    public static function add($data)
    {
        return  CareTakerRequest::create([
            'id' => @$data['id'],
            'care_taker_id' => @$data['care_taker_id'],
            'user_id' => @$data['user_id'],
            'status' => @$data['status'],

        ]);
    }

    public function getUser()
    {
        return Patient::select('name', 'id')->where('id', $this->user_id)->pluck('name')->first();
    }

    public function getCareUser()
    {
        return CareTaker::select('name', 'id')->where('id', $this->care_taker_id)->pluck('name')->first();
    }

    public function getCare()
    {
        return CareTaker::where('id', $this->care_taker_id)->first();
    }

    public function status()
    {
        $status = $this->status;
        switch ($status) {
            case 0:
                return 'Request Sent';
                break;

            case 1:
                return 'Request Approved';
                break;

            case 2:
                return 'Request Reject';
                break;
        }
    }
}
