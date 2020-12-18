<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function addCartItem($product_id)
    {
        return $this->create(['product_id' => $product_id, 'owner_id' => auth()->id()]);
    }

    public function removeCartItem($product_id)
    {
        return $this->where(['product_id' => $product_id, 'owner_id' => auth()->id()])->delete();
    }
}
