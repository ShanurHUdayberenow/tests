<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ShopProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $min = 0;
    public $max = 0;
    public function index (Request $request) {

        $products = Product::query();
        $products = $products->has('shopProducts');
        if ($category = $request->category) {
            $products = $products->where('categoryId', $category);
        }
        if ($subcategory = $request->subcategory) {
            $products = $products->where('subcategoryId', $subcategory);
        }
        if ($subsubcategory = $request->subsubcategory) {
            $products = $products->where('subsubcategoryId', $subsubcategory);
        }

        if ($request['attributes']) {
            $attributes = explode(',', $request['attributes']);
            $arr = explode('-', $attributes[0]);
            $products = $products->whereHas('specifications', function ($query) use ($arr) {
                return $query->where('attributeId', $arr[0])->where('attributeValueId', $arr[1]);
            });
            foreach ($attributes as $attribute) {
                $arr = explode('-', $attribute);
                $products = $products->orWhereHas('specifications', function ($query) use ($arr) {
                    return $query->where('attributeId', $arr[0])->where('attributeValueId', $arr[1]);
                });
            }
        }
        $products1 = $products;
        $products1->with('shopProducts', function ($query) {
            $this->min = $query->orderBy('price', 'asc')->first()->price;
        })->get();
        $products1->with('shopProducts', function ($query) {
            $this->max = $query->orderBy('price', 'desc')->first()->price;
        })->get();
        $maxPrice = $this->max;
        $minPrice = $this->min;

        if ($request->range) {
            $range = explode('-', $request->range);
            $products = $products->whereHas('shopProducts', function ($query) use ($range) {
                return $query->where('price', '<', $range[0])->orWhere('price', '>', $range[1]);
            }, '=', '0');
        }

        if ($request->sort) {
            switch ($request->sort) {
                case 'name_tm': $products = $products->orderBy('name_tm'); break;
                case 'name_ru': $products = $products->orderBy('name_ru'); break;
                case 'name_tr': $products = $products->orderBy('name_tr'); break;
                case 'name_en': $products = $products->orderBy('name_en'); break;
            }
        }
        switch ($request->count) {
            case 24: $count = 24; break;
            default: $count = 12; break;
        }

        $products = $products->paginate($count);
        foreach ($products->items() as $product) {
            $shopProducts = ShopProduct::where('productId', $product->id);
            $product['minPrice'] = $shopProducts->min('price');
            $product['maxPrice'] = $shopProducts->max('price');
            $product['isSale'] = $shopProducts->where('discount', '!=', 'null')->count() > 0;
            unset($product['shopProducts']);
        }
        $products->withPath('products');
        $products = json_decode($products->toJson());
        $products->minPrice = $minPrice;
        $products->maxPrice = $maxPrice;
        $products->links = array_slice($products->links, 1, -1);
        return response()->json($products);
    }

    public function saleProducts () {
        $products = Product::whereHas('shopProducts', function ($query) {
            return $query->where('discount', '!=', 'null');
        })->take(8)->get();
        foreach ($products as $product) {
            $product['range'] = $product->shopProducts->min('price') . 'TMT - ' . $product->shopProducts->max('price') . 'TMT';
        }
        return response()->json([
            'products' => $products
        ]);
    }
}
