<?php

namespace Modules\Cart\Entities;

use Modules\Product\Entities\Variety;
use Shetabit\Shopit\Modules\Cart\Entities\Cart as BaseCart;

class Cart extends BaseCart
{
  public static function fakeCartMakerWithOrderItems($orderItems)
  {
    $fakeCarts = [];
    foreach ($orderItems as $orderItem) {
      $newFakeCart = new Cart([
        'variety_id' => $orderItem->variety_id,
        'quantity' => $orderItem->quantity,
        'discount_price' => $orderItem->discount_amount,
        'price' => $orderItem->amount,
      ]);
      $newFakeCart->load(['variety' => function ($query) {
        $query->with('product');
      }]);
      $fakeCarts[] = $newFakeCart;
    }

    return collect($fakeCarts);
  }

  public static function fakeCartMaker($variety_id, $quantity, $discount_price, $price): Cart
  {
    return new Cart([
      'variety_id' => $variety_id,
      'quantity' => $quantity,
      'discount_price' => $discount_price,
      'price' => $price,
    ]);
  }

  public static function hasFreeShippingProduct($carts): bool
  {
    $varietyIds = $carts->pluck('variety_id')->toArray();
    $varieties = Variety::query()
      ->select(['id', 'product_id'])
      ->whereIn('id', $varietyIds)
      ->with('product')
      ->get();

    foreach ($varieties as $variety) {
      if ($variety->product->free_shipping) return true;
    }
    return false;
  }
}
