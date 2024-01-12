<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Subcategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SubcategoryImport implements ToModel, WithValidation, WithHeadingRow
{


    /**
     * @inheritDoc
     */
    public function model(array $row)
    {

        if (Category::where('name_en', $row['category'])->count() == 0)
            return null;
        return new Subcategory([
            'name_tm'    => $row['name_tm'],
            'name_ru'    => $row['name_ru'],
            'name_en'    => $row['name_en'],
            'name_tr'    => $row['name_tr'],
            'slug'       => $row['slug'],
            'categoryId' => Category::where('name_en', $row['category'])->first()->id,
            'image'      => url('storage/images/subcategories/'.$row['image']),
            'file_name'  => $row['image']
        ]);
    }

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'name_tm'  => 'required',
            'name_ru'  => 'required',
            'name_en'  => 'required',
            'name_tr'  => 'required',
            'slug'     => 'required|unique:subcategories,slug',
            'image'    => 'required',
            'category' => 'required'
        ];
    }
}
