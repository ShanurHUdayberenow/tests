<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index (Request $request) {
        $attributes = Attribute::query();
        if ($request->subsubcategory && $request->subsubcategory != "null") {
            $attributes = $attributes->where('subsubcategoryId', $request->subsubcategory)->has('specifications');
        }
        if ($request->subcategory && $request->subcategory != "null") {
            $attributes = $attributes->where('subcategoryId', $request->subcategory)->has('specifications');
        }
        if ($request->category && $request->category != "null") {
            $attributes = $attributes->where('categoryId', $request->category)->has('specifications');
        }
        if (!$attributes) {
            $attributes = Attribute::has('specifications');
        }
        $attributes = $attributes->get(['id','name_tm', 'name_en', 'name_tr', 'name_ru']);
        $response = [];
//        dd($attributes[0]);
        foreach ($attributes as $attribute) {
            array_push($response, [
                'attribute' => $attribute,
                'values' => $attribute->values()->has('specifications')->get(['id', 'value_tm', 'value_en', 'value_tr', 'value_ru'])->toArray(),
            ]);
        }
        return response()->json($response);
    }
}
