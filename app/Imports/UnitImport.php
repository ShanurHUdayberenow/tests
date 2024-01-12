<?php

namespace App\Imports;


use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UnitImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @inheritDoc
     */
    public function model(array $row)
    {
        return new Unit([
            'name_tm'      => $row['name_tm'],
            'name_ru'      => $row['name_ru'],
            'name_en'      => $row['name_en'],
            'name_tr'      => $row['name_tr'],
            'shortName_tm' => $row['shortname_tm'],
            'shortName_ru' => $row['shortname_ru'],
            'shortName_en' => $row['shortname_en'],
            'shortName_tr' => $row['shortname_tr'],
        ]);
    }

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            'name_tm'      => 'required',
            'name_tr'      => 'required',
            'name_en'      => 'required',
            'name_ru'      => 'required',
            'shortname_tm' => 'required',
            'shortname_ru' => 'required',
            'shortname_en' => 'required',
            'shortname_tr' => 'required',
        ];
    }
}
