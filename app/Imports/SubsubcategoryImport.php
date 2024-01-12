<?php

namespace App\Imports;


use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SubsubcategoryImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
     * @inheritDoc
     */
    public function model(array $row)
    {
        if (Subcategory::where('name_en', $row['subcategory'])->count() == 0)
            return null;
        $subcategory = Subcategory::where('name_en', $row['subcategory'])->first();
        return new Subsubcategory([
            'name_tm'    => $row['name_tm'],
            'name_ru'    => $row['name_ru'],
            'name_en'    => $row['name_en'],
            'name_tr'    => $row['name_tr'],
            'slug'       => $row['slug'],
            'subcategoryId' => $subcategory->id,
            'image'      => url('storage/images/subcategories/'.$row['image']),
            'file_name'  => $row['image'],
            'categoryId' => $subcategory->category->id
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
            'slug'     => 'required|unique:subsubcategories,slug',
            'image'    => 'required',
            'subcategory' => 'required'
        ];
    }
}
