<?php

namespace App\Imports;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CategoryImport implements ToModel, WithHeadingRow, WithValidation
{

    /**
     * @inheritDoc
     */
    public function model(array $row)
    {
        return new Category([
            'name_tm' => $row['name_tm'],
            'name_ru' => $row['name_ru'],
            'name_tr' => $row['name_tr'],
            'name_en' => $row['name_en'],
            'slug'    => $row['slug'],
            'image'   => url('storage/images/categories/' . $row['image']),
            'file_name' => $row['image']
        ]);
    }

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'name_tm' => 'required',
            'name_ru' => 'required',
            'name_tr' => 'required',
            'name_en' => 'required',
            'slug' => 'required|unique:categories,slug',
            'image' => 'required'
        ];
    }
}
