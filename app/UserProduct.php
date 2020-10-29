<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProduct extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'upload_by',
        'image',
        'status',
        'type'
    ];


    public static function addEdit($data)
    {
        return UserProduct::updateOrCreate(
            [
                'id' => @$data['id'],
            ],
            [
                'name' => @$data['name'] ?: null,
                'description' => @$data['description'] ?: null,
                'price' => @$data['price'] ?: null,
                'upload_by' => @$data['upload_by'] ?: null,
                'image' => @$data['image'] ?: null,
                'status' => @$data['status'] ?: null,
                'type' => @$data['type'] ?: null,
            ]
        );
    }

    public function productImage()
    {
        $image = $this->image;
        if ($image) {
            return env('APP_URL') . '/upload/product/' . $image;
        } else {
            return env('APP_URL') . '/' . 'images/profile/small/pic1.jpg';
        }
    }

    public function getStatus()
    {
        $status = $this->status;
        switch ($status) {
            case 'true':
                return 'request approved';
                break;

            case 'false':
                return 'request pending';
                break;
        }
    }

    public function uploadBy()
    {
        return Patient::where('id',$this->upload_by)->first();
    }

    public function getType()
    {
        $type = $this->type;
        return $type == '1' ? 'yes' : 'no' ;
    }
}
