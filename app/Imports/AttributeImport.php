<?php

namespace App\Imports;


use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AttributeImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @inheritDoc
     */
    public function model(array $row)
    {
        $category = Category::where('name_en', $row['category'])->first();

        if (!$category) {
            return null;
        }
        if (!$row['subcategory'] && $category->subcategories->count() > 0) {
            return null;
        }
        $subcategory = Subcategory::where('name_en', $row['subcategory'])->first();
        if (!$subcategory) {
            return null;
        }
        if (!$row['subsubcategory'] && $subcategory->subsubcategories->count() > 0) {
            return null;
        }
        $subsubcategory = Subsubcategory::where('name_en', $row['subsubcategory'])->first();
        if (!$subsubcategory) {
            return null;
        }

        $attribute = Attribute::create([
            'name_tm' => $row['name_tm'],
            'name_ru' => $row['name_ru'],
            'name_en' => $row['name_en'],
            'name_tr' => $row['name_tr'],
            'categoryId' => $category->id,
            'subcategoryId' => $subcategory->id,
            'subsubcategoryId' => $subsubcategory->id
        ]);
        $values_tm = explode(',', $row['values_tm']);
        $values_ru = explode(',', $row['values_ru']);
        $values_en = explode(',', $row['values_en']);
        $values_tr = explode(',', $row['values_tr']);
        foreach ($values_tm as $key => $item) {
            AttributeValue::create([
                'value_tm' => $item,
                'value_ru' => $values_ru[$key],
                'value_en' => $values_en[$key],
                'value_tr' => $values_tr[$key],
                'attributeId' => $attribute->id
            ]);
        }
        return $attribute;
    }

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'name_tm'   => 'required',
            'name_ru'   => 'required',
            'name_en'   => 'required',
            'name_tr'   => 'required',
            'category'  => 'required',
            'values_tm' => 'required',
            'values_ru' => 'required',
            'values_tr' => 'required',
            'values_en' => 'required',
        ];
    }
}
