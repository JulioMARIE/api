<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;

class Review extends Model
{
  protected $fillable = [
    'customer','review','star','product_id'
  ];

  public function product()
  {
    return $this->belongsTo(Product::class);
  }
}
