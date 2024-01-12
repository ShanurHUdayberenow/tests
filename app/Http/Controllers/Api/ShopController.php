<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index (Request $request) {
        $shops = Shop::query();
        $shops = $shops->where('status', 'approved');
        if ($request->search) {
            $shops = $shops->where('searchText', 'like', '%'.$request->search.'%');
        }

        if ($category = $request->category) {
            $shops = $shops->whereHas('categories', function ($query) use ($category) {
                return $query->where('categoryId', $category);
            });
        }
        if ($subcategory = $request->subcategory) {
            $shops = $shops->whereHas('categories', function ($query) use($subcategory) {
                return $query->where('subcategoryId', $subcategory);
            });
        }
        if ($subsubcategory = $request->subsubcategory) {
            $shops = $shops->whereHas('categories', function ($query) use($subsubcategory) {
                return $query->where('subsubcategoryId', $subsubcategory);
            });
        }
        if ($request->sort) {
            switch ($request->sort) {
                case 'name': $shops = $shops->orderBy('name'); break;
            }
        }
        $shops = $shops->paginate($request->count ? $request->count : 10);
        $shops->withPath('shops');
        $shops = json_decode($shops->toJson());
        $shops->links = array_slice($shops->links, 1, -1);
        return response()->json(
            $shops
        );
    }
}
