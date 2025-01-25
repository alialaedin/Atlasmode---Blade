<?php

namespace Modules\Product\Entities;

use Illuminate\Http\Request;
use Modules\Core\Entities\BaseModel;
use Modules\Core\Entities\HasCommonRelations;
use Modules\Core\Traits\HasAuthors;
use Modules\Product\Entities\Product;

class ProductSet extends BaseModel
{
    use HasAuthors, HasCommonRelations;

    protected $fillable = [
        'name'
    ];

    protected static $commonRelations = [
        'products'
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_set_product');
    }

    public static function storeAndUpdateModel(Request $request, ProductSet $productSet = null)
    {
        $set = $productSet ?? new static();
        $set->fill($request->all());
        $set->save();
        $set->products()->sync($request->input('product_ids'));
        $set->load('products');

        return $set;
    }
}
