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
}
