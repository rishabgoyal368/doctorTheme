<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'upload_by',
        'image',
        'status',
        'type', // 1 = yes, 2 = no
    ];

    public static function addEdit($data)
    {
        return Product::updateOrCreate(
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

    public function getType()
    {
        $type = $this->type;
        return $type == '1' ? 'yes' : 'no';
    }

    public function uploadBy()
    {
        $upload = $this->upload_by;
        if ($user = Admin::where('id', $upload)->first()) {
            return $user['name'];
        } else if ($user = Patient::where('id', $upload)->first()) {
            return @$user['name'];
        }
        return '---';
    }
}
