<?php

namespace App\Imports;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use App\Models\Specification;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use App\Models\Unit;
use App\Models\VariationGroup;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductImport implements ToModel, WithHeadingRow, WithValidation
{

    /**
     * @inheritDoc
     */
    public function model(array $row)
    {
//        dd($row);
        $category = Category::where('name_en', $row['category'])->first();
        if(!$category) {
            return null;
        }
        if (!$row['subcategory'] && $category->subcategories->count() > 0) {
            return null;
        }
        $subcategory = Subcategory::where('name_en', $row['subcategory'])->first();

        if (!$row['subsubcategory'] && $subcategory->subsubcategories->count() > 0) {
            return null;
        }
        $subsubcategory = Subsubcategory::where('name_en', $row['subsubcategory'])->first();
        $unit = Unit::where('name_en', $row['unit'])->first();
        $images = [];
        foreach (explode(',', $row['images']) as $item) {
            array_push($images, [
                'image' => url('storage/images/products/'.$item),
                'filename' => $item
            ]);
        };
        $variationGroupId = null;
        if ($row['groupslug']) {
            if ($variationProduct = Product::where('slug', $row['groupslug'])->first()) {
                if ($variationProduct->variationGroupId) {
                    $variationGroupId = $variationProduct->variationGroupId;
                } else {
                    $variationGroup = VariationGroup::create([]);
                    $variationProduct->update(['variationGroupId', $variationGroup->id]);
                    $variationGroupId = $variationGroup->id;
                }
            }
        }
        $product = Product::create([
            'name_tm'        => $row['name_tm'       ],
            'name_ru'        => $row['name_ru'       ],
            'description_tm' => $row['description_tm'],
            'description_en' => $row['description_en'],
            'images' => $images,
            'unitId' => $unit->id,
            'slug' => $row['slug'],
            'variationGroupId' => $variationGroupId,
            'categoryId' => $category->id,
            'subcategoryId' => $subcategory->id,
            'subsubcategoryId' => $subsubcategory->id,
            'searchText' => $row['name_tm']. $row['name_ru']. $row['description_tm']. $row['description_ru']
        ]);
        if ($row['attributes'])
            foreach (explode(',', $row['attributes']) as $item) {
                $specification = explode('-', $item);
                $attribute = Attribute::where('name_en', $specification[0])->first();
                $attributeValue = $attribute->values->where('value_en', $specification[1])->first();
                if ($attribute && $attributeValue)
                    Specification::create([
                        'productId' => $product->id,
                        'attributeId' => $attribute->id,
                        'attributeValueId' => $attributeValue->id,
                    ]);
            }

        return $product;
    }

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'category' => 'required',
            'name_tm' => 'required',
            'name_ru' => 'required',
            'description_tm' => 'required',
            'description_en' => 'required',
            'unit' => 'required',
            'slug' => 'required|unique:products,slug',
            'images' => 'required'
        ];
    }
}
