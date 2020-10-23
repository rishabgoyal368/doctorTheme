<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'price',
    ];

    public static function add($data)
    {
        return Order::updateOrCreate(
            [
                'id' => @$data['id'],
            ],
            [
                'product_id' => @$data['product_id'] ?: null,
                'user_id' => @$data['user_id'] ?: null,
                'price' => @$data['price'] ?: null,
            ]
        );
    }

    public function getProductName()
    {
        return Product::where('id',$this->product_id)->select('name')->pluck('name')->first();
    }

    public function getUserName()
    {
        return Patient::where('id',$this->user_id)->select('name')->pluck('name')->first();
    }

}
